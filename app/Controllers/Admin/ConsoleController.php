<?php

namespace App\Controllers\Admin;


use App\Models\ConsoleLog;
use App\Models\Server;
use Cookie;
use Engine\Core\Auth\Auth;
use User;

class ConsoleController extends AdminController
{
    public function __construct(\Engine\DI\DI $di)
    {
        parent::__construct($di);

        $token = Cookie::get('auth_user');
        $user = User::find(['token' => $token]);

        if ($token) {
          if ($user['rights_console'] < 1) {
            if ($user['role'] != 'admin') {
              $auth = new Auth;
              $auth->unAuthorize();
              return redirect('/');
            }
          }
        } else {
            redirect('/');
            exit;
        }
    }

    public function index()
    {
        return view('admin.console.view', [
            'servers' => Server::all(),
            'user' => User::where([ 'token' => Cookie::get('auth_user') ])->first(),
            'console_log' => ConsoleLog::select(['users.*', 'console_log.*'])->where([
                'date_format(console_log.created_at, \'%Y%m%d\') = date_format(NOW(), \'%Y%m%d\')'
            ])->leftJoin('users', [
                'users.id = console_log.user'
            ])->orderBy(['console_log.id' => 'desc'])->limit(50)->get(),
            'users' => User::where([ 'last_activity' => array(
                '<=' => strtotime('+5 minutes', time())
            )])->get()
        ]);
    }

    public function isConnect($server)
    {
        if ($server = Server::find($server)) {
            $rcon = new \Rcon($server['host'], $server['port'], $server['password']);
            if (@$rcon->connect()) {
                return true;
            }
        }

        return http_response_code(404);
    }

    public function sendCommand($server)
    {
        if ($server = Server::find($server)) {
            $cmd = trim($this->request->post('cmd'));
            $user = User::find([ 'token' => Cookie::get('auth_user') ]);
            $blacklist = (array) config('black_cmds');
            $status = true;

            if (!isset($cmd)) {
                $response['status'] = 'error';
                $response['error'] = 'Empty command';
            }

            if ($user['role'] !== 'admin') {
                foreach ($blacklist as $el) {
                    if (stristr(stristr($cmd, ' ', true), $el)) {
                        $status = false;
                        $response['status'] = 'error';
                        $response['error'] = 'You don`t have permissions, for send this command!';
                        break;
                    }
                }
            }

           if ($status === true) {
               $rcon = new \Rcon($server['host'], $server['port'], $server['password']);

               if (@$rcon->connect()) {
                   $rcon->sendCommand($cmd);
                   $response['status'] = 'success';
                   $response['command'] = $cmd;
                   $response['response'] = $rcon->getResponse();
               } else {
                   $response['status'] = 'error';
                   $response['error'] = "Подключится к севреру <b>{$server['name']}</b> не удалось";
               }
           }

           if (isset($status)) {
               ConsoleLog::insert([
                   'user' => $user['id'],
                   'cmd' => $cmd,
                   'server' => $server['name'],
                   'status' => $status ? 1 : 0
               ])->send();
           }

           return print json_encode($response);
        }

        return http_response_code(404);
    }
}
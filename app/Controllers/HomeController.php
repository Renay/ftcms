<?php

namespace App\Controllers;

use App\Models\Goods;
use App\Models\User;
use Engine\Abstracts\Controller;
use App\Models\Server;
use \Cookie;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.index', [
            'servers' => Server::all()
        ]);
    }

    public function setOnline($id)
    {
        if (!$this->is_ajax()) {
            return print json_encode(['error' => true]);
        }

        $id = (int) $id;
        $user = User::where(['id' => $id])->first();
        $token = Cookie::get('auth_user');
        if (isset($token) && $user['token'] == $token) {
            // If isset token, and it equal
            // to token user, we set status online
            User::update([ 'last_activity' => time() ])
                    ->send();
            return print json_encode(['setOnline' => true]);
        }

        return print json_encode(['error' => true]);
    }

    public function desc()
    {
        return view('app.description', [
            'goods' => Goods::select([
                'servers.name', 'servers.host',
                'goods.id', 'goods.name',
                'goods.price', 'goods.description'
            ])->leftJoin('servers', [
                    'goods.server_id = servers.id'
            ])->get(\PDO::FETCH_GROUP)
        ]);
    }
}
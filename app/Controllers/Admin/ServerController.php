<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Goods;
use App\Models\Server;

class ServerController extends AdminController
{
    public function index()
    {
        return view('admin.servers.view', [
            'title'   => 'Сервера',
            'servers' => Server::orderBy(['id' => 'desc'])->get()
        ]);
    }

    public function edit(int $id)
    {
        if (!getallheaders()['X-Requested-With']) {
            return header('Location: /admin/servers');
        }

        return view('admin.servers.edit', Server::find($id));
    }

    public function create()
    {
        if ($this->validate()) {
            return http_response_code(403);
        }

        $server = new Server(null);
        $server->name = $this->request->post('name');
        $server->host = $this->request->post('host');
        $server->port = $this->request->post('port');
        $server->password = $this->request->post('password');

        return view('admin.servers.server', $server::find($server->save()));
    }

    public function update()
    {
        if ($this->validate()) {
            return http_response_code(403);
        }

        $server = new Server($this->request->post('id'));
        $server->name = $this->request->post('name');
        $server->host = $this->request->post('host');
        $server->port = $this->request->post('port');
        $server->password = $this->request->post('password');
        $server->save();

        return view('admin.servers.server', $server::find((int) $this->request->post('id')));
    }

    public function delete()
    {
        if (count(Goods::where(['server_id' => $this->request->post('id')])->first()) ||
             count(Category::where(['server_id' => $this->request->post('id')])->first())) {
            return http_response_code(403);
        }

        Server::delete()->where([
            'id' => $this->request->post('id')
        ])->send();
    }

    public function validate()
    {
        return $this->validator->make(
            $this->request->post, [
                'name' => 'min:4',
                'host' => 'min:4',
                'port' =>'int|max:5',
                'password' =>'min:2',
        ])->validate();
    }
}
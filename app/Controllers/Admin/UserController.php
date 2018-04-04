<?php

namespace App\Controllers\Admin;

use App\Models\User;

class UserController extends AdminController
{
    public function index()
    {
        return view('admin.users.view', [
            'title' => 'Пользователи',
            'users' => User::select([
                'id', 'username', 'role',
                'date_format(created_at, "%d.%m.%Y") as created_at'
            ])->orderBy(['id' => 'desc'])->get(),
            'roles' => User::getRoles()
        ]);
    }

    public function edit($id)
    {
        if (!getallheaders()['X-Requested-With'])
            return redirect('admin/categories');

        return view('admin.users.edit', array_merge(User::find($id), [
            'roles' => User::getRoles()
        ]));
    }

    public function update()
    {
        $user = new User((int) $this->request->post('id'));
        $user->username = $this->request->post('username');
        $user->role = $this->request->post('roles');
        $user->password = bcrypt($this->request->post('password'));
        $user->rights_console = $this->request->post('rights_console');
        $user->save();

        return view('admin.users.user',
            $user::find((int) $this->request->post('id'))
        );
    }

    public function create()
    {
        if (!$this->validate() OR User::where( ['username' => $this->request->post('username')] )->get()) {
            return http_response_code(403);
        }

        $user = new User(null);
        $user->username = $this->request->post('username');
        $user->role = $this->request->post('roles');
        $user->password = bcrypt($this->request->post('password'));
        $user_id = $user->save();

        return view('admin.users.user', User::find($user_id));
    }

    public function delete()
    {
    	if (User::find([ 'token' => Cookie::get('auth_user') ])) {
    		return http_response_code(500);
    	}
    	else if (User::count() < 2) {
    		return http_response_code(400);
    	}
		else if (User::delete()->where([ 'id' => $this->request->post('id') ])->send() !== false) {
        	return true;
    	}
    	
    	return http_response_code(403);

    	
    }

    public function validate()
    {
        return $this->validator->make($this->request->post, [
            'username' => 'min:4',
            'roles' => 'min:1',
            'password' =>'min:6'
        ])->validate();
    }
}
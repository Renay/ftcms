<?php

namespace App\Models;

use Engine\Abstracts\Model;

use Engine\Helper\Cookie;

class User extends Model
{
    public function create($email, $password, $salt, $role, $token)
    {
        $this->username = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->role = $role;
        $this->token = $token;
        $this->save();
    }

    public function get()
    {
        return User::where(['id' =>
            Cookie::get('auth_user_id')
        ])->first(\PDO::FETCH_OBJ);
    }

    public static function getRoles()
    {
        $enum = self::show('columns')->where(['field' => 'role'])->first();
        $enum = str_replace(['\'', ' '], '', substr($enum['Type'], 5, -1));

        return explode(',', $enum);
    }
}
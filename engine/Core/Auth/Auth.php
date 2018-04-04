<?php

namespace Engine\Core\Auth;

use App\Models\User;
use Engine\Helper\Cookie;

class Auth implements AuthInterface
{
    /**
     * @var bool
     */
    protected $authorized = false;

    /**
     * @return bool
     */
    public function authorized()
    {
        return $this->authorized;
    }

    /**
     * Method for check Authorization user
     *
     * @return bool
     */
    public function checkAuth()
    {
        if ($this->getToken() !== null) {
            if (User::get()->token === $this->getToken()) { 
                $this->authorize(
                    User::get()->token, 
                    User::get()->id
                );
                return true;
            } else {
                $this->unAuthorize();
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return Cookie::get('auth_user') ?: null;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return Cookie::get('auth_user_id') ?: null;
    }

    /**
     * User authorization
     * @param $user
     */
    public function authorize($user, $id)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user_id', $id);
        Cookie::set('auth_user', $user);
    }

    /**
     * User unAuthorization
     * @return void
     */
    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user_id');
        Cookie::delete('auth_user');
    }
}
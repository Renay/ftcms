<?php

namespace App\Controllers\Admin;

use Engine\Abstracts\Controller;
use Engine\Core\Auth\Auth;
use App\Models\User;
use Engine\Helper\Cookie;
use Engine\Helper\Common;

class AdminController extends Controller
{
    /**
     * @var object \Engine\Core\Auth\Auth $auth
     */
    protected $auth;

    /**
     * @var array $data
     */
    protected $data = [];

    /**
     * AdminController constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
        $role = User::find(Cookie::get('auth_user_id'))['role'];
        if (!(new Auth)->checkAuth()) {
            redirect('admin/login');
            exit;
        } else if ($role != 'admin' && stripos(Common::getUrl(), 'console') === false) {
            redirect('admin/console');
            exit;
        }
    }
}
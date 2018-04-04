<?php
namespace App\Controllers\Admin;

use App\Models\User;
use Engine\DI\DI;
use Engine\Abstracts\Controller;
use Engine\Core\Auth\Auth;
use Cookie;

class LoginController extends Controller
{

    /**
     * @var object \Engine\Core\Auth\Auth $auth
     */
    protected $auth;

    /**
     * LoginController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth;
        if ($this->auth->getToken() !== null) {
            redirect('admin');
        }
    }

    /**
     * Authorization users to Admin Dashboard
     */
    public function auth()
    {
        if (!$this->is_ajax()) {
            return redirect('admin/login');
        }

        $user = User::where([ "username" => $this->request->post('username') ])->first();

        if (password_verify($this->request->post('password'), $user['password'])) {
            $token = md5(sha1(serialize([
                $user['id'], $user['username'], $user['password'],
                $this->request->server('HTTP_USER_AGENT'),
                $this->request->server('HTTP_HOST')
            ])));

            User::update(["token" => $token])
                ->where(['id' => $user['id']])
                ->send();

            return $this->auth->authorize($token, $user['id']);
        }

        return http_response_code(403);
    }

    /**
     *
     */
    public function logout()
    {
        $this->auth->unAuthorize();

        return redirect('admin/login');
    }

    /**
     * View form, html!
     */
    public function formView()
    {
        return view('admin.auth.login');
    }
}
<?php

namespace Engine\Core\Request;

class Request
{

    /**
     * @var array
     */
    public $get = [];

    /**
     * @var array
     */
    public $post = [];

    /**
     * @var array
     */
    public $cookie = [];

    /**
     * @var array
     */
    public $server = [];

    /**
     * @var array
     */
    public $files = [];

    /**
     * @var array
     */
    public $request = [];

    public function __construct()
    {
        $this->get      = $_GET;
        $this->post     = $_POST;
        $this->server   = $_SERVER;
        $this->files    = $_FILES;
        $this->request  = $_REQUEST;
    }

    public function request($key)
    {
        return $this->request[$key] ?: null;
    }

    public function get($key)
    {
        return $this->get[$key] ?: null;
    }

    public function post($key)
    {
        return $this->post[$key] ?: null;
    }

    public function server($key)
    {
        return $this->server[$key] ?: null;
    }

    public function files($key)
    {
        return $this->files[$key] ?: null;
    }
}
<?php

namespace Engine\Helper;

class Session {

    private static $started = false;

    public function __construct()
    {
        $this->start();
    }

    public function start () {
        if (!self::$started) {
            session_start ();
            self::$started = true;
        }
    }

    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function __get($name) {
        return $_SESSION[$name] ?: null;
    }

    public static function set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public static function get($name) {
        return $_SESSION[$name] ?: null;
    }

    public static function delete($name) {
        if (!self::$started) {
            (new self)->start();
        }

        unset($_SESSION[$name]);
    }

    public static function clear() {
        if (!self::$started) {
            (new self)->start();
        }

        unset($_SESSION);
    }

    public static function restart() {
        (new self)->clear();
        (new self)->start();
    }

    public static function all() {
        if (!self::$started) {
            (new self)->start();
        }

        return $_SESSION;
    }
}
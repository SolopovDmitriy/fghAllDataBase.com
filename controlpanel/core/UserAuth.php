<?php


namespace MyAdmApp;


class UserAuth
{
    private static $user = null;

    public static function userSessionCheck()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['ip'])) {
            self::$user = [];
            self::$user['login'] = $_SESSION['login'];
            self::$user['ip'] = $_SESSION['ip'];
            return true;
        }
        return false;
    }

    public static function isAuth()
    {
        return (self::$user == null) ? false : true;
    }

    public static function user()
    {
        return self::$user;
    }




    public static function userSessionDestroy()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['ip'])) {
            unset($_SESSION['login']);
            unset($_SESSION['ip']);
            session_destroy();
            self::$user = null;
        }
    }
}
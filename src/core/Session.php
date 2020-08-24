<?php


namespace baitap\core;


class Session
{
    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }


    public static function destroyAll()
    {
        session_destroy();
    }

    public static function destroy($key)
    {
        unset($_SESSION[$key]);
    }
}
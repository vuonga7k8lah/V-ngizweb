<?php


namespace baitap\core;


class Redirect
{
    public static function uri($url)
    {
        header('location:'.URL::uri($url));
        exit();
    }
}
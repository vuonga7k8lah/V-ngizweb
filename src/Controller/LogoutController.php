<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\core\Session;

class LogoutController
{
    public function adminLogout()
    {
        Session::destroyAll();
        Redirect::uri('admin');
    }
    public function homeLogout()
    {
        Session::destroyAll();
        Redirect::uri('home');
    }
}
<?php


namespace baitap\Controller;


use baitap\core\Request;

class HomeController
{
    public function loadView()
    {
        require_once 'views/icms/homePage.php';
    }

    public function cidView()
    {
        require_once 'views/icms/cid.php';
    }

    public function paidView()
    {
        require_once 'views/icms/paid.php';
    }
}
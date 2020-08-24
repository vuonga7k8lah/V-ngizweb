<?php


namespace baitap\Controller;


class PageController
{
    public function loadView()
    {
        require_once 'views/admin/View_add_pages.php';
    }

    public function addPages()
    {
        var_dump($_POST);die();
    }

}
<?php


namespace baitap\Controller;


class UserController
{
    public function addViewUser()
    {
        require_once 'views/admin/ManageUsers/addViewUsers.php';
    }
    public function listViewUser()
    {
        require_once 'views/admin/ManageUsers/listViewUsers.php';
    }
    public function editViewUser()
    {
        require_once 'views/admin/ManageUsers/editViewUsers.php';
    }
    public function deleteUser()
    {

    }
    public function addUser()
    {

    }
    public function editUser()
    {

    }
}
<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\core\Request;
use baitap\core\Session;
use baitap\database\DB;
use baitap\Model\UserModel;

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
        $id=Request::uri()[1];
        UserModel::deleteUser($id);
        Redirect::uri('list_user');

    }
    public function addUser()
    {

    }
    public function editUser()
    {
        $data=$_POST;
        $data['first_name']=DB::makeConnection()->real_escape_string(trim($_POST['first_name']));
        $data['last_name']=DB::makeConnection()->real_escape_string(trim($_POST['last_name']));
        $data['email']=DB::makeConnection()->real_escape_string(trim($_POST['email']));
        if(UserModel::updateAdmin($data)){
            Session::set('suss_update','Update user thành công');
            Redirect::uri('list_user');
        }
    }
}
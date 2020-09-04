<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\database\DB;
use baitap\Model\LoginModel;

class LoginController
{
    public function loginView()
    {
        require_once 'views/icms/login.php';
    }
    public function loginAction()
    {
        $data['email']=DB::makeConnection()->real_escape_string(trim($_POST['email']));
        $data['password']=md5(DB::makeConnection()->real_escape_string(trim($_POST['password'])));
        if (LoginModel::login($data)[0]>0){
            $aInforUser=LoginModel::login($data)[1];

        }else{
            $_SESSION['error_login']="sai tk hoặc mk";
            Redirect::uri('login');
        }
    }
}
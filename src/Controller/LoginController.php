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
            $_SESSION['uid'] = $aInforUser['user_id'];
            $_SESSION['name'] = $aInforUser['name'];
            $_SESSION['user_level'] = $aInforUser['level'];
            Redirect::uri('home');

        }else{
            $_SESSION['value_email']=$_POST['email'];
            $_SESSION['error_login']="sai tk hoặc mk";
            Redirect::uri('login');
        }
    }
}
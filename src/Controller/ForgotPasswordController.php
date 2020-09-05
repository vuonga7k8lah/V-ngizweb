<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\database\DB;
use baitap\Model\ForgotModel;

class ForgotPasswordController
{
    public function forgotPassword()
    {
        $data = DB::makeConnection()->real_escape_string(trim($_POST['email']));
        if (ForgotModel::isEmailExist($data)[0] > 0) {
            $_SESSION['user_id_forgot']=ForgotModel::isEmailExist($data)[1]['user_id'];
            require_once 'views/icms/forgotpassword.php';
        } else {
            $_SESSION['error_forgot'] = 'email khong tồn Tại';
            Redirect::uri('forgot');
        }
    }

    public function forgotView()
    {
        require_once 'views/icms/forgotpass.php';
    }

    public function NewPassword()
    {
       $data['password']=md5(DB::makeConnection()->real_escape_string(trim($_POST['password'])));
       $data['user_id']=$_POST['user_id'];
       Redirect::uri('login');
    }

}
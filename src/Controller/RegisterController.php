<?php


namespace baitap\Controller;

use baitap\core\Redirect;
use baitap\core\URL;
use baitap\database\DB;
use baitap\Model\RegisterModel;

class RegisterController
{
    public function registerView()
    {
        require_once 'views/icms/register.php';
    }

    public function active()
    {
        if(isset($_SESSION['action'])){
            $email=$_SESSION['action'];
            RegisterModel::updateActive($email);
            Redirect::uri('login');
        }
    }

    public function registerAction()
    {
        $fn = $ln = $e = $p = false;
        if (isset($_POST['first_name'])) {
            $fn = DB::makeConnection()->real_escape_string(trim($_POST['first_name']));
        } else {
            $errors['first_name'] = 'first name sai định dạng';
        }
        if (isset($_POST['last_name'])) {
            $ln = DB::makeConnection()->real_escape_string(trim($_POST['last_name']));
        } else {
            $errors['last_name'] = 'last name sai định dạng';
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $e = DB::makeConnection()->real_escape_string(trim($_POST['email']));
        } else {
            $errors['email'] = 'email';
        }
        if (preg_match('/^[\w\'.-]{4,20}$/', $_POST['password1'])) {
            $values['password'] = $_POST['password1'];
            if ($_POST['password1'] == $_POST['password2']) {
                $p = DB::makeConnection()->real_escape_string(trim($_POST['password1']));
            } else {
                $errors['password2'] = 'password not match';
            }
        } else {
            $errors['password1'] = 'điền vào ô';
        }
//        if(isset($_POST['g-recaptcha-response'])){
//            $captcha1 = $_POST['g-recaptcha-response'];
//        }
//        if(!$captcha1){
//            $errors['$captcha1'] = "Hay xac nhan CAPTCHA";
//
//        }else{
//            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LccpcYZAAAAAFDzy-rgpJZQ61xQKyMRRlNRc0cX=".$captcha1."&remoteip=".$_SERVER['REMOTE_ADDR']);
//        }

        if ($fn && $ln && $e && $p) {
            if (RegisterModel::isEmailExist($e) > 0) {
                $_SESSION['email_Exist'] = 'email đã tồn tại';
                Redirect::uri('register');
            } else {
                $data['first_name'] = $fn;
                $data['last_name'] = $ln;
                $data['email'] = $e;
                $data['password'] = md5($p);
                $data['active'] = md5(uniqid(rand(), true));
                if (RegisterModel::insertDataActive($data)) {
                    $_SESSION['action']=$data['email'];
                    echo "<p class='success'>Tài khoản của bạn đã được đăng ký thành công. Email đã được gửi tới địa chỉ của bạn. Bạn phải
                            nhấn vào link để kích hoạt tài khoản trước khi sử dụng nó.</p>";
                    echo "<a href=" . URL::uri('active') . ">Hay Bấm Vào Đây</a>";
                }

            }
        } else {
            $_SESSION['valuesRegister'] = $values;
            $_SESSION['register'] = $errors;
            header('location:' . URL::uri('register'));
        }
    }
}
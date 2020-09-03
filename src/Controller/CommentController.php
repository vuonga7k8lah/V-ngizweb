<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\core\Session;
use baitap\core\URL;
use baitap\database\DB;
use baitap\Model\CommentModel;

class CommentController
{
    public function commentActon()
    {
        $data['page_id'] = $_POST['page_id'];
        $errors = array();
        // Validate name
        if (!empty($_POST['name'])) {
            $values['name'] = $_POST['name'];
            $data['name'] = DB::makeConnection()->real_escape_string(strip_tags($_POST['name']));
        } else {
            $errors['name'] = "Name không được để trống";
        }
        // Validate email
        if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $values['email'] = $_POST['email'];
            $data['email'] = DB::makeConnection()->real_escape_string(strip_tags($_POST['email']));
        } else {
            $errors['email'] = "email không đúng định dạng";
        }

        // Validate comment
        if (!empty($_POST['comment'])) {
            $values['comment'] = $_POST['comment'];
            $data['comment'] = DB::makeConnection()->real_escape_string(strip_tags($_POST['comment']));
        } else {
            $errors['comment'] = "comment không được để trống";
        }
        //Validate captcha question
        if (isset($_POST['captcha']) && trim($_POST['captcha']) != $_SESSION['q']['answer']) {
            $errors['captcha'] = "Hãy Nhập Đúng Câu Trả Lời";
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
        if (!empty($errors)) {
            $_SESSION['values'] = $values;
            $_SESSION['mess'] = $errors;
            header('location:' . URL::uri('paid') . '/' . $data['page_id']);
        } else {
            if (CommentModel::insertComment($data)) {
                unset($_SESSION['values']);
                header('location:' . URL::uri('paid') . '/' . $data['page_id']);

            }
        }


    }
}
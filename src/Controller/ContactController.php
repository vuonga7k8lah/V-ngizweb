<?php


namespace baitap\Controller;
use baitap\core\URL;

class ContactController
{
    public function contactView()
    {
        require_once 'views/icms/contact.php';
    }
    public function contactAction()
    {
        $errors = array();
        // Validate name
        if (!empty($_POST['name'])) {
            $values['name'] = $_POST['name'];
            $data['name'] = $_POST['name'];
        } else {
            $errors['name'] = "Name không được để trống";
        }
        // Validate email
        if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $values['email'] = $_POST['email'];
            $data['email'] =clean_email( $_POST['email']);
        } else {
            $errors['email'] = "email không đúng định dạng";
        }

        // Validate comment
        if (!empty($_POST['comment'])) {
            $values['comment'] = $_POST['comment'];
            $data['comment'] = $_POST['comment'];
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
            $_SESSION['valuesContact'] = $values;
            $_SESSION['contact'] = $errors;
            header('location:' . URL::uri('contact') );
        } else {
            $to      = $data['email'];
            $subject = $data['name'];
            $message = $data['comment'];
            $headers = array(
                'From' => 'webmaster@example.com',
                'Reply-To' => 'webmaster@example.com',
                'X-Mailer' => 'PHP/' . phpversion()
            );

            $x=mail($to, $subject, $message, $headers);
                if($x){
                    $_SESSION['suss_contact']='Thank pro <3 ';
                    unset($_SESSION['valuesContact']);
                    header('location:' . URL::uri('contact') );
                }
            }
        }
}
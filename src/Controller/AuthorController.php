<?php
namespace baitap\Controller;
use baitap\database\DB;
use baitap\Model\ForgotModel;
class AuthorController
{
    public function authorView()
    {
        require_once'views/icms/author.php';
    }

    public function validateEmail()
    {
        if(isset($_POST['email'])&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $e = DB::makeConnection()->real_escape_string(trim($_POST['email']));
            if (ForgotModel::isEmailExist($e)[0] > 0) {
                $aResponse =  [
                    "isValidEmail" => "no",
                    "msg" => "Khong the su dung email nay"
                ]; // not available
            } else {
                $aResponse =  [
                    "isValidEmail" => "yes",
                    "msg" => "Ban co the su dung email nay"
                ];
            }
        } else {
            $aResponse =  [
                "isValidEmail" => "no",
                "msg" => "Email khong dung"
            ];
        }

        echo json_encode($aResponse);
    }
}
<?php


namespace baitap\Model;


use baitap\database\DB;

class ForgotModel
{
    public static function isEmailExist($email)
    {
        $db = DB::makeConnection()->query("SELECT user_id FROM users where email='" . $email . "'");
        return [$db->num_rows, $db->fetch_assoc()];
    }

    public static function updateUser($data)
    {
        return DB::makeConnection()->query("UPDATE `users` SET `password`='".$data['password']."' where user_id=".$data['user_id']."");
    }
}
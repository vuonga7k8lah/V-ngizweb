<?php


namespace baitap\Model;


use baitap\database\DB;

class LoginModel
{
    public static function login($data)
    {
        $db=DB::makeConnection()->query("SELECT user_id, CONCAT_WS(' ', first_name, last_name) AS name,level FROM users WHERE (email = '".$data['email']."' AND password = '".$data['password']."') AND active IS NULL LIMIT 1");
        return [$db->num_rows,$db->fetch_assoc()];
    }

}
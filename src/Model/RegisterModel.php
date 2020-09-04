<?php


namespace baitap\Model;


use baitap\database\DB;

class RegisterModel
{
    public static function insertDataActive($data)
    {
        return DB::makeConnection()->query("INSERT INTO users (first_name, last_name, email, password, active, registration_date) VALUES ('" . $data['first_name'] . "','" . $data['last_name'] . "', '" . $data['email'] . "', '" . $data['password'] . "', '" . $data['active'] . "', null)");
    }

    public static function isEmailExist($email)
    {
        return DB::makeConnection()->query("SELECT email FROM users where email='" . $email . "'")->num_rows;
    }

    public static function updateActive($email)
    {
        return DB::makeConnection()->query("UPDATE users set active=null where email='".$email."'");
    }
}
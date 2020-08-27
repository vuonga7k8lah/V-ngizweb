<?php


namespace baitap\Model;


use baitap\database\DB;

class UserModel
{
    public static function selectAllUsers()
    {
        return DB::makeConnection()->query("SELECT user_id,first_name,last_name,email,level `user_id` FROM `users` ")->fetch_all();
    }
}
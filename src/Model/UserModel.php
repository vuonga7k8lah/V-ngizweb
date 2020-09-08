<?php


namespace baitap\Model;


use baitap\database\DB;

class UserModel
{
    public static function selectAllUsers()
    {
        return DB::makeConnection()->query("SELECT user_id,first_name,last_name,email,level `user_id` FROM `users` ")->fetch_all();
    }

    public static function SelectUser($id)
    {
        return DB::makeConnection()->query("SELECT * FROM users WHERE user_id =" . $id . "")->fetch_assoc();
    }

    public static function updateUser($name, $id)
    {
        return DB::makeConnection()->query("UPDATE users SET avarta = '" . $name . "' WHERE user_id = " . $id . " LIMIT 1");
    }

    public static function updateUserYourself($data)
    {
        return DB::makeConnection()->query("UPDATE `users` SET `first_name`='" . $data['first_name'] . "',`last_name`='" . $data['last_name'] . "',`email`='" . $data['email'] . "',`bio`='" . $data['bio'] . "' WHERE user_id = " . $data['user_id'] . " LIMIT 1");
    }

    public static function deleteUser($id)
    {
        return DB::makeConnection()->query("DELETE FROM `users` WHERE user_id=" . $id . "");
    }

    public static function updateAdmin($data)
    {
        return DB::makeConnection()->query("UPDATE `users` SET `first_name`='" . $data['first_name'] . "',`last_name`='" . $data['last_name'] . "',`email`='" . $data['email'] . "',`level`=" . $data['user_level'] . " WHERE user_id = " . $data['user_id'] . " LIMIT 1");
    }
}
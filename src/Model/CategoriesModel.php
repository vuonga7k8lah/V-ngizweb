<?php


namespace baitap\Model;


use baitap\database\DB;

class CategoriesModel
{
    public static function insertCategories($data)
    {
        return DB::makeConnection()->query("INSERT INTO categories value (null,1,'" . $data['category'] . "','" . $data['position'] . "')");
    }

    public static function countCat_id()
    {
        $db = DB::makeConnection()->query("SELECT count(cat_id) AS count FROM categories");
        return [$db->num_rows, $db->fetch_array()];
    }

    public static function SelectCategory()
    {
        return DB::makeConnection()->query("SELECT cat_id, cat_name FROM categories ORDER BY position ASC")->fetch_all();
    }

    public static function selectallCategory()
    {
        return DB::makeConnection()->query("SELECT cat_name FROM categories order by position asc ")->fetch_all();
    }

    public static function selectListCatagory($order_by)
    {
        return DB::makeConnection()->query("SELECT c.cat_id, c.cat_name, c.position, c.user_id, CONCAT_WS(' ', first_name, last_name) AS name FROM categories c JOIN users u ON u.user_id=c.user_id ORDER BY ".$order_by." ASC")->fetch_all();
    }
}
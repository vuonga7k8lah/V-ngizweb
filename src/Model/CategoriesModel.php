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

}
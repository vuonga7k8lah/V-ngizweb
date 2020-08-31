<?php


namespace baitap\Model;


use baitap\database\DB;

class HomeModel
{
    public static function getCategoriesMenu($id)
    {
        $db = DB::makeConnection()->query("SELECT p.page_name, p.page_id, p.content,DATE_FORMAT(p.post_on,'%M %d %Y') AS date,CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id FROM pages p JOIN users u WHERE p.cat_id=" . $id . " ORDER BY date ASC LIMIT 0, 10");
        return [$db->num_rows, $db->fetch_all()];
    }

    public static function getPageSingle($id)
    {
        return DB::makeConnection()->query("SELECT p.page_name, p.page_id, p.content,DATE_FORMAT(p.post_on,'%M %d %Y') AS date,CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id FROM pages p JOIN users u WHERE p.page_id=" . $id . "")->fetch_assoc();
    }
}
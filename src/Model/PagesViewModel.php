<?php


namespace baitap\Model;


use baitap\database\DB;

class PagesViewModel
{
    public static function isSelectPagesView($page_id)
    {
        $db = DB::makeConnection()->query("SELECT num_view, user_ip FROM pages_view WHERE page_id =" . $page_id . "");
        return [$db->num_rows, $db->fetch_assoc()];
    }

    public static function updatePagesView($page_id)
    {
        return DB::makeConnection()->query("UPDATE pages_view SET num_view = (num_view + 1) WHERE page_id =" . $page_id . "  LIMIT 1");
    }

    public static function insertData($page_id,$ip)
    {
        return DB::makeConnection()->query("INSERT INTO pages_view (page_id, num_view, user_ip) VALUES (".$page_id.", 1,'".$ip."')");
    }

}
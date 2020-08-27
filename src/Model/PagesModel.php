<?php


namespace baitap\Model;


use baitap\database\DB;

class PagesModel
{
    public static function PagesRequired($data)
    {
        return DB::makeConnection()->query("INSERT INTO pages value (null," . $data['user_id'] . "," . $data['cat_id'] . ",'" . $data['page_name'] . "','" . $data['content'] . "'," . $data['position'] . ",null)");
    }

    public static function selectListPages($order_by)
    {
        return DB::makeConnection()->query("SELECT p.page_id,p.page_name,p.post_on,CONCAT_WS(' ', first_name, last_name) AS name,p.content FROM pages p JOIN users u ON p.user_id=u.user_id ORDER BY " . $order_by . " ASC")->fetch_all();
    }

    public static function selectCategory()
    {
        $db = DB::makeConnection()->query("SELECT cat_id, cat_name FROM categories ORDER BY position ASC");
        return [$db->num_rows, $db->fetch_all()];
    }

    public static function selectOfEdit($id)
    {
        return DB::makeConnection()->query("SELECT * FROM pages where page_id=" . $id . "")->fetch_assoc();
    }

    public static function deletePage($id)
    {
        return DB::makeConnection()->query("DELETE FROM pages where page_id=".$id."");
    }
    public static function updatePage($data)
    {
        return DB::makeConnection()->query("UPDATE `pages` SET `cat_id`=".$data['cat_id'].",`page_name`='".$data['page_name']."',`content`='".$data['content']."',`position`=".$data['position'].",`post_on`=null WHERE page_id=".$data['page_id']." ");
    }
}
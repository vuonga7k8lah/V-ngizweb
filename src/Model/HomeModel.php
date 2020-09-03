<?php


namespace baitap\Model;


use baitap\database\DB;

class HomeModel
{
    public static function getCategoriesMenu($id)
    {
        $db = DB::makeConnection()->query("SELECT p.page_name, p.page_id, p.content,DATE_FORMAT(p.post_on,'%M %d %Y') AS date,CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id,count(cmm.comment_id) as socmm FROM pages p JOIN categories c on c.cat_id=p.cat_id JOIN users u on u.user_id=p.user_id left JOIN comments cmm on cmm.page_id=p.page_id WHERE c.cat_id=".$id." GROUP BY p.page_name, p.page_id, p.content,date,name");
        return [$db->num_rows, $db->fetch_all()];
    }

    public static function getPageSingle($id)
    {
        return DB::makeConnection()->query("SELECT p.page_name, p.page_id, p.content,DATE_FORMAT(p.post_on,'%M %d %Y') AS date,CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id,count(c.comment_id) as count FROM pages p JOIN users u on p.user_id=u.user_id left join comments c on c.page_id=p.page_id WHERE p.page_id=" . $id . "")->fetch_assoc();
    }

}
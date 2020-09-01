<?php


namespace baitap\Model;


use baitap\database\DB;

class CommentModel
{
    public static function insertComment($data)
    {
        return DB::makeConnection()->query("INSERT INTO comments value (null,'".$data['page_id']."','".$data['name']."','".$data['email']."','".$data['comment']."',null)");
    }
    public static function  selectAllComment($id)
    {
        $db=DB::makeConnection()->query("SELECT comment_id, author, comment, DATE_FORMAT(comment_date, '%b %d, %y') AS date FROM comments WHERE page_id =".$id."");
        return [$db->num_rows,$db->fetch_all()];
    }
}
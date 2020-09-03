<?php


namespace baitap\Model;


use baitap\database\DB;

class CommentModel
{
    public static function insertComment($data)
    {
        return DB::makeConnection()->query("INSERT INTO comments value (null,'" . $data['page_id'] . "','" . $data['name'] . "','" . $data['email'] . "','" . $data['comment'] . "',null)");
    }

    public static function selectAllComment($id)
    {
        $db = DB::makeConnection()->query("SELECT comment_id, author, comment, DATE_FORMAT(comment_date, '%b %d, %y') AS date FROM comments WHERE page_id =" . $id . "");
        return [$db->num_rows, $db->fetch_all()];
    }

    public static function SelectPagination()
    {
        return DB::makeConnection()->query("SELECT * FROM pages")->num_rows;
    }

    public static function SelectAllPagination($id,$limit)
    {
        $db=DB::makeConnection()->query("SELECT p.page_id, p.page_name, p.content,DATE_FORMAT(p.post_on, '%b %d, %y') AS date,CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id FROM pages p join users u on p.user_id=u.user_id WHERE u.user_id=".$id." ORDER BY date ASC LIMIT ".$limit.",4");
        return [$db->num_rows,$db->fetch_all()];
    }
}
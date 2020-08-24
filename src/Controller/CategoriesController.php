<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\core\Session;
use baitap\database\DB;
use baitap\Model\CategoriesModel;

class CategoriesController
{
    public function loadView()
    {
        require_once 'views/admin/View_add_categories.php';
    }

    public function addCategories()
    {
        $data = $_POST;
        $data['category']=DB::makeConnection()->escape_string(strip_tags($_POST['category']));
        if (empty($data['category'])) {
        Session::set('error_unique_category','Hãy Nhập Đủ Thông Tin Vào Bảng');
        Redirect::uri('add_categories');
        } else {
            $insert=CategoriesModel::insertCategories($data);
            Session::set('success','Thêm Thành Công');
            Redirect::uri('list_category');
        }
    }

}
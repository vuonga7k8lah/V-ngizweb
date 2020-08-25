<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\core\Request;
use baitap\core\Session;
use baitap\database\DB;
use baitap\Model\CategoriesModel;

class CategoriesController
{
    public function addViewCategories()
    {
        require_once 'views/admin/Categories/View_add_categories.php';
    }

    public function addCategories()
    {
        $data = $_POST;
        $data['category'] = DB::makeConnection()->escape_string(strip_tags($_POST['category']));
        if (empty($data['category'])) {
            Session::set('error_unique_category', 'Hãy Nhập Đủ Thông Tin Vào Bảng');
            Redirect::uri('add_categories');
        } else {
            $insert = CategoriesModel::insertCategories($data);
            Session::set('success', 'Thêm Thành Công');
            Redirect::uri('list_category');
        }
    }

    public function listCategoriesView()
    {
        require_once 'views/admin/Categories/listViewCategories.php';
    }

    public function editCategoriesView()
    {
        require_once 'views/admin/Categories/listViewCategories.php';

    }

    public function editCategories()
    {
        var_dump($_POST);
        die();
    }

    public function deleteCategories()
    {
        var_dump(Request::uri()[1]);
        die();
    }

    public function orderCategories()
    {
        $type = Request::uri()[1];
        switch ($type) {
            case 1:
                $order_by = 'cat_name';
                break;

            case 2:
                $order_by = 'position';
                break;

            case 3:
                $order_by = 'name';
                break;
        } // End Switch
        Session::set('order_by',$order_by);
        Redirect::uri('list_categories');
    }


}
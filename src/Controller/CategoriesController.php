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
            if (CategoriesModel::isNameCategoryExist($data['category'])>0){
                Session::set('error_Exist_category1', 'Tên Category đã tồn tại');
                Redirect::uri('add_categories');
            }
            else{
                $insert = CategoriesModel::insertCategories($data);
                Session::set('success', 'Thêm Thành Công');
                Redirect::uri('list_categories');
            }
        }
    }

    public function listCategoriesView()
    {
        require_once 'views/admin/Categories/listViewCategories.php';
    }

    public function editCategoriesView()
    {
        require_once 'views/admin/Categories/editViewCategories.php';

    }

    public function editCategories()
    {
        $data=$_POST;
        if (CategoriesModel::updateCategory($data)){
            Session::set('success_update', 'Update Thành Công');
            Redirect::uri('list_categories');
        }
    }

    public function deleteCategories()
    {
        $id = Request::uri()[1];
        if (CategoriesModel::deleteCategory($id)) {
            Session::set('success_delete', 'Xóa Thành Công');
            Redirect::uri('list_categories');
        }
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
        Session::set('order_by', $order_by);
        Redirect::uri('list_categories');
    }


}
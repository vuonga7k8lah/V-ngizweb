<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\core\Request;
use baitap\core\Session;
use baitap\Model\PagesModel;

class PageController
{
    public function addViewPages()
    {
        require_once 'views/admin/Pages/View_add_pages.php';
    }

    public function listViewPages()
    {
        require_once 'views/admin/Pages/listViewPages.php';
    }

    public function editViewPages()
    {
        require_once 'views/admin/Pages/editViewPages.php';
    }

    public function editPages()
    {
       $data=$_POST;
       if (PagesModel::updatePage($data)){
           Session::set('success_update_page', 'Cập Nhập Thành Công');
           Redirect::uri('list_pages');
       }

    }

    public function deletePages()
    {
        $id = Request::uri()[1];
        if (PagesModel::deletePage($id)){
            Session::set('success_delete_page', 'Xóa Thành Công');
            Redirect::uri('list_pages');
        }
    }

    public function orderPages()
    {
        $type = Request::uri()[1];
        switch ($type) {
            case 1:
                $order_by = 'page_name';
                break;

            case 2:
                $order_by = 'post_on';
                break;

            case 3:
                $order_by = 'name';
                break;
        } // End Switch
        Session::set('order_by_page', $order_by);
        Redirect::uri('list_pages');
    }

    public function addPages()
    {
        $data = $_POST;
        $data['user_id'] = 1;
        if (empty($data['page_name']) || empty($data['content'])) {
            Session::set('check_required', 'Hãy Nhập Đầy Đủ Thông Tin');
            Redirect::uri('add_pages');
        } else {
            if (PagesModel::PagesRequired($data)) Redirect::uri('list_pages');
        }

    }

}
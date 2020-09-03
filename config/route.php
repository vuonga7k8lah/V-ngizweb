<?php
/**
* @var $oRoute \baitap\core\Route ...
*/
//404
$oRoute->get('404', 'baitap\Controller\PageNotFound@loadView');
//home-izcms
$oRoute->get('home', 'baitap\Controller\HomeController@loadView');
$oRoute->get('cid', 'baitap\Controller\HomeController@cidView');
$oRoute->get('paid', 'baitap\Controller\HomeController@paidView');

//admin-izcms
$oRoute->get('admin', 'baitap\Controller\AdminController@loadView');
//categories-admin
$oRoute->get('add_categories', 'baitap\Controller\CategoriesController@addViewCategories');
$oRoute->get('list_categories', 'baitap\Controller\CategoriesController@listCategoriesView');
$oRoute->get('edit_categories', 'baitap\Controller\CategoriesController@editCategoriesView');
$oRoute->get('delete_categories', 'baitap\Controller\CategoriesController@deleteCategories');
$oRoute->post('add_categories', 'baitap\Controller\CategoriesController@addCategories');
$oRoute->post('edit_categories', 'baitap\Controller\CategoriesController@editCategories');
//logout
$oRoute->get('logout', 'baitap\Controller\LogoutController@adminLogout');
//Sap xep theo thu tu cua table head
$oRoute->get('order_categories', 'baitap\Controller\CategoriesController@orderCategories');
$oRoute->get('order_pages', 'baitap\Controller\PageController@orderPages');

//pages-admin
$oRoute->get('add_pages', 'baitap\Controller\PageController@addViewPages');
$oRoute->get('list_pages', 'baitap\Controller\PageController@listViewPages');
$oRoute->get('edit_pages', 'baitap\Controller\PageController@editViewPages');
$oRoute->get('delete_pages', 'baitap\Controller\PageController@deletePages');
$oRoute->post('add_pages', 'baitap\Controller\PageController@addPages');
$oRoute->post('edit_pages', 'baitap\Controller\PageController@editPages');
//users-admin
$oRoute->get('add_user', 'baitap\Controller\UserController@addViewUser');
$oRoute->get('list_user', 'baitap\Controller\UserController@listViewUser');
$oRoute->get('edit_user', 'baitap\Controller\UserController@editViewUser');
$oRoute->get('delete_user', 'baitap\Controller\UserController@deleteUser');
$oRoute->post('add_user', 'baitap\Controller\UserController@addUser');
$oRoute->post('edit_user', 'baitap\Controller\UserController@editUser');
//Comment
$oRoute->post('comment', 'baitap\Controller\CommentController@commentActon');
//author
$oRoute->get('author', 'baitap\Controller\AuthorController@authorView');
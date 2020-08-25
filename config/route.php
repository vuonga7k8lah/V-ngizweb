<?php
/**
* @var $oRoute \baitap\core\Route ...
*/
//404
$oRoute->get('404', 'baitap\Controller\PageNotFound@loadView');
//home-izcms
$oRoute->get('home', 'baitap\Controller\HomeController@loadView');
//admin-izcms
$oRoute->get('admin', 'baitap\Controller\AdminController@loadView');
//categories
$oRoute->get('add_categories', 'baitap\Controller\CategoriesController@addViewCategories');
$oRoute->get('list_categories', 'baitap\Controller\CategoriesController@listCategoriesView');
$oRoute->get('edit_categories', 'baitap\Controller\CategoriesController@editCategoriesView');
$oRoute->get('delete_categories', 'baitap\Controller\CategoriesController@deleteCategories');
$oRoute->post('add_categories', 'baitap\Controller\CategoriesController@addCategories');
$oRoute->post('edit_categories', 'baitap\Controller\CategoriesController@editCategories');
//Sap xep theo thu tu cua table head
$oRoute->get('order_categories', 'baitap\Controller\CategoriesController@orderCategories');

//pages
$oRoute->get('add_pages', 'baitap\Controller\PageController@loadView');
$oRoute->post('add_pages', 'baitap\Controller\PageController@addPages');
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
$oRoute->get('add_categories', 'baitap\Controller\CategoriesController@loadView');
$oRoute->post('add_categories', 'baitap\Controller\CategoriesController@addCategories');
//pages
$oRoute->get('add_pages', 'baitap\Controller\PageController@loadView');
$oRoute->post('add_pages', 'baitap\Controller\PageController@addPages');
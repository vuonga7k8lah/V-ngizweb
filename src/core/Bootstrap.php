<?php

use baitap\Core\App;
use \baitap\Core\Request;
use \baitap\Core\Route;
use baitap\Database\DB;

require_once 'vendor/autoload.php';
require_once 'function/function.php';
App::bind('config/app', require_once "config/app.php");
App::bind('MYSQL', DB::makeConnection());
Route::load("config/route.php")
    ->direct(Request::uri()[0], Request::method());

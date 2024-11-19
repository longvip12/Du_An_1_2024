<?php
session_start();
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/controllers/homeController.php";
require_once __DIR__ . "/controllers/ProductController.php";
require_once __DIR__ . "/models/BaseModel.php";
require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Product.php";
require_once __DIR__ . "/common/function.php";
require_once __DIR__ . "/controllers/SearchController.php";
$ctl = $_GET['ctl']??'';
match ($ctl){
    '', 'home'=>(new homeController)->index(),
    'category'=>(new ProductController)->list(),
    'search'=>(new SearchController)->search(),

    default => view("err.404"),
};
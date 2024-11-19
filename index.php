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


require_once __DIR__ . "/controllers/AccountController.php";
require_once __DIR__ . "/models/Account.php";
require_once __DIR__ . "/models/AccountQuery.php";

$ctl = $_GET['ctl']??'';

match ($ctl){
    '', 'home'=>(new homeController)->index(),
    'category'=>(new ProductController)->list(),
    'search'=>(new SearchController)->search(),
    'login' => (new AccountController)->login(),
    'logout' => (new AccountController)->logout(),
    default => view("err.404"),
};

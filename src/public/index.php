<?php

require_once __DIR__ ."/../vendor/autoload.php";
require_once __DIR__ ."/../app/core/db.php";
use App\core\Router;

session_start();


$router = new Router();
$router->get("/",'HomeController@index');
$router->dispatch();
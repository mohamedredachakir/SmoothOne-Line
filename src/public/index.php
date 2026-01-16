<?php

require_once __DIR__ ."/../vendor/autoload.php";
require_once __DIR__ ."/../app/core/db.php";
use App\core\Router;

session_start();

/**
 * Dump and die.
 *
 * @param $var
 * @return void
 */
function dd(...$var) {
    foreach ($var as $elem) {
        echo '<pre class="codespan">';
        echo '<code>';
        !$elem || $elem == '' ? var_dump($elem) : print_r($elem);
        echo '</code>';
        echo '</pre>';
    }

    die();
}


$router = new Router();
$router->get("/",'HomeController@index');
$router->get('/login','Authcontroller@showlogin');
$router->post('/login','Authcontroller@login');
$router->dispatch();
<?php

require_once __DIR__ ."/../vendor/autoload.php";
require_once __DIR__ ."/../app/core/db.php";
use App\core\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
$router->get('/profile','Profilecontroller@index');
$router->post('/logout','Authcontroller@logout');
$router->get('/admin', 'Admincontroller@dashboard');
$router->get('/admin/classes', 'AdminClassController@index');
$router->get('/admin/classes/create', 'AdminClassController@create');
$router->post('/admin/classes/store', 'AdminClassController@store');
$router->get('/admin/classes/edit', 'AdminClassController@edit');
$router->post('/admin/classes/update', 'AdminClassController@update');
$router->post('/admin/classes/delete', 'AdminClassController@delete');
$router->get('/admin/sprints', 'AdminsprintController@index');
$router->get('/admin/sprints/create', 'AdminsprintController@create');
$router->post('/admin/sprints/store', 'AdminsprintController@store');
$router->get('/admin/sprints/edit', 'AdminsprintController@edit');
$router->post('/admin/sprints/update', 'AdminsprintController@update');
$router->post('/admin/sprints/delete', 'AdminsprintController@delete');
$router->dispatch();
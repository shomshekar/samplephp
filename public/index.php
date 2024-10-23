<?php

use Core\Router;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__.'/../';

require BASE_PATH."vendor/autoload.php";
// var_dump(BASE_PATH);

$config = require BASE_PATH."config.php";

require BASE_PATH."Core/functions.php";

// classes like Database, Response are auto load only on calling it, 
// not before that
// spl_autoload_register(function($class){

//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

//     require base_path("{$class}.php");
// });

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method, $config);
} catch (ValidationException $exception) {
    Core\Session::flash('errors', $exception->errors());
    Core\Session::flash('old', $exception->old());

    redirect($router->previousUrl());
}



Core\Session::unflash();
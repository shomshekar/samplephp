<?php 

use Core\Response;

function dd($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die();
}

function urlIs($value){
    return ($_SERVER['REQUEST_URI'] === $value);
}

function authorize($config, $condition, $status=Response::FORBIDDEN){
    if (! $condition){
        abort($config, $status);
    }
}

function base_path($path){
    return BASE_PATH.$path;
}

function view($path, $attributes = []){

    extract($attributes);

    require base_path('views/'.$path);
}

function abort($config, $code=Response::PAGE_NOT_FOUND){
    http_response_code($code);

    return require base_path("views/{$code}.php");

    die();
}

function redirect($path){
    header('location: '.$path);
    die();
}

function old($key, $default = null){
    return isset(Core\Session::get('old')[$key]) ? Core\Session::get('old')[$key] : $default;
}
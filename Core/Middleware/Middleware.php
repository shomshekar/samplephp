<?php 

namespace Core\Middleware;

use Exception;

class Middleware{

    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key, $config){
        if(!$key){
            return;
        }
        
        $middleware = isset(Middleware::MAP[$key]) ? Middleware::MAP[$key] : false;
        if(!$middleware){
            throw new Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle($config);
    }
}
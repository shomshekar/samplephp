<?php

namespace Core;

use Core\Response;
use Core\Middleware\Middleware;

class Router{

    protected $routes = [];

    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller){
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller){
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri,$controller){
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller){
        return $this->add('PATCH', $uri, $controller);
    }
    
    public function put($uri, $controller){
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function previousUrl(){
        return $_SERVER['HTTP_REFERER'];
    }

    public function route($uri, $method, $config){

        foreach($this->routes as $route){
            if($route['uri'] == $uri && $route['method'] == strtoupper($method)){
                
                Middleware::resolve($route['middleware'], $config);


                // if($route['middleware']){
                //     $middleware = Middleware::MAP[$route['middleware']];
                //     (new $middleware)->handle($config);
                // }
                
                // if($route['middleware'] == 'guest'){
                //     (new Guest)->handle($config);
                // }

                // if($route['middleware'] == 'auth'){
                //     (new Auth)->handle($config);
                // }
                
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        return $this->abort($config);
    }

    protected function abort($config, $code=Response::PAGE_NOT_FOUND){
        http_response_code($code);

        return require base_path("views/{$code}.php");

        die();
    }

}

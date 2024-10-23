<?php 

namespace Core\Middleware;

class Auth{
 
    public function handle($config){
        if(! isset($_SESSION['user']) ? true : false){
            header('location: '.$config['base_url']);
            exit();
        }
    }
}
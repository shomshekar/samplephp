<?php 

namespace Core;


class Authenticator{

    public function attempt($config, $attributes){
        $db = App::resolve('Core\Database');

        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $attributes['email']
        ])->find();

        if($user){
            if(password_verify($attributes['password'], $user['password'])){
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
    
        session_regenerate_id(true);
    }
    
    public function logout(){
        
        Session::destroy();
    }


}
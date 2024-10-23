<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm{

    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::email($attributes['email'])){
            $this->errors['email'] = "Please provide a valid email.";
        }

        if(!Validator::string($attributes['password'], 7, 15)){
            $this->errors['password'] = "Please provide minimum 7 characters and maximum 15 characters as password.";
        }        
    }

    public static function validate($attributes){

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;    
    }

    public function throw(){
        return ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(){
        return count($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field] = $message;

        return $this;
    }

}
<?php 

namespace Core;

class Validator {

    public static function string($value, $min=1, $max=1000){

        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= 1000;

    }

    public static function email($email){

        return filter_var($email, FILTER_VALIDATE_EMAIL);

    }

}
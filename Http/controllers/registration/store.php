<?php

use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::email($email)){
    $errors['email'] = "Please provide a valid email.";
}

if(!Validator::string($password, 7, 15)){
    $errors['password'] = "Please provide minimum 7 characters and maximum 15 characters as password.";
}

if(!empty($errors)){
    return view('registration/create.view.php',[
        'errors' => $errors,
        'heading' => 'Register User',
        'config' => $config
    ]);
}

$db = App::resolve('Core\Database');

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if($user){
    header('location: '.$config['base_url']);
    die();
} else {
    $db->query("INSERT INTO `users`(`email`, `password`) VALUES (:email,:password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);

    header('location: '.$config['base_url']);
    die();
}
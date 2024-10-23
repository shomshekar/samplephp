<?php 

use Core\App;
use Core\Validator;

// $db_config = $config['database'];
// $db = new Database($db_config);
$db = App::resolve('Core\Database');

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = "Body should have minimum 1 character and less than 1000 character";
}

if(!empty($errors)){
    return view("notes/create.view.php",[
        "heading" => "Create Note",
        "errors" => $errors,
        "config" => $config
    ]);    
}

$db->query("INSERT INTO `notes`(`body`, `user_id`) VALUES (:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: '.$config['base_url'].'notes');
die();
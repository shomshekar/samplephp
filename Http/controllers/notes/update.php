<?php

use Core\App;
use Core\Validator;

$currentUserId = 1;

// $db_config = $config['database'];
// $db = new Database($db_config);
$db = App::resolve('Core\Database');

$note = $db->query("SELECT id, body, user_id FROM notes WHERE id = :id", [
    'id' => $_POST['note_id'] 
])->findOrFail($config);

// dd($note);

authorize($config, ($note['user_id'] == $currentUserId));

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = "Body should have minimum 1 character and less than 1000 character";
}

if(!empty($errors)){
    return view("notes/edit.view.php",[
        "heading" => "Edit Note",
        "note" => $note,
        "errors" => $errors,
        "config" => $config
    ]);    
}



// form submitted for update
$db->query("UPDATE notes SET body=:body WHERE id=:note_id", [
    'body' => $_POST['body'], 
    'note_id' => $_POST['note_id']
]);

header('location: '.$config['base_url'].'notes');
exit();

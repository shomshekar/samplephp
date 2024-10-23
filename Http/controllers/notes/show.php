<?php

use Core\App;

$currentUserId = 1;

// $db_config = $config['database'];
// $db = new Database($db_config);
$db = App::resolve('Core\Database');

$note = $db->query("SELECT id, body, user_id FROM notes WHERE id = :id", [
    'id' => $_GET['id'] 
])->findOrFail($config);

// dd($note);

authorize($config, ($note['user_id'] == $currentUserId));
    
view("notes/show.view.php",[
    "heading" => "Note",
    "note" => $note,
    "config" => $config
]);



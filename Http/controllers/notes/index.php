<?php

use Core\App;

// $db_config = $config['database'];
// $db = new Database($db_config);

$db = App::resolve('Core\Database');

$notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id", ['user_id' => 1])->findAll();

view("notes/index.view.php",[
    "heading" => "My Notes",
    "notes" => $notes,
    "config" => $config
]);
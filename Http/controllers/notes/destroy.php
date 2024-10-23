<?php

use Core\App;

$currentUserId = 1;

// $db_config = $config['database'];
// $db = new Database($db_config);
$db = App::resolve('Core\Database');

$note = $db->query("SELECT id, body, user_id FROM notes WHERE id = :id", [
    'id' => $_POST['note_id'] 
])->findOrFail($config);

// dd($note);

authorize($config, ($note['user_id'] == $currentUserId));


// form submitted for delete
$db->query("DELETE FROM notes where id=:note_id", ['note_id' => $_POST['note_id']]);

header('location: '.$config['base_url'].'notes');
exit();

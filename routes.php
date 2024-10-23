<?php 

$router->get($config['base_path'], 'index.php');
$router->get($config['base_path']."about", "about.php");
$router->get($config['base_path']."contact", "contact.php");

$router->get($config['base_path']."notes", "notes/index.php")->only('auth');
$router->get($config['base_path']."note", "notes/show.php");
$router->delete($config['base_path']."note",'notes/destroy.php');

$router->get($config['base_path']."notes/create", "notes/create.php");

$router->get($config['base_path']."note/edit", "notes/edit.php");
$router->patch($config['base_path']."note", "notes/update.php");

$router->post($config['base_path']."notes", "notes/store.php");

$router->get($config['base_path']."register", "registration/create.php")->only('guest');
$router->post($config['base_path']."register", "registration/store.php")->only('guest');

$router->get($config['base_path']."login", "sessions/create.php")->only('guest');
$router->post($config['base_path']."login", "sessions/store.php")->only('guest');

$router->delete($config['base_path']."logout", "sessions/destroy.php")->only('auth');
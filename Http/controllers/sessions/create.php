<?php 

view("sessions/create.view.php",[
    "heading" => "Log In",
    "config" => $config,
    "errors" => Core\Session::get('errors')
]);
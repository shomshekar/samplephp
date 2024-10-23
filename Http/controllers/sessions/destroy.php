<?php

use Core\Authenticator;

(new Authenticator)->logout();

header('location: '.$config['base_url']);
die();
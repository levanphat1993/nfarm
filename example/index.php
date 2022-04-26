<?php

require_once('vendor/autoload.php');
require_once('src/view/views.php');


$uri = $_SERVER['REQUEST_URI'] ?? 'index';




$views = new Views();
$views->render($uri);


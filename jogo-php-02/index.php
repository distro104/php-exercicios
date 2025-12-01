<?php

//start session

session_start();

//define control variable
define('CONTROL', True);

//define routes
$route = $_GET['route'] ?? 'start';

$script = null;

switch ($route) {
    case 'start':
        $script = 'start.php';
        break;
    case 'game':
        $script = 'game.php';
        break;
    case 'end':
        $script = 'end.php';
        break;
    default: 
        $script = '404.php';
        break;
}

//view
require_once 'inc/header.php';
require_once "inc/$script";
require_once 'inc/header.php';
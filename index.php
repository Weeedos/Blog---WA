<?php
session_start();
$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '/':
    case '/home':
        $redirect = '/views/index.php';
        break;
    case '/login':
        $redirect = '/views/login.php';
        break;
    case '/logout':
        $redirect = '/views/logout.php';
        break;
    case '/blog':
        $redirect = '/views/blog.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        exit();
}


$_SESSION['site'] = $redirect;
require_once __DIR__ . $redirect ?? __DIR__ . '/index.php';
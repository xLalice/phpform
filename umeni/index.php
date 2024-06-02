<?php
session_start();

// Define the base path for the project
$base_path = '/umeni';

// Parse the URL to determine the requested page
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = str_replace($base_path, '', $request);

switch ($request) {
    case '/':
    case '/login':
        require 'index.html';
        break;
    case '/register':
        require 'views/register.html';
        break;
    case '/welcome':
        require 'scripts/welcome.php';
        break;
    case '/logout':
        require 'scripts/logout.php';
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
?>

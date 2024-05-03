<?php

$routes = [
    '' => 'index.php',
    'dashboard' => 'dashboard.php',
];

$route = isset($_GET['route']) ? $_GET['route'] : 'landing';

if (array_key_exists($route, $routes)) {
    include 'view/'.$routes[$route].'php';
} else {
    include 'error.php';
}
<?php

// debut session
session_start();

// chargement des routes permis
$routes_permis = require_once __DIR__ . '/../inc/routes.php';

// definition de la route
$routes = $_GET['routes'] ?? 'home';

// verifie si l'user est connecté
if (!isset($_SESSION['user']) && $routes !== 'login_submit') {
    $routes = 'login';
}

// si l'user est connecté et essaye d'entrer dans login
if (isset($_SESSION['user']) && $routes === 'login') {
    $routes = 'home';
}

// si la route n'existe pas
if (!in_array($routes, $routes_permis)) {
    $routes = '404';
}

// preparation de la page
$script = null;

switch ($routes) {
    case '404':
        $script .= '404.php';
        break;

    case 'login':
        $script .= 'login.php';
        break;

    case 'login_submit':
        $script .= 'login_submit.php';
        break;

    case 'logout':
        $script .= 'logout.php';
        break;

    case 'home':
        $script .= 'home.php';
        break;

    case 'page1':
        $script .= 'page1.php';
        break;
    case 'page2':
        $script .= 'page2.php';
        break;
    case 'page3':
        $script .= 'page3.php';
        break;
}

// chargement des scripts permanentes
require_once __DIR__ . "/../inc/config.php";
require_once __DIR__ . "/../inc/database.php";

// presentation de la page
require_once __DIR__ . "/../inc/header.php";
require_once __DIR__ . "/../scripts/$script";
require_once __DIR__ . "/../inc/footer.php";

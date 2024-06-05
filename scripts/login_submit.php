<?php

// verifie s'il y a un POST
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?route=login');
    exit;
}

// recupere les données du  POST
$user = $_POST['text_user'] ?? null;
$senha = $_POST['text_password'] ?? null;

// verifie si les données sont inserées
if(!$user || !$password) {
    header('Location: /?route=login');
    exit;
}

// la classe de la base de données est dejà chargée dans l'index.php
$db = new database();

// va chercher le user dans la base de données
$params = [
    ':user' => $user
];
$sql = "SELECT * FROM users WHERE user = :user";
$result = $db->query($sql, $params);

// verifie si un erreur c'est arrivé
if($result['status'] === 'error') {
    
    header('Location: index.php?route=404');
    exit;
}

// verifie si l'user exists
if(count($result['data']) === 0) {
    
    // erreur de session
    $_SESSION['erreur'] = 'User or password invalide';
    
    header('Location: index.php?route=login');
    exit;
}

// verifie si le mot de pass est correct
if(!password_verify($password, $result['data'][0]->password)) {

    // erreur de session
    $_SESSION['erreur'] = 'User or password invalide';
    
    header('Location: index.php?route=login');
    exit;
}

// define la session de user
$_SESSION['user'] = $result['data'][0];

// redirectione vers la page principal
header('Location: index.php?route=home');
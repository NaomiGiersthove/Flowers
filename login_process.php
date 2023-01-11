<?php

require 'db_config.php';

session_start();

$username = $_POST['username'];
$pwd = hash('sha256', $_POST['password']);

// the user data based on email
$user = pdo(
    $pdo, "SELECT * FROM medewerkers WHERE username=:user AND password=:password", 
    ['user' => $username, 'password' => $pwd]
)->fetch();

if ($user) {
    $_SESSION['login'] = $username;
}

header("location: index.php");
?>

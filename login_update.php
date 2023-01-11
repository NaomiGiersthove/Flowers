<?php

require 'db_config.php';

session_start();

$username = $_SESSION['login'];
$pwd = hash('sha256', $_POST['password']);

// the user data based on email

$updated = pdo(
    $pdo, "UPDATE medewerkers SET password=:password WHERE username = :username",
    ['username' => $username, 'password' => $pwd]
)->rowCount();

if ($user) {
    $_SESSION['login'] = $username;
} else {
    header("location: edit_password.php");
}

header("location: index.php");
?>

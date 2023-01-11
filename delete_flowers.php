<?php

session_start();

require 'db_config.php';

if ($_SESSION['login'] !== 'admin') {
    header('location: index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // save record
    pdo($pdo, "DELETE FROM magazijnen WHERE id = :id", ['id' => $id]);
    header('location: index.php');
}
?>
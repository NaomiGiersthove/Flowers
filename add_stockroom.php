<?php

session_start();

require 'db_config.php';

if ($_SESSION['login'] !== 'admin') {
    header('location: index.php');
}

if (isset($_POST['magazijn_naam'])) {
    $magazijn = $_POST['magazijn_naam'];

    // save record
    pdo($pdo, "INSERT INTO magazijnen VALUES (null, ?)", [$magazijn]);
    header('location: stockrooms.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="POST">
        <label>Magazijn naam:</label>
        <input type="text" name="magazijn_naam">
        <input type="submit" name="submit" value="submit">
   </form> 
</body>
</html>
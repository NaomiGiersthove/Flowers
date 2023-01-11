<?php

session_start();

require 'db_config.php';

if ($_SESSION['login'] !== 'admin') {
    header('location: index.php');
}

$stockroom = $_POST['stockroom'];
$flower = $_POST['flower'];
$total_flowers = $_POST['total_flowers'];

$total = pdo($pdo, "SELECT aantal FROM voorraad_bloemen WHERE magazijn_id = ? AND bloem_id = ?", [$stockroom, $flower])->fetchColumn();

if ($total) {
    // update voorraad
    $newTotal = $total + $total_flowers;
    pdo($pdo, "UPDATE voorraad_bloemen SET aantal = $newTotal WHERE magazijn_id = ? AND bloem_id = ?", [$stockroom, $flower]);
} else {
    // insert voorraad
    pdo($pdo, "INSERT INTO voorraad_bloemen VALUES (null, ?, ?, ?)", [$stockroom, $flower, $total_flowers]);
}

header('location: stockrooms.php');

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
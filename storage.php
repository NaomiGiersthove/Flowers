<?php

require_once 'header.php';
require_once 'menu.php';
require 'db_config.php';

if ($_SESSION['login'] !== 'admin') {
    header('location: index.php');
}

// select all stockrooms
$stockrooms = pdo($pdo, "SELECT id, magazijn_naam FROM magazijnen")->fetchAll();

// select all flowers
$flowers = pdo($pdo, "SELECT id, bloem_naam FROM bloemen")->fetchAll();



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
    <title>Voorraad</title>
</head>
<body>
   <form action="add_storage.php" method="POST">
   <label for="stockroom">Kies een magazijn:</label>
   <select name="stockroom" id="stockroom">
    <?php 
    foreach ($stockrooms as $stockroom) {
        echo "<option value=\"". $stockroom['id']. "\">".$stockroom['magazijn_naam']. "</option>";
    }      
    ?>
    </select>
    <br>
    <label for="flower">Kies een bloemtype:</label>
   <select name="flower" id="flower">
   <?php 
    foreach ($flowers as $flower) {
        echo "<option value=\"". $flower['id']. "\">".$flower['bloem_naam']. "</option>";
    }      
    ?>
    </select>
    <br>
    <label for="total_flowers">Aantal bloemen:</label>
    <input type="text" name="total_flowers">
    <br>
    <input type="submit" name="submit" value="submit">
   </form> 
</body>
</html>
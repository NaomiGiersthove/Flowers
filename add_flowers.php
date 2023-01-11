<?php

session_start();

require 'db_config.php';

if ($_SESSION['login'] !== 'admin') {
    header('location: index.php');
}

if (isset($_POST['bloem_naam']) && !empty($_POST['bloem_naam'])) {
    $bloem_naam = $_POST['bloem_naam'];
    $bloem_code = $_POST['bloem_code'];
    $bloem_img = $_POST['bloem_img'];
    $prijs_per_stuk = number_format($_POST['prijs_per_stuk'], 2);

    // save record
    pdo($pdo, "INSERT INTO bloemen VALUES (null, ?, ?, ?, ?)", [$bloem_code, $bloem_naam, $bloem_img, $prijs_per_stuk]);
    header('location: flowers.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add flowers</title>
</head>
<body>
   <form action="" method="POST">
        <label>Bloemnaam:</label>
        <input type="text" name="bloem_naam"><br>
        <label>Bloem code:</label>
        <input type="text" name="bloem_code"><br>
        <label>Bloem image:</label>
        <input type="text" name="bloem_img"><br>
        <label>Prijs per stuk:</label>
        <input type="text" name="prijs_per_stuk"><br>
        <input type="submit" name="submit" value="verstuur">
   </form> 
</body>
</html>
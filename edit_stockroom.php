<?php

session_start();

require 'db_config.php';

if ($_SESSION['login'] !== 'admin') {
    header('location: index.php');
}

if (isset($_POST['magazijn_naam'])) {
    $magazijn = $_POST['magazijn_naam'];
    $id = $_POST['magazijn_id'];

    // save record
    pdo($pdo, "UPDATE magazijnen SET magazijn_naam = :naam WHERE id = $id", ['naam' => $magazijn]);

    header('location: stockrooms.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = pdo($pdo, "SELECT * FROM magazijnen WHERE id = $id")->fetch();
    //$magazijn = $_POST['magazijn_naam'];
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
        <input type="text" name="magazijn_naam" value="<?php echo $result['magazijn_naam'];?>">
        <input type="hidden" name="magazijn_id" value="<?php echo $result['id'];?>">
        <input type="submit" name="submit" value="submit">
   </form> 
</body>
</html>
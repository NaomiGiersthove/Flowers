<?php

require 'db_config.php';
require_once 'header.php'; 
require_once 'menu.php';

if ($_SESSION['login'] !== 'admin') {
    header('location: index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    print_r($_POST);
    /*$bloemen = pdo(
        $pdo, "UPDATE voorraad_bloemen SET aantal = ? WHERE id = ?", [$_POST['']]);
    die();*/
}

$bloemen = pdo(
    $pdo, "SELECT v.*, bloem_naam, bloem_code, magazijn_naam FROM magazijnen m
    LEFT JOIN voorraad_bloemen v ON m.id = v.magazijn_id
    LEFT JOIN bloemen b ON b.id = v.bloem_id
    WHERE m.id = $id"
)->fetchAll();

$i = 0;
foreach ($bloemen as $bloem) {
    $magazijn = $bloem['magazijn_naam'];        
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
<table>
  <tr>
    <th>Bloemnaam</th>
    <th>Bloemcode</th>
    <th>Aantal</th>
  </tr>
  <form action="view_stockroom.php" method="POST">
  <?php
    foreach ($bloemen as $bloem) {
        $bloem_id = $bloem['bloem_id'];
        echo "<tr>";
        echo "<td>{$bloem['bloem_naam']}</td>";
        echo "<td>{$bloem['bloem_code']}</td>";
        echo "<td><input name=\"aantal[{$bloem['id']}]\" value=\"{$bloem['aantal']}\" onchange=\"submitForm(this, {$bloem['id']})\"></td>";
        echo "<td><a href=\"edit_stockroom.php?id={$bloem['id']}&aantal={$bloem['aantal']}\">Edit</a></td>";
        echo "</tr>";        
    }
    echo "<input type=\"hidden\" name=\"magazijn_id\" value=\"{$bloem['magazijn_id']}\">";
    ?>
  </form>
</table>
<script>
function submitForm(elem, voorraad_id) {
    if (elem.value) {
        //alert(bloem_id);
        location.href = 'edit_stockroom.php?aantal='+elem.value+'voorraad_id='+voorraad_id;
        //elem.form.submit();
    }
}
</script>
</body>
</html>
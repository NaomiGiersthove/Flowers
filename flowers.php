<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>

<?php
if (!isset($_SESSION['login'])) header('location: index.php');

require 'db_config.php';

$flowers = pdo($pdo, "SELECT * FROM bloemen")->fetchAll();

foreach ($flowers as $flower) {
    echo $flower['bloem_naam'] . ' ' . $flower['bloem_code'] . 
    "<a href=\"edit_flower.php?id=". $flower['id'] ."\"> Edit</a>
    <a href=\"delete_flower.php?id=". $flower['id'] ."\">Delete</a>
    <br>";
}

?>
<a href="add_flowers.php">Toevoegen bloemtype</a>

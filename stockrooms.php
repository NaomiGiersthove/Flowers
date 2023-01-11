<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>

<?php

require 'db_config.php';

$storages = pdo($pdo, "SELECT * FROM magazijnen")->fetchAll();

foreach ($storages as $storage) {
    echo $storage['magazijn_naam'] . 
    "<a href=\"view_stockroom.php?id=". $storage['id'] ."\">View</a>
    <a href=\"edit_stockroom.php?id=". $storage['id'] ."\"> Edit</a>    
    <br>";
}

?>
<a href="add_stockroom.php">Toevoegen magazijn</a>

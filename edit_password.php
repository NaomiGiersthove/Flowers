<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>
<?php

if (!isset($_SESSION['login'])) {
    header("location: login.php");
}
?>

<form action="login_update.php" method="post">
    Wijzig uw wachtwoord: <input name="password" type="password">
    <button type="submit" >Update</button><br>
</form>
</body>
</html>
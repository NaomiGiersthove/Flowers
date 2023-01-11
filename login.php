<?php

session_start();

// Finally, destroy the session.
//session_destroy();
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
<form action="login_process.php" method="post">
    <label for="username"><b>Username: </b></label><br> 
    <input name="username" value=""><br>
    <label for="password"><b>Password: </b></label><br>
    <input name="password" type="password"><br>
    <button type="submit" >Login</button><br>
</form>
</body>
</html>
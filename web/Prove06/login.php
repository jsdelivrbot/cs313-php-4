<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="appointment.css">
</head>
<body>
    <h1>Please Log In!</h1>

    <form action="redirect.php" method="post">
        Username:
        <input type="text" name="uname" autofocus><br>
        Password:
        <input type="password" name="pass"><br>
        <input type="hidden" name="pageFrom" value="loginPage">
        <input type="submit" value="Login">
    </form>

    <a href="https://cryptic-refuge-67781.herokuapp.com/Prove06/register.php">Or Please Create an Account!</a>
</body>
</html>
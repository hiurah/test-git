<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Sample Programs</title>
    <link rel="stylesheet"href="../css/style.css">
    <link rel="stylesheet"href="../css/login.css">
</head>
<body>
<?php require 'login-info.php';?>
<div class="body"></div>
<div class="grad"></div>
<img src="../css/logo_transparent.png" class="syoten">
<div class="header">
    <div><span>インテリパス</span></div>
</div>
<br>
<div class="login">
<form method="post" action="login-output.php">
    <input type="text" placeholder="account" name="account"><br>
    <input type="password" placeholder="password" name="pass"><br>
    <input type="submit" value="Login">
</form>
</div>
</body>
</html>

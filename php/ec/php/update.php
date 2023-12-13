<?php
session_start();
if(!isset($_SESSION['user']['name'])){
    header("Location:./login-input.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Sample Programs</title>
    <link rel="stylesheet"href="../css/style.css">
</head>
<?php require_once 'menu.php'?>
<body>
<h1>ユーザー情報変更画面</h1>
<?php
require_once 'DBManager.php';
$pdo=getDB();
$name="";
$postcode="";
$address="";
$phone="";
$mail="";
$id=$_SESSION['user']['id'];
$stmt=$pdo->prepare("select * from ec_user where id=?");
$stmt->bindValue(1,$id);
$stmt->execute();
foreach($stmt as $row){
    $name=$row['name'];
    $postcode=$row['postcode'];
    $address=$row['address'];
    $phone=$row['phone'];
    $mail=$row['mail'];
}
?>
<form method="post" action="update-output.php">
    <input type="hidden" name="id" value="<?=$id?>"><br>
    名前:<input type="text" name="name" value="<?=$name?>"><br>
    郵便番号:<input type="text" name="postcode" value="<?=$postcode?>"><br>
    住所:<input type="text" name="address" value="<?=$address?>"><br>
    電話番号:<input type="text" name="phone" value="<?=$phone?>"><br>
    メールアドレス:<input type="text" name="mail" value="<?=$mail?>"><br>
    <input type="submit" value="変更">
</form>
</body>
</html>


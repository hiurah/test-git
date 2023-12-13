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
<body>
<?php require 'menu.php';?>
<h1>商品詳細</h1>
<?php
require_once 'DBManager.php';
$pdo=getDB();
$id=$_GET['id'];
$stmt = $pdo->prepare("select * from ec_item where id=?");
$stmt->bindValue(1,$id);
$stmt->execute();
foreach ($stmt as $row) {
    echo '<img src="../',$row['imgpath'],'"><br>';
    echo '商品名:',$row['name'],'<br>';
    echo '値段:',$row['price'],'円<br>';
    echo '詳細:',$row['description'],'<br>';
    echo 'ジャンル:',$row['genre'],'<br>';

}
?>
<?php
echo '<a href="cart.php?id=',$id,'"><img src="../img/m_e_company_524.png"><a>';
?>
</body>
</html>

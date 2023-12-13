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
<?php //ec-cartからそのuserの情報を取得してforeachのなかでinsertする
require_once 'DBManager.php';
$pdo=getDB();
$stmt=$pdo->prepare("select * from ec_cart where userid=?");
$stmt->bindValue(1,$_SESSION['user']['id']);
$stmt->execute();
$pdo->query('BEGIN TRANSACTION');
foreach ($stmt as $row) {
    $stm=$pdo->prepare("insert into ec_purchase values(null,?,?,?)");
    $stm->bindValue(1,$_SESSION['user']['id']);
    $stm->bindValue(2,$row['itemid']);
    $stm->bindValue(3,date('Y-m-d H:i:s'));
    $stm->execute();
}
$pdo->query('COMMIT');
echo '購入できました<br>';
$st=$pdo->prepare("delete from ec_cart where userid=?");
$st->bindValue(1,$_SESSION['user']['id']);
$st->execute();
?>
<a href="item-list.php">商品画面へ</a>
</body>
</html>
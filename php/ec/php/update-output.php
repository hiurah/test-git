<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Sample Programs</title>
    <link rel="stylesheet"href="../css/style.css">
</head>
<body>
<h1>ユーザー情報変更画面</h1>
<?php
require 'DBManager.php';
$pdo=getDB();
$stmt=$pdo->prepare("update ec_user set name=?,postcode=?,address=?,phone=?,mail=? where id=?");
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['postcode']);
$stmt->bindValue(3,$_POST['address']);
$stmt->bindValue(4,$_POST['phone']);
$stmt->bindValue(5,$_POST['mail']);
$stmt->bindValue(6,$_POST['id']);
$stmt->execute();
$_SESSION['user']['name']=$_POST['name'];
$_SESSION['user']['id']=$_POST['id'];
echo '<p>ユーザー更新が完了しました。</p><br>';
echo '<a href="item-list.php">商品画面へ</a><br>';
?>
<?php
$stm=$pdo->prepare("select * from ec_user where id=?");
$stm->execute([$_SESSION['user']['id']]);
foreach($stm as $row){
    echo '名前:',$row['name'],'<br>';
    echo '郵便番号:',$row['postcode'],'<br>';
    echo '住所:',$row['address'],'<br>';
    echo '携帯電話:',$row['phone'],'<br>';
    echo 'メールアドレス:',$row['mail'],'<br>';
}
?>
</body>
</html>


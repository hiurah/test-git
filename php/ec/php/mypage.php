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
<?php require_once 'menu.php';?>
<h1>ユーザー情報</h1>
<h2>編集する場合は、変更ボタンを押してください。</h2>
<form method="post" action="update.php">
<?php
require_once 'DBManager.php';
$id=$_SESSION['user']['id'];
$pdo=getDB();
$stmt=$pdo->prepare("select * from ec_user where id=?");//ここのphpでec_cartにuseridとitemidを入れる
$stmt->execute([$_SESSION['user']['id']]);
foreach($stmt as $row){
    echo '名前:',$row['name'],'<br>';
    echo '郵便番号:',$row['postcode'],'<br>';
    echo '住所:',$row['address'],'<br>';
    echo '携帯電話:',$row['phone'],'<br>';
    echo 'メールアドレス:',$row['mail'],'<br>';
    echo 'アイコン:<img src="../',$row['image'],'"><br>';
}
?>
<input type="submit" value="変更">
</form>
<a href="logout.php">ログアウト</a><br>
<a href="administrator.php">管理者モード</a><br>
<a href="icon.php">アイコン変更</a>
<?php require 'purchasehistory.php';?>
</body>
</html>


<?php
if(session_id() == '') {
// セッションは開始していない
// ので、開始する
    session_start();
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
<h1>管理者権限画面</h1>
<?php
require_once 'DBManager.php';
$pdo=getDB();
$stmt=$pdo->prepare('select * from ec_administrator where password=? and password2=? and password3=? and name=?');
$stmt->bindValue(1,$_POST['password']);
$stmt->bindValue(2,$_POST['password2']);
$stmt->bindValue(3,$_POST['password3']);
$stmt->bindValue(4,$_SESSION['user']['name']);
$stmt->execute();
$name="";
foreach($stmt as $row){
    $id=$row['id'];
    $name=$row['name'];
    $_SESSION['administrator']['id']=$id;
    $_SESSION['administrator']['name']=$name;
}
if(isset($id)){
    echo 'ようこそ';
    echo $name,'さん<br>';
    echo '<a href="ad-menu.php">管理者画面へ</a><br>';
}else {
    echo 'パスワードが違います</p><br>';
    echo '<a href="item-list.php>商品画面</a>';
}
?>
</body>
</html>
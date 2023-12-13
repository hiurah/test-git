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
<?php
require 'DBManager.php';
$pdo=getDB();

$stmt=$pdo->prepare('select * from ec_user where account=? and password=?');
$stmt->bindValue(1,$_POST['account']);
$stmt->bindValue(2,$_POST['pass']);
$stmt->execute();
$name="";
foreach($stmt as $row){
    $id=$row['id'];
    $name=$row['name'];
    $account=$row['account'];
    $pass=$row['password'];
    $_SESSION['user']['id']=$id;
    $_SESSION['user']['name']=$name;
    $_SESSION['user']['image']=$row['image'];
    $_SESSION['administrator']['id']="";
}
if(isset($id)){
    echo '<div class="heit"><div class="box19"><h2>ようこそ</h2>';
    echo '<h2>',$name,'さん</h2><br>';
    echo '<a href="item-list.php">商品画面へ</a></div></div><br>';
}else {
    echo '<div class="heit"><div class="box19">アカウントまたはパスワードが違います<br>';
    echo '<a href="index.php">トップ画面へ</a></div></div>';
}
?>

</body>
</html>
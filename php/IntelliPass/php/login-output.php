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
$stmt=$pdo->prepare('select * from user where account=? and pass=?');
$stmt->bindValue(1,$_POST['account']);
$stmt->bindValue(2,$_POST['pass']);
$stmt->execute();
$name="";
foreach($stmt as $row){
    $id=$row['user_id'];
    $name=$row['name'];
    $account=$row['account'];
    $_SESSION['user']['id']=$id;
    $_SESSION['user']['name']=$name;
    $_SESSION['user']['account']=$account;
    $_SESSION['user']['icon']=$row['icon'];
    $_SESSION['user']['class']=$row['class'];
}
if(isset($id)){
    echo '<div class="heit"><div class="box19"><h2>ようこそ</h2>';
    echo '<h2>',$name,'さん</h2><br>';
    echo '<a href="main.php">メイン画面へ</a></div></div><br>';
}else {
    echo '<div class="heit"><div class="box19">アカウントまたはパスワードが違います<br>';
    echo '<a href="first.php">トップ画面へ</a></div></div>';
}
?>

</body>
</html>
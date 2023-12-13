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
<h1>アイコン画像変更</h1>
<?php
$id=$_SESSION['user']['id'];
?>
<form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$id?>"><br>
    アイコン画像:<input type="file" name="file" accept='image/*'><br>
    <input type="submit" value="変更">
</form>
<?php
if(isset($_FILES['file'])){
    require_once 'DBManager.php';
    $pdo=getDB();
    $stmt=$pdo->prepare("update ec_user set image=? where id=?");//ここのphpでec_cartにuseridとitemidを入れる
    $stmt->bindValue(2,$_POST['id']);
    $imgpath='img/'.basename($_FILES['file']['name']);
    $filename='../'.$imgpath;
    move_uploaded_file($_FILES['file']['tmp_name'],$filename);
    $stmt->bindValue(1,$imgpath);

    $stmt->execute();
    echo 'アイコンを変更しました。';
    if($_SESSION['user']['image']!='img/user.png'){
        $file='../'.$_SESSION['user']['image'];
        unlink($file);
    }
    $_SESSION['user']['image']=$imgpath;
}
?>
<br><a href="item-list.php">商品画面へ</a>
</body>
</html>


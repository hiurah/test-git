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
<?php require 'ad-menu.php';?>
<?php
require_once 'DBManager.php';
$pdo=getDB();
$stmt=$pdo->prepare("insert into ec_item values(null,?,?,?,?,?)");//ここのphpでec_cartにuseridとitemidを入れる
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['description']);
$stmt->bindValue(3,$_POST['genre']);
$imgpath='itemimg/'.basename($_FILES['file']['name']);
$filename='../'.$imgpath;
move_uploaded_file($_FILES['file']['tmp_name'],$filename);
$stmt->bindValue(4,$imgpath);
$stmt->bindValue(5,$_POST['price']);
$stmt->execute();
echo '追加を完了しました。';
?>
<a href="ad-menu.php">管理者メニューへ</a><br>
</body>
</html>

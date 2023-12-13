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
<h1>商品の削除</h1>
<?php
$id=$_POST['item'];
require 'DBManager.php';
$pdo=getDB();
$stmt=$pdo->prepare("delete from ec_item where id =?");
$stmt->bindValue(1,$id);
$stmt->execute();
echo '削除処理が完了しました<br>';
?>
<a href="ad-menu.php">管理者メニューへ</a><br>
</body>
</html>
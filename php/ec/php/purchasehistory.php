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
<?php require_once 'menu.php';?>
<h1>購入履歴</h1>
<?php
require_once 'DBManager.php';
$pdo=getDB();
echo '<table border="1">';
echo '<tr><th>商品名</th><th>イメージ</th></tr>';
$stm=$pdo->prepare("select * from ec_purchase as p right outer join ec_item as a
on p.itemid=a.id where p.userid=?");
$stm->execute([$_SESSION['user']['id']]);
foreach($stm as $row){
    echo '<tr>';
    echo '<td>', $row['name'], '</td>';
    $uploadpath=$row['imgpath'];
    echo '<td><img src="../',$uploadpath,'"></td>';
    echo '</tr>';
}
echo '</table>';
?>
</body>
</html>


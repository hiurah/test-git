<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品検索</title>
    <link rel="stylesheet"href="../css/style.css">
</head>
<body>
<?php require 'menu.php';?>
<h1>検索結果</h1>
<?php
require_once 'DBManager.php';
$pdo=getDB();
echo '<table border="1">';
echo '<tr><th>商品名</th><th>イメージ</th></tr>';
if(!$_POST['name']=='' and $_POST['genre']=='') {
    $stmt = $pdo->prepare("select * from ec_item where name like ?");
    $stmt->execute(['%' . $_POST["name"] . '%']);
    foreach ($stmt as $row) {
        echo '<tr>';
        echo '<td>', $row['name'], '</td>';
        $uploadpath=$row['imgpath'];
        echo '<td><img src="../',$uploadpath,'"></td>';
        echo '</tr>';
    }
    echo '</table>';
}
if($_POST['genre']!="" and $_POST['name']=="") {
    $stmt = $pdo->prepare("select * from ec_item where genre=?");
    $stmt->execute([$_POST["genre"]]);
    foreach ($stmt as $row) {
        echo '<tr>';
        echo '<td>', $row['name'], '</td>';
        $uploadpath=$row['imgpath'];
        echo '<td><img src="../',$uploadpath,'"></td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
</body>
</html>
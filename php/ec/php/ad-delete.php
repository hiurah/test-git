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
<form method="post"action="ad-delete-output.php">
    <?php
    require_once 'DBManager.php';
    $pdo=getDB();
    foreach($pdo->query("select * from ec_item")as $row){
        echo '<p>';
        echo '<input type="radio" name="item" value="',$row['id'],'">',$row['name'];
        echo '</p>';
    }
    ?>
    <input type="submit"value="削除">
</form>
</body>
</html>
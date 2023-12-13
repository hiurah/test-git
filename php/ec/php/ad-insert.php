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
<h1>商品の追加</h1>
<form action="ad-insert-output.php" method="post" enctype="multipart/form-data">
    商品名:<input type="text" name="name"><br>
    説明:<br><textarea rows="5" cols="50" name="description"></textarea><br>
    ジャンル:
    <select name='genre'>
        <option value="" selected>選択してください</option>
        <?php
        require_once 'DBManager.php';
        $pdo=getDB();
        foreach ($pdo->query("select * from ec_genre") as $row) {
            echo '<option value=',$row['id'],'>',$row['name'],'</option>';
        }
        ?>
    </select><br>
    画像:<input type="file" name="file" accept='image/*'><br>
    価格:<input type="number" name="price">円<br>
    <input type="submit" value="追加">
</form>
</body>
</html>
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
<body>
<?php require 'menu.php';?>
<form method="post"action="shohin-search.php">
    名前検索<input type="text" name="name"><br>
    ジャンル検索<select name='genre'>
        <option value="" selected>選択してください</option>
        <?php
        require_once 'DBManager.php';
        $pdo=getDB();
        foreach ($pdo->query("select * from ec_genre") as $row) {
            echo '<option value=',$row['id'],'>',$row['name'],'</option>';
        }
        ?>
    </select>
    <input type="submit"value="検索"><br>
</form>
</body>
</html>

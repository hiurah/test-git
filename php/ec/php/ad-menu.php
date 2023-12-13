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
    <header class="header">
        <div class="container">
            <img src="../css/logo_transparent.png"class="imglogo">
            <h1 class="logo">管理者権限</h1>
            <ul class="nav">
                <li><a href="item-list.php">全件表示</a></li>
                <li><a href="ad-insert.php">商品追加</a></li>
                <li><a href="ad-delete.php">商品削除</a></li>
                <li><a href="ad-genre.php">ジャンル</a></li>
            </ul>
            <?php
            require_once 'DBManager.php';
            $pdo=getDB();
            $id=$_SESSION['user']['id'];
            $stmt = $pdo->prepare("select * from ec_user where id=?");
            $stmt->bindValue(1,$id);
            $stmt->execute();
            foreach ($stmt as $row) {
                echo '<figure class="user"><a href="mypage.php"><img src="../',$row['image'],'">';
                require 'login-info.php';
                echo '</a></figure>';
            }
            ?>
        </div>
    </header>
    <meta charset="UTF-8">
    <title>ITEM</title>
    <link rel="stylesheet"href="../css/style.css">
    <link rel="stylesheet"href="../css/menu.css">
</head>
<body>
</body>
</html>
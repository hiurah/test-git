<head>
    <header class="header">
        <div class="container">
            <img src="../img/logo_transparent.png"class="imglogo">
            <h1 class="logo">メニュー</h1>
            <ul class="nav">
                <li><a href="item-list.php">全件表示</a></li>
                <li><a href="shohin.php">検索</a></li>
                <li><a href="cart.php">カート</a></li>
                <li><a href="purchasehistory.php">購入履歴</a></li>
            </ul>
            <audio id="sound" loop controls>
                <source src="../sound/白雪の街.mp3" />
            </audio>
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
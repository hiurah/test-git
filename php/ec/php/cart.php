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
<link rel="stylesheet"href="../css/cart.css">
<?php require_once 'menu.php';?>
<?php
require_once 'DBManager.php';
if($_SESSION['user']['id']!=''){
    if(isset($_GET['id'])){
        echo $_GET['id'];
        $pdo=getDB();
        $time=time();
        echo $time;
        $stmt=$pdo->prepare("insert into ec_cart values(null,?,?,?)");
        $stmt->execute([$_SESSION['user']['id'],$_GET['id'],$time]);
    }
}
else{
    echo '元の画面に戻ります';
    echo '<a href=item-list.php>商品画面</a>';
}
?>
<h1>カート内</h1>
<div id="column" class="column04">
    <h3>商品一覧</h3>
    <ul>
        <?php
        $pdf=getDB();
        echo $_SESSION['user']['id'];
        $stm = $pdf->prepare("select * from ec_cart as c right outer join ec_item as a
on c.itemid=a.id where c.userid=?");
        $stm->bindValue(1,$_SESSION['user']['id']);
        $stm->execute();
        $num=0;
        $sum=0;
        foreach ($stm as $row) {
            echo '<li>';
            echo '<img src="../',$row['imgpath'],'">';
            echo $row['name'];
            echo $row['price'];
            echo '</li>';
            $num=$num+1;
            $sum=$sum+$row['price'];
        }
        echo "合計",$num,"冊<br>";
        echo "合計",$sum,"円<br>";
        ?>
        <div class="button012">
            <a href="purchase.php" class="btn btn-flat">購入する</a>
        </div>

</body>
</html>


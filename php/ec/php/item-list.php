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
    <?php
    $_SESSION['administrator']['id']="";
    $_SESSION['administrator']['name']="";
    ?>
    <?php require 'menu.php';?>
</head>
<body>
<!--　以下はレコメンド機能を使用していたが、期限が切れたため使用できず
<div id="column" class="column04">
    <h3>あなたへのオススメ商品</h3>
    <ul>
        <?php
        /*
        // APIのURLと引数を指定
        $url = "https://4tffr22tzd.execute-api.us-east-1.amazonaws.com/dev";
        $arg1 =$_SESSION['user']['id'];
        
        // POSTリクエスト用のデータを作成
        $payload = array("userId" => $arg1);
        
        // POSTリクエストを送信
        $options = array(
            'http' => array(
                'header' => "Content-type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($payload)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $out = json_decode($result, true);
        
        $myArray = array();//実行結果のitemIdをmyArrayの配列にin
        for ($i = 0; $i < 3; $i++) {
            $myArray[] = $out['body'][$i]['itemId'];
        }
        
        $pdf=getDB();
        foreach ($pdf->query("select * from ec_item") as $row){//ec_itemのデータをとったものを回す
            if (in_array($row['id'],$myArray)){//回しているデータにmyArrayのitemIdがあれば表示する
                echo '<li>';
                //商品を表示
                echo '<a href="./itemdetail.php?id=',$row['id'],'">';
                echo '<img class="item" src="../',$row['imgpath'],'" />';
                echo '<p>',$row['name'],'</p>';
                echo '<span>',$row['price'],'円</span>';
                echo '</a>';
                echo '<p><a href="./cart.php?cartid=',$row['id'],'">カートに入れる</a></p>';
                echo '</li>';
            }
        }
        */
        ?>
    </ul>
</div>
-->

<div id="column" class="column04">
    <h3>商品一覧</h3>
    <ul>
        <?php
        require_once 'DBManager.php';
        $pdf=getDB();
        foreach ($pdf->query("select * from ec_item") as $row) {
            echo '<li>';
            echo '<a href="detail.php?id=',$row['id'],'">';
            echo '<img src="../',$row['imgpath'],'"class="show"><br>';
            echo $row['name'],'<br>';
            echo $row['price'],'円<br></a>';
            echo '</li>';
        }
        ?>
    </ul>
</div>
</body>
</html>
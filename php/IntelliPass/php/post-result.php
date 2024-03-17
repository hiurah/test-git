<?php
session_start();
?>
<h3>投稿</h3>
<!--
    画像をアップロードをするがその画像名をユニークにしたい。
    そのためuuid(uniqid)を使用して名前を変更し同じ名前にならないようにしたい。
    ほかにもそのアップロードをした時間などの情報をDBに入れたい。犯罪対策
    https://www.php.net/manual/ja/function.uniqid.php
    https://1-notes.com/php-rename/ 
-->
<?php
    //投稿をDBへ
    require_once 'DBManager.php';
    $pdo=getDB();
    $stmt=$pdo->prepare("insert into post_table values(null,?,?,?,?)");
    $stmt->bindValue(1,$_POST['title']);
    $stmt->bindValue(2,$_POST['content']);
    $stmt->bindValue(3,$_SESSION['user']['id']);
    $stmt->bindValue(4,$_POST['class']);
    $stmt->execute();
    $last_insert_id = $pdo->lastInsertId();
    echo $last_insert_id;
    if(isset($_FILES["image"])){//画像有りの処理
        $count=count($_FILES["image"]["name"]);
        for($i = 0; $i < $count; $i++ ){
            if(is_uploaded_file($_FILES["image"]["tmp_name"][$i])){
                $filename="../img/".$_FILES["image"]["name"][$i];
                if(move_uploaded_file($_FILES["image"]["tmp_name"][$i],$filename)){
                    $stm=$pdo->prepare("insert into image values(null,?)");//imageDBへ登録
                    $stm->bindValue(1,$filename);
                    $stm->execute();
                    $last_image_id = $pdo->lastInsertId();
                    echo $last_image_id,"<br>";
                    $st=$pdo->prepare("insert into post_image values(null,?,?)");//投稿の画像を登録
                    $st->bindValue(1,$last_insert_id);
                    $st->bindValue(2,$last_image_id);
                    $st->execute();
                }else{
                    echo '画像のアップロードに失敗しました。';
                }
            }
        }
    }
    echo '投稿できました<br>';
    echo '<a href="main.php">メイン画面へ</a>';
?>

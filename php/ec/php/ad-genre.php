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

<?php
if(isset($_POST['how'])){
    if($_POST['how']=='insert'){
        $value=1;
        echo '<h1>追加</h1>';
        echo '<p>追加したいジャンルを入力してください。</p>';
        echo '<form action="" method="post">';
        echo '<input type="hidden" name="nameid" value="',$value,'">';
        echo 'ジャンル名:<input type="text" name="name"><br>';
        echo '<input type="submit" value="追加">';
        echo '</form>';
        require_once 'DBManager.php';
        $pdo=getDB();
        echo '<h1>ジャンル一覧</h1>';
        foreach ($pdo->query("select * from ec_genre") as $row) {
            echo $row['id'],'.',$row['name'],'<br>';
        }
    }
    else{
        $value=2;
        echo '<h1>削除</h1>';
        echo '<p>削除したいジャンルを選択してください。</p>';
        echo '<form action="" method="post">';
        require_once 'DBManager.php';
        $pdo=getDB();
        foreach($pdo->query("select * from ec_genre")as $row){
            echo '<p>';
            echo '<input type="hidden" name="nameid" value="',$value,'">';
            echo '<input type="radio" name="del" value="',$row['id'],'">',$row['name'];
            echo '</p>';
        }
        echo '<input type="submit" value="削除">';
    }
}else{
    echo '<h1>ジャンル操作</h1>';
    echo '<form action="" method="post">';
    echo '<input type="radio" name="how" value="insert">追加';
    echo '<input type="radio" name="how" value="delete">削除';
    echo '<input type="submit" value="決定">';
    echo '</form>';
}
?>


<?php
if(isset($_POST['nameid'])){
    if($_POST['nameid']==1){
        require_once 'DBManager.php';
        echo '<h1>追加</h1>';
        $pdo=getDB();
        $stmt=$pdo->prepare("insert into ec_genre values(null,?)");
        $stmt->bindValue(1,$_POST['name']);
        $stmt->execute();
        echo '追加を完了しました。';
        echo '<a href="ad-menu.php">管理者メニューへ</a>';
    }
    else{
        echo '<h1>削除</h1>';
        require_once 'DBManager.php';
        $id=$_POST['del'];
        $pdo=getDB();
        $stmt=$pdo->prepare("delete from ec_genre where id =?");
        $stmt->bindValue(1,$id);
        $stmt->execute();
        echo '削除処理が完了しました<br>';
    }
}
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Sample Programs</title>
    <link rel="stylesheet"href="../css/style.css">
</head>
<body>
<?php
if(isset($_SESSION['user']['name'])){
    echo '<p>ログイン中</p><br>';
    if($_SESSION['administrator']['id']!=""){
        echo '<p>管理者権限有ります</p>';
    }
}else{
    echo '<p>ログインしてません。</p>';
}
?>
</body>
</html>

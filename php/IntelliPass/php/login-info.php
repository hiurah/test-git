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
}else{
    echo '<p>ログインしてません。</p>';
}
?>
</body>
</html>

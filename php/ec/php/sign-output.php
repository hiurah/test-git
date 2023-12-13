<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Sample Programs</title>
    <link rel="stylesheet"href="../css/style.css">
</head>
<body>
<link rel="stylesheet"href="../css/sign-step.css">
<div class="c-block-step">
    <div class="c-block-step__inner">
        <div class="c-block-step__block">
            <div class="c-block-step__number">STEP.1</div>
            <div class="c-block-step__title">入力画面</div>
        </div>
        <div class="c-block-step__block">
            <div class="c-block-step__number">STEP.2</div>
            <div class="c-block-step__title">確認画面</div>
        </div>
        <div class="c-block-step__block  is-active">
            <div class="c-block-step__number">STEP.3</div>
            <div class="c-block-step__title">送信完了</div>
        </div>
    </div>
</div>
<link rel="stylesheet"href="../css/login.css">
<div class="heit">
    <div class="box19">
<?php
require 'DBManager.php';
$pdo=getDB();
$stmt=$pdo->prepare("insert into ec_user values(null,?,?,?,?,?,?,?)");
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['account']);
$stmt->bindValue(3,$_POST['pass']);
$stmt->bindValue(4,$_POST['post']);
$stmt->bindValue(5,$_POST['address']);
$stmt->bindValue(6,$_POST['phone']);
$stmt->bindValue(7,$_POST['mail']);
$stmt->execute();
echo '登録完了しました<br>';
?>
<a href="login-input.php">ログイン画面へ</a>
    </div>
</div>
</body>
</html>
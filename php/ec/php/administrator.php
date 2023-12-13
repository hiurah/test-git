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
<?php require 'menu.php';?>
<h1>管理者権限画面</h1>
<p>情報を入力してください。</p>
<form method="post" action="administrator-list.php">
    パスワード:<input type="password" name="password"><br>
    <input type="password" name="password2"><br>
    <input type="password" name="password3"><br>
    <input type="submit" value="ログイン">
</form>
</body>
</html>
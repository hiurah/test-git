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
        <div class="c-block-step__block  is-active">
            <div class="c-block-step__number">STEP.1</div>
            <div class="c-block-step__title">入力画面</div>
        </div>
        <div class="c-block-step__block">
            <div class="c-block-step__number">STEP.2</div>
            <div class="c-block-step__title">確認画面</div>
        </div>
        <div class="c-block-step__block">
            <div class="c-block-step__number">STEP.3</div>
            <div class="c-block-step__title">送信完了</div>
        </div>
    </div>
</div>
<link rel="stylesheet"href="../css/sign.css">
<form method="post" action="sign-result.php">
    名前<input type="text" name="name" required><br>
    アカウント※ログイン時に使用します<input type="text" name="account" required><br>
    パスワード※ログイン時に使用します<input type="password" name="pass" required><br>
    郵便番号<input type="text" name="post" required><br>
    住所<input type="text" name="address" required><br>
    電話番号<input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" placeholder="090-1234-5678" required><br>
    メール<input type="email" placeholder="info@sample.com" name="mail" required><br>
    <input type="submit" class="submit" value="登録">
</form>
</body>
</html>
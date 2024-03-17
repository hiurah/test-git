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
    アカウント※ログイン時使用<input type="text" name="account" required><br>
    パスワード※ログイン時使用<input type="password" name="pass" required><br>
    クラス<p>
    <select name="class">
        <?php
            $cl=array("AI3","AI2","NS3");
            foreach($cl as $c){
                echo '<option value="',$c,'">',$c,'</option>';
            }
        ?>
    </select></p>
    メール※学校メール<input type="email" placeholder="info@sample.com" name="mail" required><br>
    <input type="submit" class="submit" value="登録">
</form>
</body>
</html>
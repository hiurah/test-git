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
        <div class="c-block-step__block  is-active">
            <div class="c-block-step__number">STEP.2</div>
            <div class="c-block-step__title">確認画面</div>
        </div>
        <div class="c-block-step__block">
            <div class="c-block-step__number">STEP.3</div>
            <div class="c-block-step__title">送信完了</div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="../css/sign-result.css">
<div class="heit">
    <div class="box19">
        <?php
        $name=$_POST['name'];
        echo '<p>名前:',$name,'</p>';
        $account=$_POST['account'];
        echo '<p>アカウント:',$account,'</p>';
        $pass=$_POST['pass'];
        echo '<p>パスワード:',$pass,'</p>';
        $class=$_POST['class'];
        echo '<p>クラス:',$class,'</p>';
        $mail=$_POST['mail'];
        echo '<p>メール:',$mail,'</p>';
        echo '<form method="post" action="sign-output.php">';
        echo '<input type="hidden" name="name" value="',$name,'">';
        echo '<input type="hidden" name="account" value="',$account,'">';
        echo '<input type="hidden" name="pass" value="',$pass,'">';
        echo '<input type="hidden" name="class" value="',$class,'">';
        echo '<input type="hidden" name="mail" value="',$mail,'">';
        echo '<div class="box19">';
        echo '<input type="submit" class="submit" value="完了">';
        echo '</div>';
        echo '</form>';
        ?>
    </div>
</div>
</body>
</html>
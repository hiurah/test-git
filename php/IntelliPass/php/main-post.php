<?php
echo $_GET['postid'];
$stm=$pdo->prepare('select * from post_table as p right outer join user as u on p.contributor=u.user_id where p.post_id=?');
$stm->bindValue(1,$_GET["postid"]);
$stm->execute();
foreach($stm as $row){
    echo '<img src="../userimg/',$row['icon'],'">';
    echo '<p>アカウント:',$row['account'],'title:',$row['title'],'content:',$row['content'],'</p>';
}
echo '<a href="main.php?class=',$_GET['data'],'">メイン画面へ</a>';
?>
// 改良中
<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  <style media="screen">
            header{
                height: 50px;
                box-shadow: 0px 0px 5px 0px hsla(0, 0%, 7%, 0.3);
            }
            nav {
                width: 230px;
            }
            .nav-link {
                color: white;
                background-color: rgba(255, 255, 255, 0.493);
            }
            main {
                transition: 0.3s all ease;
            }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IntelliPass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body class="h-100">
    <header class="w-100 d-flex justify-content-between align-items-center be-light px-3"><!-- fixed-top -->
        <img src="..\img\facebook_cover_photo_2.png"class="mh-100" style="width:10%;height:100%;">
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item mx-3 text-muted"><a href="main.php?data=1" class="nav-link ">Main</a></li>
            <li class="nav-item mx-3 text-muted"><a href="#" class="nav-link ">Login</a></li>
        </ul>
    </header>    
    <div class="d-flex flex-row w-100 position-relative" style="height: calc(100% - 50px)">
        <nav class="bg-white">
            <h3>授業チャネル</h3><!-- side -->
            <div class="nav flex-column m-0 p-3">
                <?php
                    require_once 'DBManager.php';
                    $pdo=getDB();
                    $stmt=$pdo->prepare('select * from class_table where class_taken=?');
                    $stmt->bindValue(1,$_SESSION['user']['class']);
                    $stmt->execute();
                    foreach($stmt as $row){
                        echo '<li class="nav-item mb-2"><a href="main.php?data=',$row['class_id'],'" class="nav-link">',$row['class_name'],'</a></li>';
                    }
                ?>
            </div>
        </nav>
        <div class="w-100 bg-light">
            <div class="border shadow-sm d-flex flex-row align-items-center bg-light">
                <div class="fs-4 fw-bold">
                <?php
                    if(isset($_GET["data"])){
                        $pdo=getDB();
                        $stm=$pdo->prepare('select * from class_table where class_id=?');
                        $stm->bindValue(1,$_GET["data"]);
                        $stm->execute();
                        foreach($stm as $row){
                            echo $row['class_name'];
                        }
                    }
                ?>
                </div>
                <div class="position-absolute end-0">
                        <a class="btn btn-primary" href="post.php?class_id=<?= $_GET['data'] ?>">投稿</a>
                </div>
            </div>
            <!-- content -->
            <div class="p-3">
                <?php
                if(isset($_GET["data"])){
                    $stm = $pdo->prepare('SELECT * FROM post_table AS p RIGHT OUTER JOIN user AS u ON p.contributor=u.user_id WHERE p.class_id=?');
                    $stm->execute([$_GET["data"]]);
                    echo '<div class="row">';
                    foreach($stm as $row){
                ?>
                <div class="card" style="width:18rem; margin: 10px; padding:0px;">
                    <a class="text-bg-light p-3 link-underline link-underline-opacity-0" style="padding:0px;" href="main-post.php?postid=<?= $row['post_id'] ?>">
                        <div class="card-header" style="display: flex;">
                            <div style="flex: 1;">
                                <img class="mh-100 rounded-circle" src="../userimg/<?= $row['icon'] ?>" style="width:70%;height:100%;">
                            </div>
                            <div style="flex: 2;">
                                <h5 style="margin:12px;"><?= $row['account'] ?></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['title'] ?></h5>
                            <p class="card-text"><?= $row['content'] ?></p>
                        </div>
                    </a>
                </div>
                <?php
                    }//foreachの閉じ
                ?>
                <div class="position-relative">
                    
                </div>
                <?php
                }//ifの閉じ
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
<!-- http://aso2101100.girly.jp/IntelliPass/php/first.php
インテリパス (IntelliPass)
https://qiita.com/mikakane/items/2afb375023bd89e89685
https://office54.net/iot/bootstrap5/template-sidemenu-create 
post_tableの1のところにチュートリアルと注意喚起の画像を出す　それを最初に出すようにする
-->

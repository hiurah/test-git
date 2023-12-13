<?php
    function getDB(){
        $pdo=new PDO('mysql:host="ホスト名";dbname="ドメイン名";charset=utf8',
            'アカウント名','パスワード');
        return $pdo;
    }
?>
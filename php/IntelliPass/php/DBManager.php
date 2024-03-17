<?php
    function getDB(){
        $pdo=new PDO('mysql:host=mysql301.phy.lolipop.lan;dbname=LAA1419694-ans9621;charset=utf8',
            'LAA1419694','Pass1105');
        return $pdo;
    }
?>
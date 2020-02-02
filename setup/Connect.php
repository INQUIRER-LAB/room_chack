<?php
function connect(){
    $dsn = 'mysql:dbname=rcs_member;host=localhost;charaset=utf8';
    $user = '';
    $password = '';
    try{
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        exit("データベースに接続できません。:{$e->getMessage()}");
    }
    return $db;
}
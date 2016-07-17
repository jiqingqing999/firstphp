<?php
/**
 * Created by PhpStorm.
 * User: jy
 * Date: 2016/7/16
 * Time: 16:34
 */
require_once ('../db/connection.php');
//建立连接
try {
    $pdo = conn();
    $pdo->setAttribute(PDO::ATTR_ERRMODE,2);
//预处理
    $sql="delete from student where name=?";
    $stmt=$pdo->prepare($sql);
//传值
    $name=$_GET["dname"];
    $stmt->bindValue(1,$name);
//执行
    if( $stmt->execute()){
        echo 'ok';
    }else{
        echo 'error';
    }


}catch(PDOException $e){
    dir($e->errorInfo);
    echo '</br>';
    dir($e->getMessage());
}
<?php session_start();?>
<?php require 'header.php';?>
    <title>DELETE</title>
<?php require 'banner.php';?>
<h2 id="center">ブラックリスト解除</h2>
<?php
    require_once 'DB_Manager.php';
    $pdo=getDB();
    $sql='select customer_code,name from m_customers where customer_code=? and del_flag=1';
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(1,$_POST['id']);
    $stmt->execute();
    while ($row=$stmt->fetch(PDO::PARAM_INT)){
        $id=$row['customer_code'];
        $name=$row['name'];
    }
    $pdo=null;
    echo '<div id="center_2">';
    $pdo2=getDB();
    if (isset($id)&&isset($name)){
        $sql='UPDATE m_customers set del_flag=0 where customer_code=?';
        $stmt2=$pdo2->prepare($sql);
        $stmt2->bindValue(1,$id);
        $stmt2->execute();

        echo '<h3 id="center_2">',$name,'のブラックリスト解除しました</h3>';
        echo '<a href="Manager.php" id="center_2">管理画面に戻る</a>';
    }else{
        echo '<h3 id="err">id:',$_POST['id'],'はブラックリストにありません</h3>';
        echo '<a href="BLACK-LIST-DELETE.php" id="center_2">入力画面に戻る</a>';
    }
    echo '</div>';
?>
<?php require 'footer.php';?>

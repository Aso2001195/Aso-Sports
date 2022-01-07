<?php session_start();?>
<?php require 'header.php';?>
    <title>Authorization</title>
<?php require 'banner.php';?>
    <h2 id="center">管理者権限付与</h2>
<?php
require_once 'DB_Manager.php';
$pdo=getDB();
$sql='select customer_code,name from m_customers where customer_code=? and Manage_flag=0';
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
    $sql='UPDATE m_customers set Manage_flag=1 where customer_code=?';
    $stmt2=$pdo2->prepare($sql);
    $stmt2->bindValue(1,$id);
    $stmt2->execute();

    echo '<h3 id="center_2">',$name,'に管理者権限を付与しました。</h3>';
    echo '<a href="Manager.php" id="center_2">管理画面に戻る</a>';
}else{
    echo '<h3 id="err">id:',$_POST['id'],'は顧客にいません</h3>';
    echo '<a href="Authorization.php" id="center_2">入力画面に戻る</a>';
}
echo '</div>';
?>
<?php require 'footer.php';?>
<?php session_start();?>
<?php require 'header.php';?>
    <title>confirmation</title>
<?php require 'banner.php';?>
<h2 id="center">売上確認</h2>
<div id="center_2">
    <a href="Manager.php"><button type="button">管理画面へ戻る</button></a>
</div>
<?php
    require_once 'DB_Manager.php';
    $pdo=getDB();
    $sql='select D.item_code as item_code,I.item_name as item_name,sum(D.num) as num,I.price as price from t_purchase_detail D inner join m_items I on D.item_code=I.item_code group by D.item_code';
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $num_sum=0; $price_sum=0;
    echo '<table border="1">';
    echo '<tr><th>商品コード</th><th>商品名</th><th>売上個数</th><th>小計</th></tr>';
    while($row=$stmt->fetch(PDO::PARAM_INT)) {
        echo '<tr>';
        echo '<td>',$row['item_code'],'</td>';
        echo '<td>',$row['item_name'],'</td>';
        echo '<td>',$row['num'],'個</td>';
        echo '<td>￥',$row['price']*$row['num'],'</td>';
        echo '</tr>';
        $num_sum+=$row['num'];
        $price_sum+=$row['price']*$row['num'];
    }
echo '<tr><td>合計</td><td></td><td>', $num_sum, '個</td><td>￥',$price_sum,'</td></tr>';
    echo '</table>'
?>
<?php require 'footer.php';?>

<?php session_start(); ?>
<?php require 'header.php';?>
    <title>Product-list</title>
<?php require 'banner.php';?>
<?php $item_array=array(
    1=>"",
    2=>"",
    3=>"",
    4=>""
);
?>
    <h2>スパイク（HG）</h2>
    <div class="product">
<?php
require_once 'DB_Manager.php';
try{
    $pdo=getDB();
    $sql=$pdo->prepare('select image,item_name,price,category_id from m_items where item_code IN(58,65,72,79)');
    $sql->execute();
    $resultList=$sql->fetchAll(PDO::FETCH_ASSOC);
    $num=1;
    foreach ($resultList as $item) {
        $category_id[$num]=$item['category_id'];
        echo '<div class="product',$num,'">';
        echo '<div class="productname">';
        echo '<p><img src="', $item['image'], '" width="193" height="130"></p>';
        $item_array[$num]=$item['item_name'];
        echo '<a href="product.php?item_name=',$item_array[$num],'" id="white">';
        echo '<p>',$item['item_name'],'</p>';
        echo '</a>';

        echo '<p>￥',$item['price'],'(税込)/1足</p>';
        echo '</div>';
        echo '<div class="num">';
        echo '<form action="cart.php?item_name=',$item_array[$num],'&category_id=',$category_id[$num],'" method="post">';
        echo '<p id="num">数量:<select name="stock">';
        for($i=1;$i<=10;$i++){
            echo '<option value = "',$i,'">',$i,'</option>';
        }
        echo  '</select> </p>';
        echo '<p><input type="submit" value="カートに入れる"></p>';
        echo '</form>';
        echo '</div>';
        $num++;
    }
}catch (PDOException $exception){
    print $exception->getMessage();
}
echo '</div>';
?>
<?php require 'footer.php';?>
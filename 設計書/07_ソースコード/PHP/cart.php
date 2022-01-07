<?php session_start();?>
<?php require 'header.php';?>
<title>cart</title>
<?php require 'banner.php';?>
<?php
$soft='<a href="http://aso2001195.perma.jp/test2/product-list-bat-soft.php">';
$hard='<a href="http://aso2001195.perma.jp/test2/product-list-bat-hard.php">';
$glove='<a href="http://aso2001195.perma.jp/test2/product-list-gloves.php">';
$baseb='<a href="http://aso2001195.perma.jp/test2/product-list-baseball.php">';
$sb4='<a href="http://aso2001195.perma.jp/test2/product-list-soccerball4.php">';
$sb5='<a href="http://aso2001195.perma.jp/test2/product-list-soccerball5.php">';
$legers='<a href="http://aso2001195.perma.jp/test2/product-list-legers.php">';
$fg='<a href="http://aso2001195.perma.jp/test2/product-list-soccershoes-FG.php">';
$hg='<a href="http://aso2001195.perma.jp/test2/product-list-soccershoes-HG.php">';
$vmikasa='<a href="http://aso2001195.perma.jp/test2/product-list-volleyball-mikasa.php">';
$vmolten='<a href="http://aso2001195.perma.jp/test2/product-list-volleyball-molten.php">';
$vshoe='<a href="http://aso2001195.perma.jp/test2/product-list-volleyballshoe.php">';
$bmolten='<a href="http://aso2001195.perma.jp/test2/product-list-basketball-molten.php">';
$bspalding='<a href="http://aso2001195.perma.jp/test2/product-list-basketball-spalding.php">';
$bshoe='<a href="http://aso2001195.perma.jp/test2/product-list-basketshoe.php">';
?>
<h2 id="center">カート</h2>
<?php
if(isset($_GET['item_name'])){
    $item_name=$_GET['item_name'];
    require_once 'DB_Manager.php';
    $pdo=getDB();
    if(!isset($_SESSION['product'])){
        $_SESSION['product']=[];
    }
    $count=0;

    if(isset($_POST['size'])){
        $item_size=$_POST['size'];
        $sql = 'select price,item_code from m_items where item_name= :item_name and item_size= :item_size';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':item_name', $item_name);
        $stmt->bindValue(':item_size', $item_size);
    }else{
        $sql = 'select price,item_code from m_items where item_name= :item_name';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':item_name', $item_name);
    }
    $stmt->execute();
    while ($row=$stmt->fetch(PDO::PARAM_INT)){
        $price=$row['price'];
        $item_code=$row['item_code'];
        //echo $price,'/n',$item_code,'\n',$_POST['stock'];
    }
    if(isset($_SESSION['product'][$item_code])){
        $count=$_SESSION['product'][$item_code]['count'];
    }
    $_SESSION['product'][$item_code]=[
            'name'=>$item_name,
            'price'=>$price,
            'count'=>$count+$_REQUEST['stock']
    ];
    if(isset($_POST['size'])){
        $_SESSION['product'][$item_code]=[
            'size'=>$_POST['size']
        ];
    }
}
?>
<?php
echo '<div class="cart">';
if(!empty($_SESSION['product'])){
    echo '<table border="1">';
    echo '<th>商品名</th><th>サイズ</th><th>価格</th><th>数量</th><th>商品小計</th><th></th>';
    $total=0;
    foreach ($_SESSION['product'] as $item_code=>$product){
        echo '<tr>';
        echo '<td><a href="product.php?item_name=',$product['name'],'">',$product['name'],'</a></td>';
        echo '<td>なし</td>';
        echo '<td>￥',$product['price'],'</td>';
        echo '<td> ',$product['count'],' </td>';
        $subtotal=$product['price']*$product['count'];
        $total+=$subtotal;
        echo '<td>￥',$subtotal,'</td>';
        echo "<td><a href='cart-delete.php?item_code={$item_code}'>削除</a></td>";
        echo '</tr>';
    }
    echo '<tr><td>商品合計</td><td></td><td></td><td></td><td>￥',$total,'</td><td></td></tr>';
    echo '</table>';
    if(isset($_GET['category_id'])) {
        $category = $_GET['category_id'];
        if ($category == 3) {
            echo $soft;
        } else if ($category == 4) {
            echo $hard;
        } else if ($category == 5) {
            echo $glove;
        } else if ($category == 6) {
            echo $baseb;
        } else if ($category == 9) {
            echo $sb4;
        } else if ($category == 10) {
            echo $sb5;
        } else if ($category == 11) {
            echo $legers;
        } else if ($category == 13) {
            echo $fg;
        } else if ($category == 14) {
            echo $hg;
        } else if ($category == 17) {
            echo $vmikasa;
        } else if ($category == 18) {
            echo $vmolten;
        } else if ($category == 19) {
            echo $vshoe;
        } else if ($category == 22) {
            echo $bmolten;
        } else if ($category == 23) {
            echo $bspalding;
        } else if ($category == 24) {
            echo $bshoe;
        }
        echo '<input type="button" id="back" value="商品一覧に戻る"></a>';
    }
    if(isset($_SESSION['customer'])) {
        echo '<form action="cart-out.php" method="post">';
        echo '<input type="hidden" name="customer_code" value="', $_SESSION['customer']['customer_code'], '">';
        echo '<input type="hidden" name="total" value="',$total,'">';
        echo '<input type="submit" value="確定">';
        echo '</form>';
    }else{
        echo '<p id="err">購入するにはログインしてください</p>';
    }
}else{
    echo '<p id="err">カートに商品がありません</p>';
    echo '<a href="http://aso2001195.perma.jp/test2/TopPage.php">トップページに戻る</a>';
}
echo '</div>';
?>
<?php

?>
<?php require 'footer.php';?>

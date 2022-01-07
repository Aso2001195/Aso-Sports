<?php session_start();?>
<?php require 'header.php';?>
<title>product</title>
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
<?php
if(isset($_GET['item_name'])) {
    $item_name = $_GET['item_name'];
    require_once 'DB_Manager.php';
    echo '<h2>商品詳細</h2>';
    $pdo=getDB();
    $sql=$pdo->prepare('select image,weight,color,material,category_id from m_items where item_name=?');
    $sql->bindValue(1,$item_name);
    $sql->execute();
    $resultList=$sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultList as $item) {
        echo '<div class="product">';
        echo '<p><img src="', $item['image'], '" width="263" height="221"></p>';
        echo '<h3 id="num">',$item_name,'</h3>';
        echo '<h4 id="num">重さ</h4>';
        echo '<p id="num">重量/',$item['weight'],'g</p>';
        echo '<h4 id="num">カラー</h4>';
        echo '<p id="num">',$item['color'],'</p>';
        echo '<h4 id="num">素材</h4>';
        echo '<p id="num">',$item['material'],'</p>';
        if($item['category_id']==3){
            echo $soft;
        }else if($item['category_id']==4){
            echo $hard;
        }else if($item['category_id']==5){
            echo $glove;
        }else if($item['category_id']==6){
            echo $baseb;
        }else if($item['category_id']==9){
            echo $sb4;
        }else if($item['category_id']==10){
            echo $sb5;
        }else if($item['category_id']==11){
            echo $legers;
        }else if($item['category_id']==13){
            echo $fg;
        }else if($item['category_id']==14){
            echo $hg;
        }else if($item['category_id']==17){
            echo $vmikasa;
        }else if($item['category_id']==18){
            echo $vmolten;
        }else if($item['category_id']==19){
            echo $vshoe;
        }else if($item['category_id']==22){
            echo $bmolten;
        }else if($item['category_id']==23){
            echo $bspalding;
        }else if($item['category_id']==24){
            echo $bshoe;
        }
        echo '<input type="button" id="back" value="商品一覧に戻る"></a>';
        echo '</div>';
    }
}
?>
<?php require 'footer.php';?>

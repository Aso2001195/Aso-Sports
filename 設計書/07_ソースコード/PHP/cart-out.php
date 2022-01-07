<?php session_start(); ?>
<?php require 'header.php';?>
<title>cart</title>
<?php require 'banner.php';?>
<?php
require_once 'DB_Manager.php';
$customer_code=$_POST['customer_code'];
$total=$_POST['total'];
$today = date("Y-m-d");
if($_SESSION['customer']['del_flag']==0){
        $pdo = getDB();
        $sql = 'select purchase_date,total_price,purchase_id from t_purchase where customer_code=? and purchase_date=?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $customer_code);
        $stmt->bindValue(2, $today);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::PARAM_INT)) {
            $date = $row['purchase_date'];
            $total_price = $row['total_price'];
            $id = $row['purchase_id'];
        }
        $pdo = null;
    ?>
    <?php
    $pdo3=getDB();
    if(!(isset($date))) {
                $sql = $pdo3->prepare('insert into t_purchase(customer_code,purchase_date,total_price) values(?,?,?)');
                $sql->bindValue(1, $customer_code);
                $sql->bindValue(2, $today);
                $sql->bindValue(3, $total);
                $sql->execute();
                $pdo3 = null;
            $pdo5=getDB();
                $sql2 = 'select purchase_id from t_purchase where customer_code=? and purchase_date=?';
                $stmt4 = $pdo5->prepare($sql2);
                $stmt4->bindValue(1,$customer_code);
                $stmt4->bindValue(2,$today);
                $stmt4->execute();
                while ($row = $stmt4->fetch(PDO::PARAM_INT)) {
                    $id = $row['purchase_id'];
                }
    }else{
        $sum=$total_price+$total;
            $sql = $pdo3->prepare('update t_purchase set total_price=? where customer_code=? and purchase_date=?');
            $sql->bindValue(1, $sum);
            $sql->bindValue(2, $customer_code);
            $sql->bindValue(3, $today);
            $sql->execute();
            $pdo3 = null;
    }
    $chk=true;
    foreach ($_SESSION['product'] as $item_code=>$product) {
        $pdo4=getDB();
        if (isset($product['size'])) {
            $sql = 'select item_code from m_items where item_name=? and item_size=?';
            $stmt3 = $pdo4->prepare($sql);
            $stmt3->bindValue(1, $product['name']);
            $stmt3->bindValue(2, $product['size']);
        } else {
            $sql = 'select item_code from m_items where item_name=?';
            $stmt3 = $pdo4->prepare($sql);
            $stmt3->bindValue(1, $product['name']);
        }
        $stmt3->execute();
        while ($row = $stmt3->fetch(PDO::PARAM_INT)) {
            $code = $row['item_code'];
        }

        $pdoin = getDB();
        $sql = 'select inventory from m_items where item_code=?';
        $stmtin = $pdoin->prepare($sql);
        $stmtin->bindValue(1, $code);
        $stmtin->execute();
        while ($row = $stmtin->fetch(PDO::PARAM_INT)) {
            $inventory = $row['inventory'];
        }
        if($inventory<$product['count']){
            $chk=false;
        }
    }

    $pdo4=getDB();
    $i=0;
    foreach ($_SESSION['product'] as $item_code=>$product) {
        $pdo = getDB();
        $sql = 'SELECT D.item_code as item_code FROM t_purchase_detail D INNER JOIN t_purchase P ON P.purchase_id=D.purchase_id WHERE P.purchase_date=? AND P.customer_code=? AND D.item_code=?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $today);
        $stmt->bindValue(2, $customer_code);
        $stmt->bindValue(3, $item_code);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::PARAM_INT)) {
            $decode = $row['item_code'];
        }
        $pdo = null;
        if (isset($product['size'])) {
            $sql = 'select item_code from m_items where item_name=? and item_size=?';
            $stmt3 = $pdo4->prepare($sql);
            $stmt3->bindValue(1, $product['name']);
            $stmt3->bindValue(2, $product['size']);
        } else {
            $sql = 'select item_code from m_items where item_name=?';
            $stmt3 = $pdo4->prepare($sql);
            $stmt3->bindValue(1, $product['name']);
        }
        $stmt3->execute();
        while ($row = $stmt3->fetch(PDO::PARAM_INT)) {
            $code = $row['item_code'];
        }



        if (isset($date) && isset($decode)) {
            $pdo6 = getDB();
            $sql = "SELECT D.purchase_id as purchase_id, D.num as num FROM t_purchase_detail D INNER JOIN t_purchase P ON P.purchase_id=D.purchase_id WHERE P.purchase_date=:pudate AND P.customer_code=:cucode AND D.item_code=:itcode";
            $stmt5 = $pdo6->prepare($sql);
            $stmt5->bindValue(':cucode', $customer_code);
            $stmt5->bindValue(':itcode', $decode);
            $stmt5->bindValue(':pudate', $today);
            $stmt5->execute();
            $action = $stmt5->fetch(PDO::FETCH_ASSOC);
            $detail = $action['purchase_id'];
            $num = $action['num'];
            $pdo6 = null;
        }

        $pdoin = getDB();
        $sql = 'select inventory from m_items where item_code=?';
        $stmtin = $pdoin->prepare($sql);
        $stmtin->bindValue(1, $code);
        $stmtin->execute();
        while ($row = $stmtin->fetch(PDO::PARAM_INT)) {
            $inventory = $row['inventory'];
        }

        $pdo7 = getDB();
            if ($chk) {
                if (!isset($detail)) {
                    $sql = $pdo7->prepare('insert into t_purchase_detail(purchase_id,item_code,price,num) values(?,?,?,?)');
                    $sql->bindValue(1, $id);
                    $sql->bindValue(2, $code);
                    $sql->bindValue(3, $product['price']);
                    $sql->bindValue(4, $product['count']);
                } else {
                    $num += $product['count'];
                    $sql = $pdo7->prepare('update t_purchase_detail set num=? where purchase_id=? and item_code=?');
                    $sql->bindValue(1, $num);
                    $sql->bindValue(2, $detail);
                    $sql->bindValue(3, $item_code);
                }
                $sql->execute();

                $pdonum=getDB();
                $sql='update m_items set inventory=? where item_code=?';
                $stmtnum=$pdonum->prepare($sql);
                $stmtnum->bindValue(1,$inventory-$product['count']);
                $stmtnum->bindValue(2,$code);
                $stmtnum->execute();
                $i++;
                unset($_SESSION['product']);
                echo '<div class="thanks">';
                echo '<h2 id="center_2">ありがとうございました</h2>';
                echo '<a href="http://aso2001195.perma.jp/test2/TopPage.php">';
                echo '<img src="http://aso2001195.perma.jp/test2/img/トップページに戻るボタン.png">';
                echo '</a>';
                echo '</div>';
            }else{
                echo '<h3 id="err">申し訳ございません<br>在庫不足となります</h3>';
                echo '<div id="center_2">';
                echo '<a href="cart.php">カートに戻る</a>';
                echo '</div>';
                break;
            }
        }
}else{
    echo '<h3 id="err">あなたのアカウントはご利用できません。<br>今までご利用ありがとうございました。</h3>';
    unset($_SESSION['product']);
    $_SESSION = array();
    session_destroy();
    echo '<h3 id="center_2">ログアウトしました</h3>';
}
?>
<?php require 'footer.php';?>

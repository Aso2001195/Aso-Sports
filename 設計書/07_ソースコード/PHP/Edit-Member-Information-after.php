<?php session_start();?>
<?php require 'header.php';?>
<title>会員情報登録</title>
<?php require 'banner.php';?>
<?php
$salt='Not studying while attending a vocational school is the same as throwing money into a drain.';
$edit='<a href="http://aso2001195.perma.jp/test2/Edit-Member-Information.php">編集画面に戻ります。</a>';
$toppage='<a href="http://aso2001195.perma.jp/test2/TopPage.php">トップページへ戻ります。</a>';
require 'DB_Manager.php';
$pdo=getDB();
if($_POST['mail']!=$_SESSION['customer']['mail']) {
    $sql='select customer_code from m_customers where mail= :mail';
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':mail',$_POST['mail']);
    $stmt->execute();
    while($row=$stmt->fetch(PDO::PARAM_INT)){
        $id=$row['customer_code'];
    }
}else{
    $sql='select customer_code from m_customers where customer_code=?';
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(1,$_SESSION['customer']['customer_code']);
    $stmt->execute();
    while($row=$stmt->fetch(PDO::PARAM_INT)){
        $id2=$row['customer_code'];
    }
}

$pdo=null;
?>
<?php
$tel=$_POST['tel'];
$post=$_POST['post_number'];
$telchk=false; $postchk=false;
if(preg_match('/^[0][0-9]{1,20}$/',$tel)){
    $telchk=true;
}
if(preg_match('/^[0-9]{7}$/',$post)){
    $postchk=true;
}
$pass=$_POST['new_pass'];
if($telchk && $postchk){
    if(!isset($id)) {
        $pdo2=getDB();
        if (preg_match('/(?=.*[a-z)(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}/', $pass)) {
            $pass.=$salt;
            $pass=password_hash($pass, PASSWORD_DEFAULT);
            $sql2=$pdo2->prepare('update m_customers set pass=?,name=?,post_number=?,address=?,tel=?,mail=? where mail=?');
            $sql2->bindValue(1, $pass, PDO::PARAM_STR);
            $sql2->bindValue(2, $_POST['name'], PDO::PARAM_STR);
            $sql2->bindValue(3, $post, PDO::PARAM_STR);
            $sql2->bindValue(4, $_POST['address'], PDO::PARAM_STR);
            $sql2->bindValue(5, $tel, PDO::PARAM_STR);
            $sql2->bindValue(6, $_POST['mail'], PDO::PARAM_STR);
            $sql2->bindValue(7, $_SESSION['customer']['mail'], PDO::PARAM_STR);
            $sql2->execute();
            echo '<h3>編集が完了しました</h3>';
            $_SESSION['customer'] = [
                'customer_code'=>$id2,
                'pass' => $_POST['new_pass'], 'name' => $_POST['name'], 'post_number' => $_POST['post_number'], 'address' => $_POST['address'],
                'tel' => $_POST['tel'], 'mail' => $_POST['mail'],'Manage_flag'=>$_SESSION['customer']['Manage_flag']
            ];
            echo '<p><a href="TopPage.php">トップページへ戻ります。</a></p>';
            $pdo2=null;
        } else {
            echo '<h3>適切なパスワードではありません。</h3>';
            echo $edit;
        }
    }else{
        echo '<h3 id="err">既に登録されている<br>メールアドレスです。</h3>';
        echo $toppage;
    }
}else if($postchk){
    echo '<h3>電話番号が不適切です</h3>';
    echo $edit;
}else if($telchk){
    echo '<h3>郵便番号が不適切です</h3>';
    echo $edit;
}else{
    echo '<h3>電話番号、郵便番号が不適切です</h3>';
    echo $edit;
}
?>
<?php require 'footer.php';?>

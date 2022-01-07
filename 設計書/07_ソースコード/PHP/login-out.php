<?php session_start(); ?>
<?php require 'header.php';?>
    <title>ログイン</title>
<?php require 'banner.php';?>
<?php require 'DB_Manager.php'; $pdo=getDB();?>
<?php $salt='Not studying while attending a vocational school is the same as throwing money into a drain.';?>
    <p><h2 id="center">ログイン</h2></p>
    <div class="log">
        <?php
        unset($_SESSION['customer']);
        $pass_chk='';
        $sql=$pdo->prepare('select * from m_customers where mail=?');
        $sql->execute([$_REQUEST['mail']]);
        foreach ($sql as $row) {
            $pass_chk=$row['pass'];
        }
        $pass=$_REQUEST['pass'];
        $pass.=$salt;
        if (password_verify($pass,$pass_chk)) {
            $sql2 = $pdo->prepare('select * from m_customers where mail=?');
            $sql2->execute([$_REQUEST['mail']]);
            foreach ($sql2 as $row) {
                $_SESSION['customer'] = [
                    'customer_code' => $row['customer_code'], 'pass' => $_POST['pass'], 'name' => $row['name'], 'post_number' => $row['post_number'], 'address' => $row['address'],
                    'tel' => $row['tel'], 'mail' => $row['mail'], 'del_flag' => $row['del_flag'], 'reg_date' => $row['reg_date'], 'Manage_flag' => $row['Manage_flag']
                ];
            }
            if ($_SESSION['customer']['del_flag'] == 0) {
                if ($_SESSION['customer']['Manage_flag'] == 0) {
                    echo '<h3>ログインしました</h3>';
                    echo '<p>', $_SESSION['customer']['name'], '様ようこそ！</p>';
                } else{
                    echo '<h3>管理者でログインしました</h3>';
                    echo '<p>', $_SESSION['customer']['name'], 'ようこそ！</p>';
                }
                echo '<p><a href="TopPage.php">トップページへ戻ります。</a></p>';
            }else{
                echo '<h3 id="err">あなたのアカウントはご利用できません。<br>今までご利用ありがとうございました。</h3>';
            }
        } else {
            echo '<h3 id="err">ログイン失敗しました　</h3>';
            echo '<p id="err">（メールアドレスかパスワードが間違っています）</p>';
            echo '<p><a href="login.php">ログイン画面に戻ります。</a></p>';
        }
        ?>
    </div>
<?php require 'footer.php';?>
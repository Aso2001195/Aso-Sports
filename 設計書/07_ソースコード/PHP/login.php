<?php session_start(); ?>
<?php require 'header.php';?>
    <title>ログイン</title>
    <script type="text/javascript">
        function check(){
            if (mail_form.mail.value == "" && mail_form.pass.value==""){
                alert("メールアドレス,パスワードを入力してください");
                return false;
            }else if(mail_form.mail.value == ""){
                alert("メールアドレスを入力してください");
                return false;
            }else if(mail_form.pass.value == ""){
                alert("パスワードを入力してください");
                return false;
            }else{
                return true;
            }
        }
    </script>
<?php require 'banner.php';?>
    <p><h2>ログイン</h2></p>
    <div class="log">
        <?php
        if(empty($_SESSION['customer'])) {
            echo '<form action="login-out.php" method="post" name="mail_form">';
            echo '<p>メールアドレス：<input type="email" name="mail"></p>';
            echo '<p>パスワード：<input type="password" name="pass"></p>';
            echo '<input type="submit" name="action_button" value="ログイン" onclick="return check()">';
            echo '<p><a href="Member-Information-Registration.php">登録されてない方はこちら</a></p>';
            echo '</form>';
        }else{
            echo '既にログインしています。';
        }
        ?>
    </div>
<?php require 'footer.php';?>
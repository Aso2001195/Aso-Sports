<?php session_start();?>
<?php require 'header.php';?>
    <title>会員情報編集</title>
    <script type="text/javascript">
        function check(){
            const chk=pass();
            if(chk){
                if (edit.verification_pass.value !== edit.new_pass.value) {
                    alert("パスワードが確認用パスワードと一致していません");
                    return false;
                } else {
                    return true;
                }
            }else{
                alert("現在のパスワードが違います");
                return false;
            }
        }

        function pass(){
            let chk=false;
            const sess=<?php echo json_encode($_SESSION['customer']['pass'],JSON_UNESCAPED_UNICODE)?>;
            const pass=edit.pass.value
            if (sess===pass){
                 chk=true;
            }
            return chk;
        }
    </script>
<?php require 'banner.php';?>
    <h2 id="center">会員情報編集</h2>
    <h3 id="center">(変更がない場合は、現在登録されている情報をお書きください。)</h3>
    <div class="information">
        <?php
        if(isset($_SESSION['customer'])) {
            echo '<form action="Edit-Member-Information-after.php" method="post" name="edit">';
            echo '<p>お名前</p>';
            echo '<p><input type="text" name="name" value="', $_SESSION['customer']['name'], '" required="required"></p>';
            echo '<p>電話番号(数字のみ入力)</p>';
            echo '<p><input type="tel" name="tel" value="', $_SESSION['customer']['tel'], '" required="required"></p>';
            echo '<p>郵便番号(数字のみ入力)</p>';
            echo '<p><input type="text" name="post_number" value="', $_SESSION['customer']['post_number'], '" required="required"></p>';
            echo '<p>住所</p>';
            echo '<p><input type="text" name="address" value="', $_SESSION['customer']['address'], '" required="required"></p>';
            echo '<p>メールアドレス<p>';
            echo '<p><input type="email" name="mail" value="', $_SESSION['customer']['mail'], '" required="required"></p>';
            echo '<p>現在のパスワード</p>';
            echo '<p><input type="password" name="pass" required="required"></p>';
            echo '<p>新しいパスワード<br>(8文字以上、英小文字、英大文字、数字を各1文字以上含むこと)</p>';
            echo '<p><input type="password" name="new_pass" required="required"></p>';
            echo '<p>新しいパスワード(確認)</p>';
            echo '<p><input type="password" name="verification_pass" required="required"></p>';
            echo '<button class="commit" type="submit" onclick="return check();">確定</button>';
            echo '</form>';
        }else{
            echo'<h3>編集をするにはログインをしてください。</h3>';
        }
        ?>
    </div>
<?php require 'footer.php';?>
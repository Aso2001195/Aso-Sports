<?php session_start();?>
<?php require 'header.php'?>
    <title>会員情報登録</title>
    <script type="text/javascript">
        function check(){
            if (registration.verification_pass.value===registration.pass.value){
                return true;
            }else {
                alert("パスワードが確認用パスワードと一致していません");
                return false;
            }
        }
    </script>
<?php require 'banner.php'?>
    <h2 id="center">会員情報登録</h2>
    <div class="information">
        <form action="Member-Information-Registration-out.php" method="post" name="registration">
            <p>お名前<br>
                <input type="text" name="name" style="width:25vw; height:4vh;" required="required"></p>
            <p>電話番号(数字のみ入力)<br>
                <input type="tel" name="tel" style="width:25vw; height:4vh;" required></p>
            <p>郵便番号(数字のみ入力)<br>
                <input type="text" name="post_number" style="width:25vw; height:4vh;" required="required"></p>
            <p>住所<br>
                <input type="text" name="address"  style="width:25vw; height:10vh;" required="required"></p>
            <p>メールアドレス<br>
                <input type="email" name="mail" style="width:25vw; height:4vh;" required="required"></p>
            <p>パスワード<br>(8文字以上、英小文字、英大文字、数字を各1文字以上含むこと)<br>
                <input type="password" name="pass" style="width:25vw; height:4vh;" required="required"></p>
            <p>パスワード(確認)<br>
                <input type="password" name="verification_pass" style="width:25vw; height:4vh;" required="required"></p>
            <button type="submit" id="yellow-button"  value="send" onclick="return check()">確定</button>
        </form>
    </div>
<?php require 'footer.php';?>
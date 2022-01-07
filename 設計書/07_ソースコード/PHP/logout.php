<?php
session_start();
    $_SESSION = array();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
?>
<?php require 'header.php';?>
<title>ログアウト</title>
<?php require 'banner.php';?>
<div class="log">
<?php
    echo '<h3>ログアウトしました</h3>';
    echo '<p><a href="TopPage.php">トップページへ戻ります。</a></p>';
?>
</div>
<?php require 'footer.php';?>

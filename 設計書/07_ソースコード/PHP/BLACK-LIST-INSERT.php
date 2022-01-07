<?php session_start();?>
<?php require 'header.php';?>
<title>INSERT</title>
<?php require 'banner.php';?>
<h2 id="center">ブラックリストに登録するIDを入力してください</h2>
<div id="center_2">
    <form action="BLACK-LIST-INSERT-OUT.php" method="post">
        <input type="number" name="id">
        <input type="submit" value="確定">
    </form>
</div>
<?php require 'customer-list.php';?>
<?php require 'footer.php';?>

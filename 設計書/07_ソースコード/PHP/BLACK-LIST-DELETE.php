<?php session_start();?>
<?php require 'header.php';?>
<title>DELETE</title>
<?php require 'banner.php';?>
<h2 id="center">ブラックリストを解除するIDを入力してください</h2>
<div id="center_2">
    <form action="BLACK-LIST-DELETE-OUT.php" method="post">
        <input type="number" name="id">
        <input type="submit" value="確定">
    </form>
</div>
<?php require 'black-list.php';?>
<?php require 'footer.php';?>

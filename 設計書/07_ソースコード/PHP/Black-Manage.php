<?php session_start();?>
<?php require 'header.php';?>
<title>BLACK-LIST</title>
<?php require 'banner.php';?>
<div id="center_2">
    <a href="BLACK-LIST-INSERT.php"><button type="button">登録</button></a>
    <a href="BLACK-LIST-DELETE.php"><button type="button">解除</button></a>
</div>
<?php require 'black-list.php';?>
<?php require 'footer.php';?>

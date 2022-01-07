<?php session_start();?>
<?php require 'header.php';?>
<title>Authorization</title>
<?php require 'banner.php';?>
<h2 id="center">権限を付与するIDを入力してください</h2>
<div id="center_2">
    <form action="Authorization-out.php" method="post">
        <input type="number" name="id">
        <input type="submit" value="確定">
    </form>
    <?php require 'customer-list.php';?>
</div>
<?php require 'footer.php';?>

<?php require 'header.php';?>
    <title>Manage</title>
<?php require 'banner.php';?>
<h2 id="center">管理画面</h2>
<div id="center_2">
    <a href="Black-Manage.php"><button type="button">ブラックリスト管理</button></a>
    <a href="Authorization.php"><button type="button">管理権限付与</button></a>
    <a href="Sales-Confirmation.php"><button type="button">売上確認</button></a>
</div>
<div class="manage">
    <?php require 'customer-list.php';?>
    <?php require 'black-list.php';?>
    <?php require 'manager-list.php';?>
</div>
<?php require 'footer.php';?>

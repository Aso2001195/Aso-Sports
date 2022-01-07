</head>
<body>
<div class="header">
    <div class="title">
        <h1 class="title">Aso Sports</h1>
        <h6 class="sub_title">スポーツ用品:アソウスポーツ</h6>
    </div>
    <div class="button">
        <?php
        if(isset($_SESSION['customer'])){
            if($_SESSION['customer']['Manage_flag']==1){
                echo '<a href="Manager.php">';
                echo '<button type="button" name="manager">管理用</button>';
                echo '</a>';
            }
        }
        ?>
        <a href="http://aso2001195.perma.jp/test2/TopPage.php"><button type="button" name="top_page">トップページ</button></a>
    </div>
</div>

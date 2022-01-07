<?php session_start();?>
<?php require 'header.php';?>
<title>TopPage</title>
<?php require 'banner_TopPage.php';?>
<?php
require_once 'DB_Manager.php';
$pdo=getDB();
$stmt="";
if(@$_POST["input"]!="") {
    try {
        $stmt = $pdo->prepare("SELECT category_name FROM m_category WHERE category_id in
                           (SELECT category_id FROM m_items WHERE item_name LIKE ?)");
        $stmt->execute(["%" . $_POST["input"] . "%"]);

    } catch (Exception $e) {
        die($e->getMessage());
    }
}
?>
<div class="top">
    <div class="search">
        <p><h4 id="search">商品検索</h4></p>
        <p>商品名
        <form action="TopPage" method=POST>
            <input type=text id="whiitetxt" name="input" class=sech required="required"><input type=submit value=検索>
        </form>
        </p>
        <div class="search_after">
            <?php
            $num=0;
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                echo '検索結果：　商品名「',$_POST["input"],'」を含む商品は、<br>';
                while($row=$stmt->fetch(PDO::PARAM_INT)) {
                    if (isset($row['category_name'])) {
                        $name = $row['category_name'];
                        echo $name, ':';
                        $num++;
                    }
                }
                if ($num!=0) {
                    echo "にあります。";
                }else{
                    echo '<h4 id="err">ございませんでした</h4>';
                }
            }
            ?>
        </div>
    </div>

    <div class="check">
        <p>
            <input type="checkbox" class="baseball_chk" checked="checked" onclick="chkdisp(this,'baseball')"/>
            <label for="baseball_chk">野球</label>
        </p>
        <p>
            <input type="checkbox" class="soccer_chk" checked="checked" onclick="chkdisp(this,'soccer')"/>
            <label for="soccer_chk">サッカー</label>
        </p>
        <p>
            <input type="checkbox" class="volleyball_chk" checked="checked" onclick="chkdisp(this,'volleyball')"/>
            <label for="volleyball_chk">バレーボール</label>
        </p>
        <p>
            <input type="checkbox" class="basketball_chk" checked="checked" onclick="chkdisp(this,'basketball')"/>
            <label for="basketball_chk">バスケットボール</label>
        </p>
    </div>
    <p><a href="cart.php" class="Cart"><img src="http://aso2001195.perma.jp/test2/img/カートボタン.png"></a></p>
    <p><a href="Purchase_history.php" class="Purchase_history"><img src="http://aso2001195.perma.jp/test2/img/購入履歴ボタン.png"></a></p>
    <p><a href="Edit-Member-Information.php" class="Edit-Member-Information"><img src="http://aso2001195.perma.jp/test2/img/会員情報編集ボタン.png"></a></p>


    <div class="Member-Information-Registration">
        <p><h5 id="reg">新規登録の方は、こちら!!</h5></p>
        <p><a href="Member-Information-Registration.php"><img src="http://aso2001195.perma.jp/test2/img/会員情報登録ボタン.png"></a></p>
    </div>
</div>
<div class="sport">
    <div id="ansdiv">
        <p id="baseball">
        <div class="baseball">
            <div class="category_base">
                野球
            </div><br>
            <div class="img">
                <img src="http://aso2001195.perma.jp/test2/img/軟式バット.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/木製 (2)_LI 1.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/グローブ-img.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/野球ボール-img.png" width="110px" height="100px">
            </div>
            <div class="Cochin_base">
                <div class="soccer_ball"><p>・バット</p></div>
                <p><a href="product-list-bat-soft.php">軟式バット</a></p>
                <p><a href="product-list-bat-hard.php">硬式バット</a></p>
                <div class="baseball_glove"><p><a href="product-list-gloves.php">・グローブ</a></p></div>
                <div class="baseball_ball"><p><a href="product-list-baseball.php">・ボール</a></p></div>
            </div>
        </div>
        </p>
        <p id="soccer">
        <div class="soccer">
            <div class="category_so">
                サッカー
            </div><br>
            <div class="img">
                <img src="http://aso2001195.perma.jp/test2/img/サッカーボール.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/レガース-img.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/サッカーシューズ.png" width="110px" height="100px">
            </div>
            <div class="Cochin_so">
                <div class="soccer_ball"><p>・ボール</p></div>
                <p><a href="product-list-soccerball4.php">子供用(4号球)</a></p>
                <p><a href="product-list-soccerball5.php">5号球</a></p>
                <div class="soccer_leggings"><p><a href="product-list-legers.php">レガース</a></p></div>
                <div class="soccer_spike"><p>・スパイク</p></div>
                <p><a href="product-list-soccershoes-FG.php">FG(芝生用)</a></p>
                <p><a href="product-list-soccershoes-HG.php">HG(土用)</a></p>
            </div>
        </div>
        </p>
        <p id="volleyball">
        <div class="volleyball">
            <div class="category_voll">
                バレーボール
            </div><br>
            <div class="img">
                <img src="http://aso2001195.perma.jp/test2/img/ミカサボール 1.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/モルテンボール 1.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/バレーシューズ（黒）.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/バレーシューズ（ピンク）.png" width="100px" height="100px">
            </div>
            <div class="Cochin_voll">
                <div class="volleyball_ball"><p>・ボール</p></div>
                <p><a href="product-list-volleyball-mikasa.php">MiKASA</a></p>
                <p><a href="product-list-volleyball-molten.php">molten</a></p>
                <div class="volleyball_shoes"><p><a href="product-list-volleyballshoe.php">・シューズ</a></p></div>
            </div>
        </div>
        </p>
        <p id="basketball">
        <div class="basketball">
            <div class="category_bas">
                バスケットボール
            </div><br>
            <div class="img">
                <img src="http://aso2001195.perma.jp/test2/img/molten-img.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/SPALDING-IMG.png" width="100px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/バスケシューズ（赤）.png" width="110px" height="100px">
                <img src="http://aso2001195.perma.jp/test2/img/バスケシューズ（白）.png" width="110px" height="100px">
            </div>
            <div class="Cochin_bas">
                <div class="basketball_ball"><p>・ボール</p></div>
                <p><a href="product-list-basketball-molten.php">molten</a></p>
                <p><a href="product-list-basketball-spalding.php">SPALDING</a></p>
                <div class="basketball_shoes"><p><a href="product-list-basketshoe.php">・シューズ</a></p></div>
            </div>
        </div>
        </p>
    </div>
</div>
<script type="text/javascript">
    function chkdisp( obj,id ) {
        if( obj.checked ){
            document.getElementsByClassName(id)[0].style.display = "block";
        }
        else {
            document.getElementsByClassName(id)[0].style.display = "none";
        }
    }
</script>
<?php require 'footer.php';?>

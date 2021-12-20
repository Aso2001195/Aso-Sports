# DB定義書
## ER図
[ER図はこちら](https://github.com/Aso2001195/Aso-Sports/blob/main/%E8%A8%AD%E8%A8%88%E6%9B%B8/06_DB%E8%A8%AD%E8%A8%88%E6%9B%B8/ER%E5%9B%B3.md)

# DBテーブルカラム一覧

# データベース設計図

## 購入テーブル(t_purchase)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|購入ID|purchase_id|bigint(20)|○|○||
|顧客コード|customer_code|int(50)||○|○|
|購入日|purchase_date|datetime||○||
|総額|total_price|int(11)||○||

## 購入詳細テーブル(t_purchase_detail)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|購入詳細ID|purchase_detail_id|bigint(20)|○|○||
|購入ID|purchase_id|bigint(20) ||○|○|
|商品コード|item_code|int(11)||○|○|
|価格|price|int(11)||○||
|数量|num|int(11)||○||

## 顧客マスタ(m_customers)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|顧客コード|customer_code|int(50)|○|○||
|パスワード|pass|varchar(50)||○||
|氏名|name|varchar(20)||○||
|郵便番号|post_number|int(7)||○||
|住所|address|varchar(100)||○||
|電話番号|tel|varchar(20)||○||
|メールアドレス|mail|varchar(100)||○||
|削除フラグ|del_flag|int(1)||||
|登録日|reg_date|datetime||○||
|管理者フラグ|Manage_flag|int(1)||○||

## カテゴリマスタ(m_category)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|カテゴリID|category_id|int(10)|○|○||
|親カテゴリ|parent_category|int(30)||○|
|カテゴリ名|category_name|varchar(20)||○||
|登録日|reg_date|datetime||○||

## 商品マスタ(m_items)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品コード|item_code|int(11)|○|○||
|商品名|item_name|varchar(50)||○||
|価格|price|int(11)||○||
|カテゴリID|category_id|int(10)||○|○|
|重さ|weight|int(4)||○||
|色|color|varchar(20)||||
|サイズ|size|int(4)||||
|素材|material|varchar(30)||||
|画像ファイル名|image|varchar(200)||○||
|削除フラグ|del_flag|int(1)||||
|登録日|reg_date|datetime||○||
|在庫|inventory|int(3)||○||

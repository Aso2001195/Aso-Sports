# DB定義書
## ER図
[ER図はこちら](https://github.com/Aso2001195/Aso-Sports/blob/main/%E8%A8%AD%E8%A8%88%E6%9B%B8/06_DB%E8%A8%AD%E8%A8%88%E6%9B%B8/ER%E5%9B%B3.md)

# DBテーブルカラム一覧

# データベース設計図

## 購入テーブル(d_purchase)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|オーダーID|order_id|bigint(20)|○|○||
|スポーツID|sports-id|varchar(30)||○|○|
|顧客コード|customer_code|varchar(50)||○|○|
|購入日|purchase_date|date||○||
|総額|total_price|int(11)||○||

## 購入詳細テーブル(d_purchase_detail)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|オーダー詳細ID|detail_id|bigint(20)|○|○||
|オーダーID|order_id|bigint(20) |○|○|○|
|スポーツID|sports-id|varchar(30)||○|○|
|商品コード|item_code|int(11)||○||
|価格|price|int(11)||○||
|数量|num|int(11)||○||

## 顧客マスタ(m_customers)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|顧客コード|customer_code|varchar(50)|○|○||
|パスワード|pass|varchar(50)||○||
|氏名|name|varchar(20)||○||
|住所|address|varchar(100)||○||
|電話番号|tel|varchar(20)||○||
|メールアドレス|mail|varchar(100)||○||
|ランク|rank|varchar(10)||○|○|
|削除フラグ|del_flag|int(1)||||
|登録日|reg_date|date||○||

## ランクマスタ(m_rank)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ランク|rank|varchar(10)|○|○||
|氏名|name|varchar(20)||○||

## 商品マスタ(m_items)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品コード|item_code|int(11)|○|○||
|商品名|item_name|varchar(50)||○||
|スポーツID|sports-id|varchar(30)||○|○|
|価格|price|int(11)||○||
|画像ファイル名|image|varchar(200)||○||
|商品詳細証明|detail|varchar(500)||||
|削除フラグ|del_flag|int(11)||||
|登録日|reg_date|date||○||

## 競技テーブル(m_Competition)
|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|||||||
|||||||
|||||||
|||||||
|||||||
|||||||
|||||||
|||||||

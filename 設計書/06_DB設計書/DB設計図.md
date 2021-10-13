# データベース設計図

## t_purchase

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|purchase_id|bigint(20)|○|○||
|customer_code|varchar(50)||○|○|
|purchase_date|date||○||
|total_price|int(11)||○||

## t_purchase_detail

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|detail_id|bigint(20)|○|○||
|purchase_id|bigint(20) |○|○|○|
|item_code|int(11)||○||
|price|int(11)||○||
|num|int(11)||○||

## m_customers

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|customer_code|varchar(50)|○|○||
|pass|varchar(50)||○||
|name|varchar(20)||○||
|address|varchar(100)||○||
|tel|varchar(20)||○||
|mail|varchar(100)||○||
|del_flag|int(1)||||
|reg_date|date||○||

## m_category

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|category_id|varchar(10)|○|○||
|sports_name|varchar(20)||○||
|reg_date|date||○||

## m_items

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|item_code|int(11)|○|○||
|item_name|varchar(50)||○||
|price|int(11)||○||
|category_id|varchar(10)||○|○|
|image|varchar(200)||○||
|detail|varchar(500)||||
|del_flag|int(1)||||
|reg_date|date||○||

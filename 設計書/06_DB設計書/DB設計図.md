# データベース設計図

## t_purchase

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|purchase_id|bigint(20)|○|○||
|customer_code|int(50)||○|○|
|purchase_date|datetime||○|||
|total_price|int(11)||○||

## t_purchase_detail

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|purchase_detail_id|bigint(20)|○|○||
|purchase_id|bigint(20) |○|○|○|
|item_code|int(11)||○||
|price|int(11)||○||
|num|int(11)||○||

## m_customers

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|customer_code|int(50)|○|○||
|pass|varchar(50)||○||
|name|varchar(20)||○||
|post_number|int(7)||○||
|address|varchar(100)||○||
|tel|varchar(20)||○||
|mail|varchar(100)||○||
|del_flag|int(1)||||
|reg_date|datetime||○||
|Manage_flag|int(1)||○||

## m_category

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|category_id|int(10)|○|○||
|parent_category|int(30)||○||
|category_name|varchar(20)||○||
|reg_date|datetime||○||

## m_items

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|item_code|int(11)|○|○||
|item_name|varchar(50)||○||
|price|int(11)||○||
|category_id|int(10)||○|○|
|weight|int(4)||○||
|color|varchar(20)||||
|size|int(4)||||
|material|varchar(30)||||
|image|varchar(200)||○||
|del_flag|int(1)||||
|reg_date|datetime||○||
|inventory|int(3)||○||

<?php 

class Product extends Db_object{

   public static $db_users = "products";

   public static $db_id = "id";

   public $id;
   public $cat_id;
   public $product_name;
   public $product_category;
   public $product_price;
   public $product_qty;
   public $product_date;
   public $the_search;

   
   
}


 ?>
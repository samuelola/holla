<?php 
class Db_object {

public static function find_all(){

   $result1 = static::find_by_query("SELECT * FROM ".static::$db_users."");

   return $result1;
}


public static function find_by_id($id){
 
  $result2 = static::find_by_query("SELECT * FROM ".static::$db_users." WHERE ".static::$db_id." = '$id'");

   return !empty($result2) ? array_shift($result2) : false;
}

public static function find_by_query($sql){
  
  global $database;

  $sam_result  = $database->the_query($sql);

  $object_result = [];

  while ($row = mysqli_fetch_assoc( $sam_result)) {
  	
  	  $object_result[] =  static::instantiation($row);
  }


  return $object_result;


}


public static function instantiation($the_result){

   $calling_class = get_called_class();

   $the_object = new $calling_class;

   foreach($the_result as $key => $values ){
     
        if($the_object->has_attributes($key)){

            $the_object->$key = $values;
        }
   }

   return $the_object;

}


public function has_attributes($key){

	$object_class = get_object_vars($this);

	return array_key_exists($key,$object_class);

}


public function add_user(){

   global $database;

   $sql = "INSERT INTO users (name,email,password,reg_date) VALUES ('".$database->clean($this->name)."','".$database->clean($this->email)."','".$database->clean($this->password)."',NOW())";

    $the_result =  $database->the_query($sql);

    if($the_result){

       $this->id = $database->the_insert_id();
       
       return true;	
    }

    else{

    	return false;
    }

}


public static function modified_date($ok){
  
    $date = new DateTime($ok);
    echo $date->format('M j , Y | h:i A');
}

public function delete_user(){

    global $database;

	$sql = "DELETE FROM ".static::$db_users." WHERE ".static::$db_id." = '".$this->id."'";

	$user_del = $database->the_query($sql);

    return mysqli_affected_rows($database->conn) == 1 ? true :false;
}


public function delete_category(){

    global $database;

	$sql = "DELETE FROM ".static::$db_users." WHERE ".static::$db_id." = '".$this->id."'";

	$user_del = $database->the_query($sql);

    return mysqli_affected_rows($database->conn) == 1 ? true :false;
}



public function update_user(){
    
    global $database;

    $sql = "UPDATE users SET name = '".$database->clean($this->name)."', email = '".$database->clean($this->email)."', password = '".$database->clean($this->password)."', updated_date = NOW() WHERE id = ".$this->id."";

    $database->the_query($sql);

    return mysqli_affected_rows($database->conn) == 1 ? true : false;
}

public function update_category(){
    
    global $database;

    $sql = "UPDATE categories SET category_name = '".$database->clean($this->category_name)."' WHERE id = ".$this->id."";

    $database->the_query($sql);

    return mysqli_affected_rows($database->conn) == 1 ? true : false;
}



public static function verify_user($email,$password){
    global $database;
    $the_email = $database->clean($email);
    $the_password = $database->clean($password);

	$sql = "SELECT * FROM ".static::$db_users." WHERE email = '$the_email'";

    $login_result = static::find_by_query($sql);

    $ok = array_shift($login_result);

   

    if(password_verify($the_password,$ok->password)){
      
       $get_details = "SELECT * FROM ".static::$db_users." WHERE password = '$ok->password'";

       $login_result = static::find_by_query($get_details);

       return !empty($login_result) ? array_shift($login_result) : false; 
    }
}


public function add_category(){

	global $database;

	$sql = "INSERT INTO ".static::$db_users." (category_name) VALUES ('".$database->clean($this->category_name)."')";

	$the_category = $database->the_query($sql);

	if($the_category){
       
        $this->id = $database->the_insert_id();

        return true;
	}
	else{

		return false;
	}
}


public function add_product(){

    global $database;

  $sql = "INSERT INTO ".static::$db_users." (cat_id,product_name,product_price,product_qty,product_date) VALUES ('".$database->clean($this->product_category)."','".$database->clean($this->product_name)."','".$database->clean($this->product_price)."','".$database->clean($this->product_qty)."',NOW())";
   

   $result = $database->the_query($sql);

   if($result){
     
      $this->id = $database->the_insert_id();

      return true;

   }
   else{

      return false;
   }
}


public function update_product(){
    
    global $database;

    $sql = "UPDATE ".static::$db_users." SET cat_id = '".$database->clean($this->cat_id)."', product_name = '".$database->clean($this->product_name)."', product_price = '".$database->clean($this->product_price)."',product_qty = '".$database->clean($this->product_qty)."', product_date = NOW() WHERE id = ".$this->id."";

    $database->the_query($sql);

    return mysqli_affected_rows($database->conn) ==1 ? true : false;
}


public function delete_product(){

    global $database;

  $sql = "DELETE FROM ".static::$db_users." WHERE ".static::$db_id." = '".$this->id."'";

  $user_del = $database->the_query($sql);

    return mysqli_affected_rows($database->conn) == 1 ? true :false;
}


public static function count_all(){

   global $database;

   $sql = "SELECT * FROM ".static::$db_users."";

   $result = $database->the_query($sql);

   return $result->num_rows;
}


public static function count_all_qty(){

   global $database;

   $sql = "SELECT product_qty FROM ".static::$db_users."";

   $result = $database->the_query($sql);

   return $result->num_rows;
}


public function search_products(){
   global $database;

   $sql = "SELECT * FROM ".static::$db_users." WHERE product_name LIKE '%".$database->clean($this->the_search)."%'"; 

   $search_results = static::find_by_query($sql);

   return $search_results;
}

public function search_products_count(){
   global $database;

   $sql = "SELECT * FROM ".static::$db_users." WHERE product_name LIKE '%".$database->clean($this->the_search)."%'"; 

   $search_results = $database->the_query($sql);

   return $search_results->num_rows;
}

public function set_message($msg){

    if(!empty($msg)){

        $_SESSION['msg'] = $msg;
    }
    else{

        $msg = "";
    }
}

public function display_message(){
   
  if(isset($_SESSION['msg'])){
    
      echo "<h4 class='text-danger text-center'>".$_SESSION['msg']."</h4>";

      unset($_SESSION['msg']);
  }
}

public static function add_all_product(){
   $subtotal = 0;
   $sql = "SELECT * FROM products";

   $result_all_products = static::find_by_query($sql);
    
   foreach ($result_all_products as $value) {
     
      $subtotal += $value->product_price;
   }

    return $subtotal;
}

public static function add_all_qty(){
   $subtotal_qty = 0;
   $sql = "SELECT * FROM products";

   $result_all_products_qty = static::find_by_query($sql);
    
   foreach ($result_all_products_qty as $stock) {
     
      $subtotal_qty += $stock->product_qty;
   }

    return $subtotal_qty;
}

public static function grand_total(){

   $total = 0;
   $sql = "SELECT * FROM products";

   $result_all_total = static::find_by_query($sql);
    
   foreach ($result_all_total as $stock_val) {
     
      $net = $stock_val->product_qty *  $stock_val->product_price;

      $total += $net; 
   }


   return $total;


}



}



 ?>
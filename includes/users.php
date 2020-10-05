<?php 

class User extends Db_object{

  public static $db_users = "users";

  public static $db_id = "id";

  public $id;

  public $name;

  public $email;

  public $password;

  public $reg_date;

  public $updated_date;
  

}


 ?>
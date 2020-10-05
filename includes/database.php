<?php 

class Database{

public $conn;

public function __construct(){

   $this->db_connect();
}


public function db_connect(){

	$this->conn = new mysqli ("localhost","root","","inventory_system");

	if(!$this->conn){
       
       die("Not connected!");
	}
}


public function the_query($sql){

   return $this->conn->query($sql);
}


public function the_insert_id(){

	return $this->conn->insert_id;
}

public function clean($dirty){

	return $this->conn->real_escape_string($dirty);
}


public function sql_error($sql){

   echo "error".$sql."<br/>".$this->conn->error;
}


}


$database = new Database;

 ?>
<?php
/**
* A file to connect to database
*/
require_once 'db_config.php';

function connect() {
	
	$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	if (mysqli_connect_errno()) {
	  echo "<br>";
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	#echo "<br>";
	#echo 'connection success';
	#mysqli_set_charset($con,"utf8");
	mysqli_select_db($con,DB_DATABASE);

	return $con; 
}
?>
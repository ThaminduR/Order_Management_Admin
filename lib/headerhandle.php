<?php
require_once("dbconnection.php");

if(isset($_GET["type"])){
	$type = $_GET["type"];
	$type(); 
}

function getEmployeeCount(){
	$conn = DB::connectDB();
	$table = "tbl_employee";

	$sql = "SELECT count(*) FROM $table WHERE emp_status=1;";

	$result = $conn->query($sql);

	if($conn->errno){
		echo("SQL Error : " .$conn->error);
		exit;
	}
	$rec = $result->fetch_array();
	echo($rec[0]);
	$conn->close();
}
?>
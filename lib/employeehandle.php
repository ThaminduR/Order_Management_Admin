<?php
require_once("dbconnection.php");

if(isset($_GET["type"])){
	$type = $_GET["type"];
	$type();
}


function viewEmployee(){
	$table = 'tbl_employee';
 
	// Table's primary key
	$primaryKey = 'emp_id';

	$columns = array(
	    array( 'db' => 'emp_id', 'dt' => 0 ),
	    array( 'db' => 'emp_name',  'dt' => 1 ),
	    array( 'db' => 'emp_address',  'dt' => 2 ),
	    array( 'db' => 'emp_mobile',   'dt' => 3 ),
		array( 'db' => 'emp_email',    'dt' => 4)	
	);

	// SQL server connection information
	require_once("config.php");
	$host = Config::$host;
	$uname = Config::$db_uname;
	$pass = Config::$db_pass;
	$db = Config::$dbname;

	$sql_details = array(
    	'user' => $uname,
    	'pass' => $pass,
    	'db'   => $db,
    	'host' => $host
	);

	require('ssp.class.php');
 
	echo json_encode(
    SSP::complex($_POST, $sql_details, $table, $primaryKey, $columns,null,"emp_status=1" )
	);
}

function deleteEmp(){
	$empid = $_POST["empid"];
	$conn= DB::connectDB();
	$sql = "UPDATE tbl_employee SET emp_status=0 WHERE emp_id=?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$empid);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		
		echo("1,Successfully Removed!");
	}
	$stmt->close();
	$conn->close();
}








?>






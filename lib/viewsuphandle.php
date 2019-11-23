<?php
require_once("dbconnection.php");

if(isset($_GET["type"])){
	$type = $_GET["type"];
	$type();
}


  function viewSupplier(){
	$table = 'tbl_supplier';
 
	// Table's primary key
	$primaryKey = 'sup_id';

	$columns = array(
	    array( 'db' => 'sup_id', 'dt' => 0 ),
	    array( 'db' => 'sup_name',  'dt' => 1 ),
	    array( 'db' => 'sup_contact',  'dt' => 2 )
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
    SSP::complex($_POST, $sql_details, $table, $primaryKey, $columns,null )
	);
}
function deleteSup(){
	$supid = $_POST["supid"];
	$conn = DB::connectDB();
	$sql = "DELETE FROM tbl_customer WHERE sup_id=?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$supid);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		
		echo("1,Successfully Removed!");
	}
	$stmt->close();
	$conn->close();
}

 //view Result employee Start
?>
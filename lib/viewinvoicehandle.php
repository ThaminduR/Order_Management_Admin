<?php
require_once("dbconnection.php");

if(isset($_GET["type"])){
	$type = $_GET["type"];
	$type();
}


function viewInvoice(){
	$table = 'tbl_invoice';
 
	// Table's primary key
	$primaryKey = 'inv_id';

	$columns = array(
	    array( 'db' => 'inv_id', 'dt' => 0 ),
	    array( 'db' => 'inv_date',  'dt' => 1 ),
	    array( 'db' => 'inv_gtot',  'dt' => 2 ),
	    array( 'db' => 'inv_discount',   'dt' => 3 ),
		array( 'db' => 'inv_ntot',    'dt' => 4)	
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
    SSP::complex($_POST, $sql_details, $table, $primaryKey, $columns)
	);
}
// Start delete Inv
function deleteInv(){
	$invid = $_POST['invid'];
	$conn= DB::connectDB();
	$sql = "DELETE FROM tbl_invoice  WHERE inv_id=?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$invid);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		
		echo("1,Successfully Removed!");
	}
	$stmt->close();
	$conn->close();
}

// End delete Inv
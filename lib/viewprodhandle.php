<?php
require_once("dbconnection.php");

if(isset($_GET["type"])){
	$type = $_GET["type"];
	$type();
}


function viewProd(){
	$table = 'tbl_product';
 
	// Table's primary key
	$primaryKey = 'prod_id';

	$columns = array(
	    array( 'db' => 'prod_id', 'dt' => 0 ),
	    array( 'db' => 'prod_name',  'dt' => 1 ),
	    array( 'db' => 'prod_rlevel',  'dt' => 2 )	
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
//
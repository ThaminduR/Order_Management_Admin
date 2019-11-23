<?php
require_once("dbconnection.php");

if(isset($_GET["type"])){
	$type = $_GET["type"];
	$type();
}


function viewCustomer(){
	$table = 'tbl_customer';
 
	// Table's primary key
	$primaryKey = 'cus_id';

	$columns = array(
	    array( 'db' => 'cus_id', 'dt' => 0 ),
	    array( 'db' => 'cus_fname',  'dt' => 1 ),
	    array( 'db' => 'cus_lname',  'dt' => 2 ),
	    array( 'db' => 'cus_mobile',  'dt' => 3 ),
	    array( 'db' => 'cus_address',   'dt' => 4 ),
		array( 'db' => 'cus_email',    'dt' => 5)	
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
    SSP::complex($_POST, $sql_details, $table, $primaryKey, $columns )
	);
}



// Get Customer start
    function getCustomer(){
	$cusid = $_POST['cusid'];

	$conn = DB::connectDB();
	$sql= "SELECT cus_fname,cus_email,cus_status FROM tbl_customer where cus_id='$cusid';";

	$result = $conn->query($sql);

	if($conn->errno){
		echo("SQL Error : ".$conn->error);
		exit;
	}
	$rec = $result->fetch_assoc();
	echo(json_encode($rec));
	$conn->close();

}
// Get Customer end

// Update Customer Start
	function updateCustomer(){
	$cusid = $_POST["txtcid"];
	$cusfname= $_POST["txtname"];
	$cusemail = $_POST["txtemail"];
	$cusstatus =$_POST["optstatus"];
	

	$conn = DB::connectDB();

	$sql = "UPDATE tbl_customer SET  cus_fname=?,
		 cus_status=? WHERE cus_email=? ";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sis",$cusfname,$cusstatus,$cusemail);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		echo("1,Successfully Updated!");
	}
	$stmt->close();
	$conn->close();

}
// Update Custommer End

// Delete Customer Start
	function deleteCus(){
	$cusid = $_POST["cusid"];
	$conn= DB::connectDB();
	$sql = "DELETE FROM tbl_customer WHERE cus_id=?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$cusid);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		
		echo("1,Successfully Removed!");
	}
	$stmt->close();
	$conn->close();
}
// Delete Customer End










?>






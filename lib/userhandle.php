<?php
session_start();
include("dbconnection.php");

// if(isset($_GET["type"])){ 
// 	$type = $_GET["type"]; 
// 	$type();
// }
$conn=DB:: connectDB();

// Get log id End
if(isset($_POST['isSearch'])){
	//response to ajax search
	$ename = $_POST['ename'];
	$sqlusrsearch = "SELECT * FROM tbl_employee WHERE emp_name LIKE '%$ename%'";
	$resultusrsearch =mysqli_query($conn,$sqlusrsearch);
	if($resultusrsearch->num_rows){
		$res ="";
		while($rowsearch = $resultusrsearch->fetch_assoc()){
			$res.= "<a href='' onclick=\"event.preventDefault(); fillData('". $rowsearch['emp_id'] ."')\">" . $rowsearch['emp_name'] . "</a>";
		}
	}else{
		$res = "<p>Results not found</p>";
	}
	echo $res;

  	$conn->close();

}else if(isset($_POST['isFillData'])){
	$ename = $_POST['emp_id'];
	$sqlusrdata = "SELECT * FROM tbl_employee WHERE emp_id = '$ename' AND emp_status='1'";
	$resultusrdata =mysqli_query($conn,$sqlusrdata);
	echo json_encode($resultusrdata->fetch_assoc());
}else{
	  
}

// Add User Start
	function addNewUser(){
	$eid = $_POST["txteid"];
	$uname = $_POST["txtuname"];
	$utype = $_POST["cmbtype"];
	$pwd = md5($eid);
	$status = 1;
	$reset = 1;

	$conn = DB::connectDB();

	$sql = "INSERT INTO tbl_users(usr_name,user_pass,usr_type,user_status,pwd_reset) VALUES(?,?,?,?,?);";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssiii",$uname,$pwd,$utype,$status,$reset);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		echo("1,Account has been Successfully Created!");
	}
	$stmt->close();
	$conn->close();
}
// // Add user End


// View User Start
if(isset($_GET["type"])){
	$type = $_GET["type"];
	$type();
}


function viewusers(){
	//echo("viewuser");
	// DB table to use
	$table = <<<EOT
	( SELECT * FROM tbl_employee EMP JOIN tbl_users USR ON 
			EMP.emp_email=USR.usr_name WHERE
			EMP.emp_status=1 ORDER BY EMP.emp_id ASC
		) temp
EOT;
	// Table's primary key
	$primaryKey = 'emp_id';

	$columns = array(
	    array( 'db' => 'emp_id', 'dt' => 0 ),
	    array( 'db' => 'usr_name',  'dt' => 1 ),
	    array( 'db' => 'usr_type',  'dt' => 2 ),	
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

// View User End
// Start Get user
function getUser(){
	$empid = $_POST["empid"];
	$conn =DB::connectDB();
	$sql = "SELECT * FROM tbl_employee INNER JOIN tbl_users ON tbl_employee.emp_email =tbl_users.usr_name where tbl_employee.emp_id = '$empid';";
	$result = $conn->query($sql);

	if($conn->errno){
		echo("SQL Error : ".$conn->error);
		exit;
	}
	$rec = $result->fetch_assoc();
	echo(json_encode($rec));
	$conn->close();
}
// End Get user

// Start Update User
function updateUsers(){
	$empid = $_POST["txteid"];
	$usrtype= $_POST["cmbtype"];
	$username = $_POST["txtuname"];
	$usrstatus =$_POST["optstatus"];
	

	$conn = DB::connectDB();

	$sql = "UPDATE tbl_users SET  usr_type=?,
		 user_status=? WHERE usr_name=? ";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("iis",$usrtype,$usrstatus,$username);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		echo("1,Successfully Updated!");
	}
	$stmt->close();
	$conn->close();

}
// End Update User
/*this is for password reset*/
function resetPassword(){
	$empid = $_POST["eid"];
	$uname = $_POST["uname"];

	$conn = DB::connectDB();

	$pwd =md5($empid);
	$reset =1;

	$sql = "UPDATE tbl_users SET usr_pass=?,
									 pwd_reset=? WHERE usr_name=? ";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sis",$pwd,$reset,$uname);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{		/* to send email */
		$to = "newuser@localhost";	/* reciver email*/
		$sub = "Reset Your Password";  /* subject email*/
	
		$name = getFirstName($empid);  /* to get user name*/
		$msg = "Hello $name,<br><br>";
		$uname=md5($uname);
		$time=time();		/*To get current time*/
		$link = "http://localhost/stylish/pw/reset.php?u=$uname&t=$time"; /*link for password reset */
		$msg .= "Your password has been reset by administrator, please click this <a href='$link'>Password Reset link</a> to setup a new password.<br><br> ";
		
		$msg .="Thank you, <br>Admin team";
		$headers = "From:<postmaster@localhost>\r\n"; /* sender default email you can't change*/
		$headers .= "Content-type: text/html\r\n";

		if(mail($to,$sub,$msg,$headers)){
			echo("1,Successfully Updated!");
		}
		else{
			echo("0,Mail Error!");
		}
	}
	$stmt->close();
	$dbobj->close();
}








?>
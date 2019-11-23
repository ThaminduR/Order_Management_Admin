<?php
include("dbconnection.php");
 
 $conn=DB:: connectDB();
  session_start();

//add employee start

function addNewEmp(){
	$emp_id = $_POST["txteid"];
	$emp_title = $_POST["cmbtitle"];
	$emp_name = $_POST["txtname"];
	$emp_dob = $_POST["dtpdob"];
	$emp_gender = $_POST["optgen"];
	$emp_address = $_POST["txtaddress"];
	$emp_tel = $_POST["txttel"];
	$emp_email = $_POST["txtemail"];
	$emp_nic = $_POST["txtnic"];
	$emp_doj = $_POST["dtpdoj"];
	$emp_status = 1;

	$conn = DB::connectDB();

	$sql = "INSERT INTO tbl_employee(emp_id,emp_title,emp_name,emp_dob,emp_gender,emp_address,emp_mobile,emp_email,	emp_nic,emp_doj,emp_status) VALUES(?,?,?,?,?,?,?,?,?,?,?);";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sississsssi",$emp_id,$emp_title,$emp_name,$emp_dob,$emp_gender,$emp_address,$emp_tel,$emp_email,$emp_nic,$emp_doj,$emp_status);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		echo("1,Successfully Registered!");
	}
	$stmt->close();
	$conn->close();
}

//add employee end

// Update Employee Start
if(!isset($_POST['btnupdate'])){
			header("Location:../editemployee.php");
	}

		$txteid = $_POST['txteid'];
		$etitle= $_POST['cmbtitle'];
		$ename = $_POST['txtname'];
		$edob = $_POST['dtpdob'];
		$egender = $_POST['optgen'];
		$eaddress= $_POST['txtaddress'];
		$emobile= ($_POST['txttel']);
		$eemail= ($_POST['txtemail']);
		$enic= ($_POST['txtnic']);
		$edoj= ($_POST['dtpdoj']);


		$result = mysqli_query($conn, "UPDATE tbl_employee SET
															emp_title = '$etitle',
															emp_name = '$ename',
															emp_dob = '$edob',
															emp_gender = '$egender',
															emp_address = '$eaddress',
															emp_mobile = '$emobile',
															emp_email = '$eemail',
															emp_nic = '$enic',
															emp_doj  = '$edoj'
															WHERE emp_id = '$txteid'");

		if($result){
			$_SESSION['emp_info'] = true;
		}

		header("Location: ../editemployee.php");

// Update Employee End

//Delete employee Start
		$empid=$_POST['empid'];
 		$sql = "UPDATE tbl_employee SET emp_status=0 WHERE emp_id=?";
 		$resultemp = $conn->query($sql);

 		if($conn->errno){
        echo("SQL Error : ".$conn->error);
        $rowresultemp= mysqli_fetch_assoc($resultemp);
    	}
    	else{
    		$sql_new = "UPDATE tbl_users SET usr_status=0 WHERE usr_name=(SELECT emp_email from tbl_employee where emp_id=?)";
    	}

// Delete employee End


?>
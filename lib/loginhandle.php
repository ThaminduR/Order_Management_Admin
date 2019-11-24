<?php
	session_start();

	//include DB file and make the connection
	include 'dbconnection.php';
	$con = DB::connectDB();

	//if someone try to access this page directly without enter username and pwd they will rediect to login page
	if(!isset($_POST['username'])){
		header("Location:../index.php");
	}

	$username = $_POST['username'];
	$pwd = md5($_POST['user_pwd']);//convert pwd to md5 hash

	$result = $con->query("SELECT * FROM tbl_users WHERE usr_name='$username' AND user_pass='$pwd'");

	if($con->errno){
		echo("SQL Error : ".$con->error);
		exit;
	}

	if(!$result->num_rows){
		//if there are no any record with given username and pwd
		$_SESSION['err'] = true;
		header("Location:../index.php");
	}else{
		//if username and pwd are correct create session and redirct to home
		$_SESSION['admin'] = $result->fetch_assoc();
		header("Location:../home.php");
	}




?>
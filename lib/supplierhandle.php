<?php
include("dbconnection.php");

  $conn=DB:: connectDB();
  session_start();

 

//Add Supplier Start
   if(!isset($_POST['btnsave1'])){
			header("Location:../newsupplier.php");
		}		
			$supid = $_POST['txteid'];
			$supname = $_POST['cmbename'];
			$supmobile = $_POST['txttel'];
			$supstatus ="1";

			$resultsup = mysqli_query($conn, "INSERT INTO tbl_supplier(sup_id,sup_name,sup_contact,	sup_status) VALUES(
				'$supid','$supname','$supmobile',$supstatus)");

			if($resultsup){
			$_SESSION['sup_info'] = true;
			}
			//echo $conn->error;

			header("Location: ../newsupplier.php");

//Add Supplier End




 

?>
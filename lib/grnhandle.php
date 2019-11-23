<?php
include('dbconnection.php');

if(isset($_GET["type"])){ 
	$type = $_GET["type"];
	$type();
	}
// Get New Supplier Start
	function getSuppliers(){

	$conn= DB::connectDB();
	$sql = "SELECT sup_id,sup_name FROM tbl_supplier;";

	$result = $conn->query($sql);

	if($conn->errno){
		echo("SQL Error : ".$conn->error);
		exit;
	}

	$output ="";
	while($rec = $result->fetch_assoc()){
		$output .="<option value='".$rec["sup_id"]."'>".$rec["sup_name"]."</option>";
	}
	
	echo($output);
	$conn->close();
}
// Get New Supplier End

// Get Categories Start
	function getCategories(){
	$conn = DB::connectDB();
	$sql = "SELECT 	cat_id,cat_name FROM  tbl_category;";

	$result = $conn->query($sql);

	if($conn->errno){
		echo("SQL Error : ".$conn->error);
		exit;
	}

	$output ="";
	while($rec = $result->fetch_assoc()){
		$output .="<option value='".$rec["cat_id"]."'>".$rec["cat_name"]."</option>";
	}
	
	echo($output);
	$conn->close();
}
// Get Categories End

// Get Products Start
	function getProducts(){
	$catid = $_POST['catid'];
	$conn= DB::connectDB();
	$sql = "SELECT prod_id,prod_name FROM  tbl_product WHERE cat_id='$catid';";

	$result = $conn->query($sql);

	if($conn->errno){
		echo("0");
		exit;
	}

	$output ="<option value=''>--Select Products--</option>";
	while($rec = $result->fetch_assoc()){
		$output .="<option value='".$rec["prod_id"]."'>".$rec["prod_name"]."</option>";
	}
	
	echo($output);
	$conn->close();
}
// Get Products End

// Get NewGrnNo Start
	function getNewGRNNo(){
	$conn= DB::connectDB();
	$sql = "SELECT grn_id FROM  tbl_grn ORDER BY grn_id DESC LIMIT 1;";

	$result = $conn->query($sql);

	if($conn->errno){
		echo("0");
		exit;
	}

	$nor = $result->num_rows;
	$newid = "";
	if($nor=="0")
		$newid = "1";
	else{
		$rec = $result->fetch_array();
		$id =$rec[0];
		$newid = $id+1;

		}
	echo($newid);
	$conn->close();

}
// Get NewGrnNo End

// Add New Grn Start
	function NewGrn(){
		$conn=DB::connectDB();

		$grn_id =$_POST["txtgrnno"];
		$sup_id =$_POST["cmbsup"];
		$grn_rdate =$_POST["txtrdate"];
		$grn_gtot =$_POST["txtgtot"];
		$grn_disc =$_POST["txtdiscount"];
		$grn_ntot =$_POST["txtntot"];
	

		$sql_grn = "INSERT INTO tbl_grn(grn_id,sup_id,grn_rdate,grn_gtot,grn_disc,grn_ntot) VALUES(?,?,?,?,?,?)";
		// echo($sql_grn);
		$stmt_grn = $conn->prepare($sql_grn);
	
	
		$stmt_grn->bind_param("issddd",$grn_id,$sup_id,$grn_rdate,$grn_gtot,$grn_disc,$grn_ntot);

		if(!$stmt_grn->execute()){
			echo("0,SQL Error : ".$stmt_grn->error);
		}
		else{
		
		$pro_id= $_POST["txtproid"];
		$cost_price= $_POST["txtcostprice"];
		$sel_price= $_POST["txtselprice"];
		$pro_qty= $_POST["txtproqty"];

		$rows =count($_POST["txtproid"]);

		for($i=0; $i<$rows;$i++){
			$bat_id = getNewBatchId();
			$stat="1";

			$sql_batch = "INSERT INTO tbl_batch(bat_id,grn_id,prod_id,bat_sprice,bat_cprice,bat_qty,bat_qty_rem,bat_rdate,bat_status) VALUES(?,?,?,?,?,?,?,?,?);";

			$stmt_batch = $conn->prepare($sql_batch);
	
			$stmt_batch->bind_param("sisddiisi",$bat_id,$grn_id,$pro_id[$i],$sel_price[$i],$cost_price[$i],$pro_qty[$i],$pro_qty[$i],$grn_rdate,$stat);
			if(!$stmt_batch->execute())
				echo("0,SQL Error : ".$stmt_batch->error);
			else{
				$sql_prod_upd = "UPDATE tbl_product SET prod_qty=prod_qty+? WHERE prod_id=?;";
				$stmt_prod_upd = $conn->prepare($sql_prod_upd);
				$stmt_prod_upd->bind_param('is',$pro_qty[$i],$pro_id[$i]);
				if(!$stmt_prod_upd->execute()){
					echo("0,SQL Error : ".$stmt_prod_upd->error);
				}
				$stmt_prod_upd->close();
			}
			$stmt_batch->close();
		}
		echo ("1,New GRN has successfully added!");
	}
	$stmt_grn->close();
	$conn->close();

	}
// Add New Gen End
	// Select Products Start
	function setSubSelect(){
		$conn=DB::connectDB();
		$cmbcat = $_POST['cmbcat'];
		$sql = "SELECT * FROM tbl_sub_category scat, tbl_category cat WHERE scat.cat_id=cat.cat_id && scat.cat_id='$cmbcat'";
		$result = $conn->query($sql);
		$output ="<option value=''>--Select Sub Category--</option>";
		while($rec = $result->fetch_assoc()){
			$output .="<option value='".$rec["sub_cat_id"]."'>".$rec["Sub_cat_name"]."</option>";
		}
		echo $output;
		$conn->close();
	}
	// Select Products End

	// select Brand Start
	function SelectBrnd(){
		$conn=DB::connectDB();
		$cmbsub = $_POST['cmbsub'];
		$sql = "SELECT * FROM  tbl_brand WHERE sub_cat_id='$cmbsub'";
		$result = $conn->query($sql);
		$output ="<option value=''>-- Select Prod Brand Name--</option>";
		while ($rec = $result->fetch_assoc()) {
			$output .="<option value='".$rec["brand_id"]."'>".$rec["brand_name"]."</option>";# code...
		}
		echo $output;
		$conn->close();
	}
	// select Brand End

	// select Brand Start
	function SelectProduct(){
		$conn=DB::connectDB();
		$cmbbrnd = $_POST['cmbbrnd'];
		$sql = "SELECT * FROM  tbl_product WHERE brand_id='$cmbbrnd'";
		$result = $conn->query($sql);
		$output ="<option value=''>-- Select Prod  Name--</option>";
		while ($rec = $result->fetch_assoc()) {
			$output .="<option value='".$rec["prod_id"]."'>".$rec["prod_name"]."</option>";# code...
		}
		echo $output;
		$conn->close();
	}
	// select Brand End

	//Select Product Size Start
	function SelectProdSize(){
		$conn=DB::connectDB();
		$cmbbrnd = $_POST['cmbbrnd'];
		$sql = "SELECT * FROM tbl_prod_details WHERE prod_id='$cmbbrnd'";
		$result = $conn->query($sql);
		$output ="<option value=''>-- Select Prod Size--</option>";
		while ($rec = $result->fetch_assoc()) {
			$output .="<option value='".$rec["sub_cat_id"]."'>".$rec["prod_size"]."</option>";# code...
		}
		echo $output;
		$conn->close();
	}
	// Select Product Size End

	//  Get prod color Start
	function GetPrdcolor(){
		$conn=DB::connectDB();
		$cmbprosize =$_POST['cmbprosize'];
		$sql = "SELECT * FROM  tbl_prod_details WHERE sub_cat_id='$cmbprosize'";
		$result = $conn->query($sql);
		$output ="<option value=''>-- Select Prod Color--</option>";
		while ($rec = $result->fetch_assoc()) {
			$output .="<option value='".$rec["sub_cat_id"]."'>".$rec["color_name"]."</option>";# cod
	}
	echo $output;
	$conn->close();
}
	//  Get prod color End

// Get New Batid Start
function getNewBatchId(){

	$conn = DB::connectDB();
	$sql = "SELECT bat_id FROM tbl_batch ORDER BY bat_id DESC LIMIT 1;";
	$result = $conn->query($sql);

	if($conn->errno){
		echo("SQL Error : ".$conn->error);
		exit;
	}

	$nor = $result->num_rows;

	if($nor == 0){
		$newid = "BAT00001";
	}
	else{
		$rec = $result->fetch_assoc();
		$lastid = $rec["bat_id"];
		$num = substr($lastid, 3);
		$num++;
		$newid = "BAT".str_pad($num,5,"0",STR_PAD_LEFT);
	}

	$conn->close();
	return $newid;

}
// Get New Batid End
?>
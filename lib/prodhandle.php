<?php
require_once("dbconnection.php");

if(isset($_GET["type"])){ 
	$type = $_GET["type"];
	$type();
}

// Get ProID Start
function getId(){
	$conn=DB::connectDB();
	$sql = "SELECT emp_id FROM tbl_employee ORDER BY emp_id DESC LIMIT 1;";
    $resultempid = $conn->query($sql);

    if($conn->errno){
        echo("SQL Error : ".$conn->error);
        exit;
    }

    $nor = $resultempid->num_rows;

    if($nor == 0){
        $newid = "EMP00001";
    }
    else{
        $rec = $resultempid->fetch_assoc();
        $lastid = $rec["emp_id"];
        $num = substr($lastid, 3);
        $num++;
        $newid = "EMP".str_pad($num,5,"0",STR_PAD_LEFT);
    }
}
// Get ProID End

function addProdImage(){
	$cat_id = $_POST['cmbcat'];
	$prod_id = $_POST['cmbpro'];
	$pro_rlevel = $_POST['txteid'];
	$sub_cat_id= $_POST['cmbsub'];
	$color =$_POST['cmbclr'];
	$size =$_POST['cmbprosize'];
	$desc =$_POST['txtdis'];

	$img_name = $_FILES['imgprod']['name'];
	$img_size = $_FILES['imgprod']['size'];
	$img_type = $_FILES['imgprod']['type'];
	$img_tmp_name = $_FILES['imgprod']['tmp_name'];
	#substr display part after specific point
	#strrpos - finds the position numbers of the last occurrence
	$ext = substr($img_name, strrpos($img_name, "."));
	# $ext is file extenstion
	# convert to lower case
	$txt = strtolower($ext);

	if($img_name== ""){
		echo (",Please Select the image");
		
		exit;
	}
	if($img_size>2097152 || $img_size==0){
		echo("0,Image size must be less than 2MB");
		exit;
	}
	if($ext!=".jpg" && $ext!=".png" && $ext!=".gif"){
		echo("0,Image file size should be either jpg png or gif");
		exit;
	}
	$cat_path = "../image/$cat_id";
	$pro_path = "../image/$cat_id/$pro_id";
	if(!file_exists($cat_path)){
		mkdir($cat_path);
	}
	if(!file_exists($pro_path)){
		mkdir($pro_path);
	}
	 
	 $fname = $cat_id."_".$pro_id."_".time().$ext;
	 $fpath = $pro_path."/".$fname;

	 if(move_uploaded_file($img_tmp_name, $fpath)){
	 	$conn = DB::connectDB();
	 	$sql = "INSERT INTO tbl_pro_images(cat_id,prod_id,img_name,img_status) VALUES(?,?,?,?);";
	 	$status = "1";
	 	$stmt = $conn->prepare($sql);
	 	$stmt->bind_param("sssi",$cat_id,$pro_id,$fname,$status);
	 	if(!$stmt->execute()){
	 		unlink($fpath);
	 		echo("0,SQL Error, Please try again:".$stmt->error);
	 	}else{
	 		$sql_level = "UPDATE tbl_product SET prod_rlevel=? WHERE prod_id=?;";
		 	
		 	$stmt_level = $conn->prepare($sql_level);
		 	$stmt_level->bind_param("is",$pro_rlevel,$pro_id);
		 	if(!$stmt_level->execute()){
		 		
		 		echo("0,SQL Error, Please try again:".$stmt_level->error);
		 	}else{
		 		$sql_desc = "INSERT INTO tbl_prod_details (prod_id,sub_cat_id,color_name,prod_size,prod_discription) VALUES (?,?,?,?,?)";
		 	
			 	$stmt_desc = $conn->prepare($sql_desc);
			 	$stmt_desc->bind_param("sssss",$pro_id,$sub_cat_id,$color,$size,$desc);
			 	if(!$stmt_desc->execute()){
			 		
			 		echo("0,SQL Error, Please try again:".$stmt_desc->error);
			 	}else{

			 		echo("1,Succssfully added");
			 	}

		 	}
	 		
	 	}
	 	$stmt->close();
	 	$conn->close();
	 }else{
	 	echo("0,Image Uploarding Error");
	 }
}

?>
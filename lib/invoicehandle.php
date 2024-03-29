<?php
session_start();
require_once("dbconnection.php");

if (isset($_GET["type"])) {
	$type = $_GET["type"];
	$type();
}

function getNewINVNo()
{
	$conn = DB::connectDB();

	$cdate = date("Y-m-d", time());
	$sql = "SELECT count(inv_id) FROM tbl_invoice WHERE inv_date='$cdate';";

	$result = $conn->query($sql);

	if ($conn->errno) {
		echo ("SQL Error : " . $conn->error);
		exit;
	}
	$row = $result->fetch_array();
	$count = $row[0];
	$count++;

	$newid = "INV" . str_replace("-", "", $cdate) . "_" . str_pad($count, 4, "0", STR_PAD_LEFT);

	echo ($newid);
	$conn->close();
}

function getProductDetails()
{
	$prodid = $_POST["prodid"];
	$conn = DB::connectDB();

	$sql = "SELECT * FROM tbl_product WHERE prod_id='$prodid';";

	$result = $conn->query($sql);

	if ($conn->errno) {
		echo ("0,SQL Error : " . $conn->error);
		exit;
	}

	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("0,Invalid product id");
		exit;
	} else {
		$rec = $result->fetch_assoc();
		$pname = $rec["prod_name"];
		$qty = $rec["prod_qty"];
		echo ("1,$pname,$qty");
	}
	$conn->close();
}

function getBatchDetails()
{
	$prodid = $_POST["prodid"];
	$rqty = $_POST["rqty"];
	$conn = DB::connectDB();

	$sql = "SELECT * FROM tbl_batch JOIN tbl_product ON tbl_batch.prod_id=tbl_product.prod_id WHERE tbl_batch.prod_id='$prodid' and tbl_batch.bat_status=1 order by tbl_batch.bat_id ASC;";

	$result = $conn->query($sql);

	if ($conn->errno) {
		echo ("0,SQL Error : " . $connj->error);
		exit;
	}

	$output = array();
	while ($rec = $result->fetch_assoc()) {
		$line = array();
		if ($rec["bat_qty_rem"] >= $rqty) {
			$line[0] = $rec["prod_id"];
			$line[1] = $rec["bat_id"];
			$line[2] = $rec["prod_name"];
			$line[3] = $rec["bat_sprice"];
			$line[4] = $rqty;
			$output[] = $line;
			break;
		} else {
			$line[0] = $rec["prod_id"];
			$line[1] = $rec["bat_id"];
			$line[2] = $rec["prod_name"];
			$line[3] = $rec["bat_sprice"];
			$line[4] = $rec["bat_qty_rem"];
			$rqty = $rqty - $rec["bat_qty_rem"];
			$output[] = $line;
		}
	}
	echo (json_encode($output));
	$conn->close();
}

function newInvoice()
{
	$conn = DB::connectDB();
	$invid = $_POST["txtinvno"];
	$invdate = $_POST["txtdate"];
	$gtot = $_POST["txtgtot"];
	$discount = $_POST["txtdiscount"];
	$ntot = $_POST["txtntot"];
	$invtime = date("h:i:s", time());

	$oper = $_SESSION["admin"]["usr_name"];


	$sql_inv = "INSERT INTO tbl_invoice(inv_id,inv_date,inv_time,inv_gtot,inv_ntot,inv_discount,inv_operator) VALUES(?,?,?,?,?,?,?);";

	$stmt_inv = $conn->prepare($sql_inv);
	$stmt_inv->bind_param("sssddds", $invid, $invdate, $invtime, $gtot, $ntot, $discount, $oper);

	if (!$stmt_inv->execute()) {
		echo ("0,SQL Error : INVOICE : " . $stmt_inv->error);
		exit;
	} else {
		$pid = $_POST["txtipid"];
		$bid = $_POST["txtibid"];
		$price = $_POST["txtisprice"];
		$qty = $_POST["txtiqty"];

		$rows = count($_POST["txtipid"]);

		for ($i = 0; $i < $rows; $i++) {
			$sql_inv_de = "INSERT INTO tbl_invoice_details(inv_id,prod_id,	prod_price,prod_qty) VALUES(?,?,?,?);";

			$stmt_inv_de = $conn->prepare($sql_inv_de);
			$stmt_inv_de->bind_param("ssdi", $invid, $pid[$i], $price[$i], $qty[$i]);

			if (!$stmt_inv_de->execute()) {
				echo ("0,SQL Error : INVOICE Details : " . $stmt_inv_de->error);
				exit;
			} else {
				$res = updateStock($conn, $bid[$i], $pid[$i], $qty[$i]);
				if ($res == "0") {
					echo ("0,Error on Batch update");
					exit;
				}
			}
		}
		echo ("1,Successfully added");
	}

	$conn->close();
}
function updateStock($conn, $bid, $pid, $qty)
{
	$sql_batch = "UPDATE tbl_batch SET bat_qty_rem=bat_qty_rem-$qty WHERE bat_id='$bid';";
	$conn->query($sql_batch);
	if ($conn->errno) {
		return "0";
	} else {
		$sql_status = "UPDATE tbl_batch SET bat_status=0 WHERE bat_id='$bid' AND bat_qty_rem=0;";
		$conn->query($sql_status);

		$sql_prod = "UPDATE tbl_product SET prod_qty=prod_qty-$qty WHERE prod_id='$pid';";
		$conn->query($sql_prod);
		if ($conn->errno)
			return "0";
		else
			return "1";
	}
}

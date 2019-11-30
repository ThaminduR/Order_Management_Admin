<?php
include 'common/sessionhandler.php';
// include ('lib/headerhandle.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Stylish</title>
	<link rel="stylesheet" type="text/css" href="resources/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<!--  <link rel="stylesheet" type="text/css" href="resources/jquery/jquery-3.4.1.js"> -->
	<link rel="stylesheet" href="resources/jquery/jquery-ui.css">

	<link rel="stylesheet" href="../dataTables/datatables.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<!-- // Include FusionCharts core file -->
	<!-- <script type="text/javascript" src="path/to/local/fusioncharts.js"></script>
 -->
	<!-- // Include FusionCharts Theme file -->
	<!-- <script type="text/javascript" src="path/to/local/themes/fusioncharts.theme.fusion.js"></script>
 -->

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="resources/sweetalert/sweetalert.min.js"></script>
	<script src="../dataTables/datatables.min.js"></script>
	<script src="resources/jquery/jquery-ui.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="resources/sweetalert/sweetalert2.css">  -->


</head>

<body>

	<div class="header">
		<span>STYLISH</span>
		<span><button type="button" id="sidebarCollapse" class="btn btn-dark">
				<i class="fa fa-bars"></i>
			</button>
		</span>
		<div>
			<div class="" style="display: inline;">
				<a role="button" href="lib/logout.php" >
					<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Log out</a>
			</div>
		</div>
	</div>
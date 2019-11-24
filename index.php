<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="resources/sweetalert/sweetalert2.css">
	<style type="text/css">
		body {
			background: url(image/index.jpg);
			background-size: cover;
		}
	</style>
</head>

<body>
	<div class="box">
		<h2>Login</h2>
		<form method="post" action="lib/loginhandle.php">
			<div class="inputBox">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="inputBox">
				<input type="password" name="user_pwd" required="">
				<label>password</label>
			</div>
			<input type="submit" name="" value="submit">
		</form>
	</div>
</body>

<script type="text/javascript" src="resources/sweetalert/sweetalert2.all.js"></script>

<!-- login error message start -->
<?php
session_start();

if (isset($_SESSION['err'])) {

	?>

	<script type="text/javascript">
		Swal.fire({
			type: 'error',
			title: 'Oops...',
			text: 'Invalid Username or Password!',
		})
	</script>

<?php
	unset($_SESSION['err']);
}
?>

<?php
if (isset($_SESSION['admin'])) {
	header("location:home.php");
}

?>
<!-- login error message end -->

</html>
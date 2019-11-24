<?php

header("refresh:1;url=index.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Please Login</title>

    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="resources/sweetalert/sweetalert2.css">

</head>

<body>
    <h4>Please Login</h4>
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

<!-- login error message end -->

</html>
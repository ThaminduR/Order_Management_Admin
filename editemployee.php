<?php
include('common/header.php');
include 'lib/dbconnection.php';


$conn = DB::connectDB();

$emp_id = $_GET['empid'];

$sql = "SELECT * FROM tbl_employee WHERE emp_id='$emp_id';";
$resultemp = $conn->query($sql);

if ($conn->errno) {
    echo ("SQL Error : " . $conn->error);
    exit;
}
$rowresultemp = mysqli_fetch_assoc($resultemp);

if ($rowresultemp['emp_gender'] == 1) {
    $genderradio = 'optmale';
} else {
    $genderradio = 'optfemale';
}
session_start();
if (!isset($_SESSION['admin'])) {
    $message = "Please Log in";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:loginrequire.php");
}


?>

<script type="text/javascript">
    $("#<?php echo $genderradio; ?>").attr('checked', true);
    $("#cmbtitle").val('<?php echo $rowresultemp['emp_title']; ?>');
</script>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <a>Dashboard</a>
        </div>

        <ul class="list-unstyled components">
            <!--Dashboard-->
            <li>
                <a href="home.php"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a>
            </li>


            <!--Employee management-->
            <li class="active">
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Employee Mgt</a>
                <ul class="collapse list-unstyled" id="homeSubmenu1">
                    <li>
                        <a href="newemp.php">New Employee</a>
                    </li>
                    <li>
                        <a href="viewemployee.php">View</a>
                    </li>
                </ul>
            </li>
            <li>

            <li>
                <!--User management-->
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-o" aria-hidden="true"></i></i>&nbsp;User Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu2">
                    <li>
                        <a href="newuser.php">New User</a>
                    </li>
                    <li>
                        <a href="viewuser.php">View</a>
                    </li>
                </ul>
            </li>

            <li>
                <!--Supplier management-->
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;Supplier Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu3">
                    <li>
                        <a href="newsupplier.php">New Supplier</a>
                    </li>
                    <li>
                        <a href="viewsupplier.php">View</a>
                    </li>
                    <li>
                        <a href="viewstock.php">View Stock</a>
                    </li>
                </ul>
            </li>

            <li>
                <!--Stock management-->
            <li>
                <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Stock Mgt</a>
                <ul class="collapse list-unstyled" id="homeSubmenu4">
                    <li>
                        <a href="newstock.php">New Stock</a>
                    </li>
                    <li>
                        <a href="updatestock.php">Update Stock</a>
                    </li>

                </ul>
            </li>
            </li>



            <li>
                <!--Customer management-->
            <li>
                <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Customer Mgt</a>
                <ul class="collapse list-unstyled" id="homeSubmenu5">
                    <li>
                        <a href="viewcustomer.php">View</a>
                    </li>

                </ul>
            </li>
            </li>
            <li>
                <!--Order management-->
                <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;Order Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu6">

                    <li>
                        <a href="vieworder.php">View</a>
                    </li>

                </ul>
            </li>

            <li>
                <!--Billing management-->
                <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-money" aria-hidden="true"></i></i>&nbsp;Billing Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu7">
                    <li>
                        <a href="newinvoice.php">Generate Invoice</a>
                    </li>
                    <li>
                        <a href="viewbill.php">View</a>
                </ul>
            </li>

            <li>
                <!--Product management-->
                <a href="#pageSubmenu8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Product Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu8">
                    <li>
                        <a href="newproduct.php">New Product</a>
                    </li>
                    <li>
                        <a href="viewproduct.php">View</a>
                    </li>
                </ul>
            </li>

            <li>
                <!--Payment management-->
                <a href="#pageSubmenu9" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cc-visa" aria-hidden="true"></i>&nbsp;Payment Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu9">
                    <li>
                        <a href="viewpayment.php">View </a>
                    </li>

                </ul>
            </li>



            <li>
                <!--Notification management-->
                <a href="#pageSubmenu11" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;Notification Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu11">
                    <li>
                        <a href="viewnotification.php">View </a>
                    </li>

                </ul>
            </li>

            <li>
                <!--Feedback management-->
                <a href="#pageSubmenu12" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Feedback Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu12">
                    <li>
                        <a href="viewfeedback.php">View </a>
                    </li>

                </ul>
            </li>

            <li>
                <!--Report management-->
                <a href="#pageSubmenu13" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;Report Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu13">
                    <li>
                        <a href="viewreportgenerate.php">View </a>
                    </li>

                </ul>
            </li>

            <li>
                <!--Backup management-->
                <a href="#pageSubmenu14" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-database" aria-hidden="true"></i>&nbsp;Backup Mgt</a>
                <ul class="collapse list-unstyled" id="pageSubmenu14">
                    <li>
                        <a href="viewbackupmanagement.php">View </a>
                    </li>

                </ul>
            </li>
        </ul>


    </nav>

    <!-- Page Content  -->
    <div id="content">

        <!--Breadcrumb-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="editemployee.php">edit Employee</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <!--Breadcrumb-->

        <!-- New employee form-->

        <form id="employee" method="post" action="lib/addemployeehandle.php">
            <div class="form-group row">
                <label for="txteid" class="col-sm-2 col-form-label">Employee ID</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="txteid" name="txteid" value="<?php echo $rowresultemp['emp_id']; ?>" readonly="readonly">
                </div>
            </div>

            <div class="form-group row">
                <label for="cmbtitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-3">
                    <select class="form-control" id="cmbtitle" name="cmbtitle">
                        <option value="">--Select Here--</option>
                        <option value="1">Mr</option>
                        <option value="2">Ms</option>
                        <option value="3">Dr</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="txtname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Employee full name" value="<?php echo $rowresultemp['emp_name']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="dtpdob" class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-3">
                    <input type="date" id="dtpdob" class="form-control" name="dtpdob" value="<?php echo $rowresultemp['emp_dob']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input type="radio" name="optgen" id="optmale" class="form-check-input" value="1">
                        <label for="optmale" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="optgen" id="optfemale" class="form-check-input" value="0">
                        <label for="optfemale" class="form-check-label">FeMale</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="txtadd" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-5">
                    <textarea id="txtaddress" class="form-control" name="txtaddress" cols="40" rows="4" placeholder="Employee Address"><?php echo $rowresultemp['emp_address']; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="txttel" class="col-sm-2 col-form-label">Mobile Phone</label>
                <div class="col-sm-3">
                    <input type="text" id="txttel" class="form-control" name="txttel" required value="<?php echo $rowresultemp['emp_mobile']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="text" id="txtemail" class="form-control" name="txtemail" value="<?php echo $rowresultemp['emp_email']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="txtnic" class="col-sm-2 col-form-label">NIC No</label>
                <div class="col-sm-3">
                    <input type="text" id="txtnic" class="form-control" name="txtnic" value="<?php echo $rowresultemp['emp_nic']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="dtpdoj" class="col-sm-2 col-form-label">Date of Join</label>
                <div class="col-sm-3">
                    <input type="date" id="dtpdoj" class="form-control" name="dtpdoj" value="<?php echo $rowresultemp['emp_doj']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
                    <input type="submit" class="btn btn-primary" value="Update" name="btnupdate" id="btnupdate">
                    <input type="reset" class="btn btn-danger" name="">
                </div>
            </div>
        </form>
    </div>
    <script type="resources/jquery/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $("#employee").submit(function() {
            var title = $.trim($("#cmbtitle").val());
            var dob = $.trim($("#dtpdob").val());
            var mgender = $.trim($("#optmale").val());
            var fgender = $.trim($("#optfemale").val());
            var address = $.trim($("#txtaddress").val());
            var mobile = $.trim($("#txttel").val());
            var email = $.trim($("#txtemail").val());
            var nic = $.trim($("#txtnic").val());
            var doj = $.trim($("#dtpdoj").val());

            if (title = "" && dob = "" && mgender = "" && fgender = "" && address = "" && mobile = "" && email = "" && nic = "" && doj = "") {
                $("#errtitle").text("Please select the title");
            }
            if (title == "") {
                $("#errtitle").text("Please select the title");
                $("#cmbtitle").focus();
                return false;
            }

        });
    </script>



    </body>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    </html>
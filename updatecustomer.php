<?php
include('common/header.php');
include('lib/dbconnection.php');

if (isset($_GET["cusid"])) {
    $cusid = $_GET["cusid"];
}
session_start();
if (!isset($_SESSION['admin'])) {
    $message = "Please Log in";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:loginrequire.php");
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        var cid = $("#txtcid").val();
        var url = "lib/customerhandle.php?type=getCustomer";
        $.ajax({
            method: "POST",
            url: url,
            data: {
                cusid: cid
            },
            dataType: "json",
            success: function(result) {

                $("#txtname").val(result.cus_fname);
                $("#txtemail").val(result.cus_email);
                $("#cmbtype").val(result.cus_status);
                if (status == "1") {
                    $("#optactive").attr("checked", true);
                } else if (status == "0") {
                    $("#optinactive").attr("checked", true);
                }
            },
            error: function(eobj, etxt, err) {
                console.log(etxt);
            }
        });

    });

    $(function() {
        $("#btnupdate").click(function() {
            var cusid = $("#txtcid").val();
            var fname = $("#txtname").val();
            var email = $("#txtemail").val();
            swal({
                title: "Do you want to update this record?",
                text: "You are trying to update:" + cusid,
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    var fdata = $('form').serialize();
                    var url = "lib/customerhandle.php?type=updateCustomer";
                    $.ajax({

                        method: "POST",
                        url: url,
                        data: fdata,
                        dataType: "text",
                        success: function(result) {

                            res = result.split(",");
                            if (res[0] == "0") {
                                swal("Error", res[1], "error")
                            } else if (res[0] == "1") {
                                swal("Success", res[1], "success");
                                $("#lnkviewcus").click();
                            }
                        },
                        error: function(eobj, etxt, err) {
                            console.log(etxt);
                        }
                    });
                }

            });

        });

        //function for cancel button
        $("#btncancel").click(function() {
            $("#lnkviewcus").click();
        });
    });
</script>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <a>Dashboard</a>
        </div>


        <ul class="list-unstyled components">
            <!--Dashboard-->
            <li class="active">
                <a href="home.php"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a>
            </li>




            <!--Employee management-->
            <li>
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
                        <a href="newgrn.php">New Grn</a>
                    </li>
                    <li>
                        <a href="viewgrn.php">View Grn</a>
                    </li>
                    <li>
                        <a href="viewstock.php">View Stock</a>
                    </li>

                </ul>
            </li>
            </li>



            <li>
                <!--Customer management-->
            <li class="active">
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
        </ul>


    </nav>

    <!-- Page Content  -->
    <div id="content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="updatecustomer.php">Update Customer</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <!-- Customer form Start -->
        <form>
            <div class="form-group row">
                <label for="txtcid" class="col-sm-2 col-form-label">Customer ID</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control border-primary" id="txtcid" name="txtcid" value="<?php echo ($cusid) ?>" readonly="readonly">
                </div>
            </div>

            <div class="form-group row">
                <label for="txtname" class="col-sm-2 col-form-label">Customer First Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control border-primary" id="txtname" name="txtname" value="" placeholder="Employee Full Name" readonly="readonly">
                </div>
            </div>

            <div class="form-group row">
                <label for="txtemail" class="col-sm-2 col-form-label">Customer Email</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control border-primary" id="txtemail" name="txtemail" value="" placeholder="Employee Full Name" readonly="readonly">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <div class="form-check form-check-inline">
                        <!-- for align button and label -->
                        <input type="radio" class="form-check-input" name="optstatus" id="optactive" value="1">
                        <label for="optactive" class="form-check-label">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <!-- for align button and label -->
                        <input type="radio" class="form-check-input" name="optstatus" id="optinactive" value="0">
                        <label for="optinactive" class="form-check-label">Inactive</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
                    <input type="button" id="btnupdate" class="btn btn-primary" name="btnupdate" value="Update">
                    <input type="button" class="btn btn-danger" id="btncancel" name="" value="Cancel">
                </div>
            </div>




        </form>

        <!-- Customer form End-->
    </div>
    <!--    </div> -->


    </body>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    </html>
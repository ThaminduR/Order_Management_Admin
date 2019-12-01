<?php
include('common/header.php');
include('lib/employeehandle.php');
// include ('lib/addemployeehandle.php');
session_start();
if (!isset($_SESSION['admin'])) {
    $message = "Please Log in";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:loginrequire.php");
}
?>


<div class="wrapper" style="padding-top: 5px;">
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
            <li>

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
        </ul>
    </nav>
    <script>
        $(document).ready(function() {
            var dataTable = $("#tblviewgrn").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "lib/grnhandle.php?type=viewgrn",
                    "type": "POST"
                },
                "columns": [{
                        "data": "0"
                    },
                    {
                        "data": "1"
                    },
                    {
                        "data": "2"
                    },
                    {
                        "data": "3"
                    },
                    {
                        "data": "4"
                    },
                ],
                
            });
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>

    <!-- Page Content  -->
    <div id="content">

        <!--breadcrumb-->
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="viewemployee.php">view employee</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Employee Table Start-->

        <table id="tblviewgrn" class="table table-striped">
            <thead>
                <tr>
                    <th>GRN Id</th>
                    <th>Supplier Id</th>
                    <th>GRN Received Date</th>
                    <th>GRN G Total</th>
                    <th>GRN N Total</th>
                </tr>
            </thead>

        </table>
    </div>


    <!-- Employee Table End -->

    </body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>



    <!--Delete function End-->





    </html>
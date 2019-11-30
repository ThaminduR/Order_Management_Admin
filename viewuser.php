<?php
include('common/header.php');
include('lib/userhandle.php');
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
            <li class="active">
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

    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $("#tblviewusr").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "lib/userhandle.php?type=viewusers",
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
                    }

                ],
                "columnDefs": [{
                        "data": 1,
                        "render": function(data, type, row) {
                            if (data === '1') {
                                return "<p>Admin</p>";
                            } else if (data === '2') {
                                return "<p>Manager</p>";
                            } else if (data === '3') {
                                return "<p>Cashier</p>";
                            }

                        },
                        "targets": 1
                    },
                    {
                        "data": null,
                        "defaultContent": "<a href='#' title='Edit'><i class='fa fa-edit'></i></a>",
                        "targets": 3
                    },
                    {
                        "data": null,
                        "defaultContent": "<a href='#' title='password Reset'><i class='fa fa-refresh'></i></a>",
                        "targets": 4
                    },
                    {
                        "data": null,
                        "defaultContent": "<a href='#' title='Delete'><i style='color:red' class='fa fa-trash'></i></a>",
                        "targets": 5
                    }
                ]
            });

            $("#tblviewusr tbody").on('click', 'a', function() {
                var type = $(this).attr('title');
                var data = dataTable.row($(this).parents('tr')).data();

                var eid = data[0];
                var uname = data[1];
                if (type == "Edit") {
                    window.location = "updateuser.php?empid=" + eid;
                } else if (type == "password Reset") {
                    // alert("result");
                    window.location = "resetpass.php?empid=" + eid;
                    swal({
                        title: "Do you want to Reset password?",
                        text: "You are trying to update:" + eid,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true
                    }).then((willDelete) => {
                        if (willDelete) {

                            var url = "lib/userhandle.php?type=resetPassword";
                            $.ajax({

                                method: "POST",
                                url: url,
                                data: {
                                    eid: eid,
                                    uname: uname
                                },
                                dataType: "text",
                                success: function(result) {
                                    res = result.split(",");
                                    if (res[0] == "0") {
                                        swal("Error", res[1], "error")

                                    } else if (res[0] == "1") {
                                        swal("Success", res[1], "success");
                                        $("#lnkviewuser").click();
                                    }
                                },
                                error: function(eobj, etxt, err) {
                                    console.log(etxt);
                                }
                            });
                        }
                    });
                } else if (type == "Status") {
                    swal({
                        title: "Do you want to change the status of this user?",
                        text: "You are trying to change status of :" + uname,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true
                    }).then((willDelete) => {
                        if (willDelete) {
                            var url = "lib/mod_user.php?type=changeStatus";
                            $.ajax({
                                method: "POST",
                                url: url,
                                data: {
                                    uname: uname
                                },
                                dataType: "text",
                                success: function(result) {
                                    res = result.split(",");
                                    if (res[0] == "0") {
                                        swal("Error", res[1], "error");
                                    } else if (res[0] == "1") {
                                        swal("Success", res[1], "success");
                                        $("#lnkviewuser").click();
                                    }
                                },
                                error: function(eobj, etxt, err) {
                                    console.log(etxt);
                                }
                            })
                        }
                    })
                };


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
                        <li class="breadcrumb-item"><a href="viewuser.php">view user</a></li>
                    </ol>
                </div>
            </div>
        </div>


        <!-- User Table Start-->
        <div>
            <table id="tblviewusr" class="table table-striped">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

            </table>
        </div>


        <!-- User Table End -->
        </body>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>

        </html>
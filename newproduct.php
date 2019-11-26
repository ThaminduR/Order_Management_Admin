<?php
include('common/header.php');
include('lib/grnhandle.php');
session_start();
if (!isset($_SESSION['admin'])) {
    $message = "Please Log in";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:loginrequire.php");
}
// $conn=DB:: connectDB();

//     $
?>
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
            <li class="active">
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="newproduct.php">New product</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- New product form start-->
        <form enctype="multipart/form-data" id="frmproimg">
            <div class="form-group row">
                <label for="cmbcat" class="col-sm-2 col-form-label">Categories</label>
                <div class="col-sm-3">
                    <select class="form-control " id="cmbcat" name="cmbcat">
                        <option value="">--Select Category--</option>
                        <?php getCategories(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="cmbpro" class="col-sm-2 col-form-label">Sub Category</label>
                <div class="col-sm-3">
                    <select class="form-control " id="cmbsub" name="cmbsub">
                        <option value="">--Select Sub Category--</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="cmbpro" class="col-sm-2 col-form-label"> brand Name</label>
                <div class="col-sm-3">
                    <select class="form-control " id="cmbbrnd" name="cmbbrnd">
                        <option value="">--Select Prod Brand Name--</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="cmbpro" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-3">
                    <select class="form-control " id="cmbpro" name="cmbpro">
                        <option value="">--Select Products Name--</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="cmbpro" class="col-sm-2 col-form-label">Prod Size</label>
                <div class="col-sm-3">
                    <select class="form-control " id="cmbprosize" name="cmbprosize">
                        <option value="">--Select Prod Size--</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="cmbpro" class="col-sm-2 col-form-label">Prod Colors</label>
                <div class="col-sm-3">
                    <select class="form-control " id="cmbclr" name="cmbclr">
                        <option value="">--Select Prod Colors--</option>
                        <option value="black">black</option>
                        <option value="white">white</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="txteid" class="col-sm-2 col-form-label">Prod Discription</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="txtdis" name="txtdis" cols="40" rows="4">
                </div>
            </div>


            <div class="form-group row">
                <label for="txteid" class="col-sm-2 col-form-label">Prod Re Order level</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="txteid" name="txteid" cols="40" rows="4">
                </div>
            </div>




            <div class="form-group row">
                <label for="imgprod" class="col-sm-2 col-form-label">Select Image</label>
                <div class="col-sm-3">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input type="file" name="imgprod" id="imgprod" class="form-control-file">
                </div>
            </div>
            <div>
                <button type="button" class="ml-3 col-sm-1  btn btn-primary" id="btnupload" name="btnupload">Upload</button>
            </div>
        </form>
        <!-- New product form end-->
    </div>



    </body>
    <script type="text/javascript">
        $(document).ready(function() {
            // $("#cmbcat").change(function(){
            //     var cid = $(this).val();
            //     if(cid==""){
            //          $("#cmbpro").html('<option value="">--Select Products--</option>');
            //     }else{
            //     var url = "lib/grnhandle.php?type=getProducts";

            //     $.ajax({

            //       method:"POST",
            //       url:url,
            //       data:{catid:cid},
            //       dataType:"text",
            //       success:function(result){
            //         /*alert(result);*/

            //         if(result=="0"){
            //           swal("Error","There is an issue in backend module,please contect support ","error")
            //         }else{
            //           $("#cmbpro").html(result)
            //         }

            //     },
            //       error:function(eobj,etxt,err){
            //       console.log(etxt);
            //     }

            //     });
            //     }

            //     });


            $("#btnupload").click(function() {
                var fdata = new FormData($('#frmproimg')[0]);
                var url = "lib/prodhandle.php?type=addProdImage";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: fdata,
                    dataType: "text",
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(result) {
                        // alert(result);
                        res = result.split(",");
                        if (res[0] == "0") {
                            swal("Error", res[1], "error")
                        } else if (res[0] == "1") {
                            swal("Success", res[1], "success");
                            // $("#lnknewgrn").click();
                        }
                    },
                    error: function(eobj, etxt, err) {
                        console.log(etxt);
                    }

                });
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

            $("#cmbcat").change(function() {
                var cmbcat = $("#cmbcat").val();
                $.post('lib/grnhandle.php?type=setSubSelect', {
                    cmbcat: cmbcat
                }, function(data) {
                    $("#cmbsub").html(data);
                    // alert(data);
                });
                //alert("a");
            });

            $("#cmbsub").change(function() {
                var cmbsub = $("#cmbsub").val();
                $.post('lib/grnhandle.php?type=SelectBrnd', {
                    cmbsub: cmbsub
                }, function(data) {
                    $("#cmbbrnd").html(data);
                    //     alert(data);
                });
            });

            $("#cmbbrnd").change(function() {
                var cmbbrnd = $("#cmbbrnd").val();
                $.post('lib/grnhandle.php?type=SelectProduct', {
                    cmbbrnd: cmbbrnd
                }, function(data) {
                    $("#cmbpro").html(data);
                    //     alert(data);
                });
            });


        });
    </script>



    </html>
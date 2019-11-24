<?php

include 'common/header.php';
// include ('lib/userhandle.php');
session_start();
if (!isset($_SESSION['admin'])) {
    $message = "Please Log in";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:loginrequire.php");
}
?>
<link rel="stylesheet" type="text/css" href="resources/css/style.css">

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
                            <a href="emprpt.php">Employee</a>
                        </li>
                        <li>
                            <a href="reportproduct.php">Product</a>
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
            </li>
        </li>
    </li>
</ul>
</nav>

        <!-- Page Content  -->
        <div id="content">  
           
        <!--breadcrumb-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="newuser.php">new user</a></li>
                        </ol>
                    </div>
                </div>
            </div>
     

  
    <!-- New User form-->
    <form action="">
    <div class="form-group row">
        <label for="cmbename" class="col-sm-2 col-form-label">Employee Name</label>
        <div class="col-sm-4">
            <div class="dropdown">
                <input type="text" name="txtename" id="txtename" class="form-control">
                  <div class="dropdown-content" id="dropdown-content">
                  </div>
            </div>
        </div>
  </div>

    <div class="form-group row">
        <label for="txteid" class="col-sm-2 col-form-label">Employee ID</label>
        <div class="col-sm-3">
            <input type="text" name="txteid" id="txteid" class="form-control" readonly="readonly">
        </div>
    </div>

    <div class="form-group row">
        <label for="txtuname" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-4">
            <input type="text" name="txtuname" id="txtuname" class="form-control" readonly="readonly">
        </div>
    </div>

    <div class="form-group row">
        <label for="cmbtype" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-3">
            <select class="form-control" name="cmbtype" id="cmbtype">
                <option value="">--Select Here--</option>
                <option value="1">Admin</option>
                <option value="2">Manager</option>
                <option value="3">Cashier</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <input type="button" class="btn btn-primary" value="Save" name="btnsave" id="btnsave">
            <input type="reset" class="btn btn-danger">
        </div>
   </div>            
</form>
</div>


</body>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <!-- search field function -->
    <script type="text/javascript">
        $("#txtename").keyup(function(){
            var ename = $.trim($("#txtename").val());
            if(ename !=""){

                $.ajax({
                    method:"POST",
                    url:'lib/userhandle.php',
                    data:{
                        isSearch : true,
                        ename : ename
                    },
                    dataType:"text",
                    success:function(data){
                        $("#dropdown-content").html(data);
                        $("#dropdown-content").css('display', 'block');
                    },
                    error:function(eobj,etxt,err){
                      console.log(etxt);
                    }
                  });
            }else{
                $("#dropdown-content").css('display', 'none');
            }
        });

        function fillData(emp_id){
            $.ajax({
                method:"POST",
                url:'lib/userhandle.php',
                data:{
                    isFillData : true,
                    emp_id : emp_id
                },
                dataType:"json",
                success:function(data){
                    //alert(data.emp_id);
                    $("#txteid").val(data.emp_id);
                    $("#txtuname").val(data.emp_email);
                    $("#dropdown-content").css('display', 'none');
                },
                error:function(eobj,etxt,err){
                  console.log(etxt);
                }
              });
        }

    $("#btnsave").click(function(){
    var ename=$("#txtename").val();
    var eid =$("#txteid").val();
    var etype=$("#cmbtype").val();

    if(ename==""){
      swal("Incomplete input","Please enter User name","error");
      return;
    }else if(etype==""){
      swal("Incomplete input","Please enter User name","error");
      return;
    }

    var fdata = $("form").serialize();
    var url = "lib/userhandle.php?type=addNewUser";

    $.ajax({
 
      method:"POST",
      url:url,
      data:fdata,
      dataType:"text",
      success:function(result){
        res = result.split(",");
        if(res[0]=="0"){
          swal("Error",res[1],"error")
        }
        else if(res[0]=="1"){
          swal("Success",res[1],"success");
          $("#lnknewacc").click();
        }
        
      },
      error:function(eobj,etxt,err){
        console.log(etxt);
      }
      });
   }); 
    </script>

</html>
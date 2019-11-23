<?php
include ('common/header.php');
include ("lib/dbconnection.php");

if(isset($_GET["empid"])){
    $empid = $_GET["empid"];
 }

?>
<script type="text/javascript">
        $(document).ready(function(){

        var eid = $("#txteid").val();
        var url = "lib/userhandle.php?type=getUser";
        $.ajax({
            method:"POST",
            url:url,
            data:{empid:eid},
            dataType:"json",
            success:function(result){
                $("#cmbtitle").val(result.emp_title);
                $("#txtname").val(result.emp_name);
          $("#txtuname").val(result.emp_email);
          

                
            },
            error:function(eobj,etxt,err){
                console.log(etxt);
            }
        }); 
    });

        $(function(){
    $("#btnupdate").click(function(){
      var eid   =$("#txteid").val();
      var username =$("#txtuname").val();
      var pass = $("#txtpass").val();
      
      
      swal({
        title:"Do you want to Reset password?",
        text:"You are trying to update:"+eid,
        icon:"warning",
        buttons:true,
        dangerMode:true
      }).then((willDelete)=>{
        if(willDelete){
          var fdata = $('form').serialize();
          var url = "lib/userhandle.php?type=changeUsrPass";
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
              $("#lnkviewuser").click();
            }
          },
          error:function(eobj,etxt,err){
            console.log(etxt);
          }
          });
        }
         
        });

  });

  // function for cancel button
  $("#btncancel").click(function(){
    $("#lnkviewuser").click();
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
                <li>
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

                <li class="active">
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
                            <a href="neworder.php">New Order</a>
                        </li>
                        <li>
                            <a href="vieworder.php">View</a>
                        </li>
                        <li>
                            <a href="handleorder.php">Handle Order</a>
                        </li>
                    </ul>
                </li>

                    <li>
                    <!--Billing management-->
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-money" aria-hidden="true"></i></i>&nbsp;Billing Mgt</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu7">
                        <li>
                            <a href="generatebill.php">Generate Bill</a>
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
                            <a href="manageproduct.php">New Product</a>
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
                    <!--OrderTracking management-->
                    <a href="#pageSubmenu10" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;OredrTracking Mgt</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu10">
                        <li>
                            <a href="viewordertracking.php">View </a>
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

           
        </nav>

        <!-- Page Content  -->
        <div id="content">
        	<!-- Bresdcrumb Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="editusr.php">Reset User Password</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Bresdcrumb End -->
            <!-- Reset Pass form Start -->
               <!-- Update employee form-->
         
           <form>
              <div class="form-group row">
                <label for="txteid" class="col-sm-2 col-form-label">Employee ID</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="txteid" name="txteid" value="<?php echo($empid); ?>" readonly="readonly">
                </div>
              </div>

              <div class="form-group row">
                <label for="cmbtitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-3">
                  <select class="form-control" name="cmbtitle" id="cmbtitle" readonly="readonly" disabled="disabled">
                    <option>-- Select --</option>
                    <option value="1">Mr.</option>
                    <option value="2">Ms.</option>
                    <option value="3">Dr.</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="txtname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="txtname" name="txtname" value="" placeholder="Employee Full Name" readonly="readonly">
                </div>
              </div> 

              <div class="form-group row">
                <label for="txtuname" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="txtuname" name="txtuname" value="" placeholder="Employee Full Name" readonly="readonly">
                </div>
              </div>

              <div class="form-group row">
                <label for="txtpass" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-5">
                  <input class="form-control" type="text" id="txtpass"  name="txtpass">
                </div>
              </div>
              
              
              
              

              
              <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
                  <input type="button" id="btnupdate" class="btn btn-primary" name="btnupdate" value="Confirm">
                  <input type="button" class="btn btn-danger" id="btncancel" name="" value="Cancel">
                </div>
              </div>
              
              

             
           </form>
              

             
           </form>

            <!-- Reset Pass form End -->
           

            <!-- Customer Form End-->
        </div>
<!--     </div>
 -->

</body>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</html>
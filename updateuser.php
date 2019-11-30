<?php

include 'common/header.php';
include('lib/dbconnection.php');

if (isset($_GET["empid"])) {
  $empid = $_GET["empid"];
}
session_start();
if (!isset($_SESSION['admin'])) {
  $message = "Please Log in";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header("location:loginrequire.php");
}
?>

<style>
  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #f1f1f1
  }
</style>

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
    </ul>
  </nav>

  <!-- Page Content  -->
  <div id="content">

    <!--breadcrumb-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="updateuser.php">Update user</a></li>
          </ol>
        </div>
      </div>
    </div>



    <!-- Update employee form-->

    <form>
      <div class="form-group row">
        <label for="txteid" class="col-sm-2 col-form-label">Employee ID</label>
        <div class="col-sm-3">
          <input type="text" class="form-control border-primary" id="txteid" name="txteid" value="<?php echo ($empid); ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group row">
        <label for="cmbtitle" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-3">
          <select class="form-control border-primary" name="cmbtitle" id="cmbtitle" readonly="readonly">
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
          <input type="text" class="form-control border-primary" id="txtname" name="txtname" value="" placeholder="Employee Full Name" readonly="readonly">
        </div>
      </div>

      <div class="form-group row">
        <label for="txtuname" class="col-sm-2 col-form-label">User Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control border-primary" id="txtuname" name="txtuname" value="" placeholder="Employee Full Name" readonly="readonly">
        </div>
      </div>

      <div class="form-group row">
        <label for="cmbtype" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-3">
          <select class="form-control border-primary" name="cmbtype" id="cmbtype">

            <option value="1">Admin</option>
            <option value="2">Manager</option>
            <option value="3">Cashier</option>
            <option value="4">Delivery</option>
          </select>
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
  </div>


  </body>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>

  <!-- search field function -->
  <script type="text/javascript">
    // $("#txtename").keyup(function(){
    //     var ename = $.trim($("#txtename").val());
    //     if(ename !=""){

    //         $.ajax({
    //             method:"POST",
    //             url:'lib/userhandle.php',
    //             data:{
    //                 isSearch : true,
    //                 ename : ename
    //             },
    //             dataType:"text",
    //             success:function(data){
    //                 $("#dropdown-content").html(data);
    //                 $("#dropdown-content").css('display', 'block');
    //             },
    //             error:function(eobj,etxt,err){
    //               console.log(etxt);
    //             }
    //           });
    //     }else{
    //         $("#dropdown-content").css('display', 'none');
    //     }
    // });

    // function fillData(emp_id){
    //     $.ajax({
    //         method:"POST",
    //         url:'lib/userhandle.php',
    //         data:{
    //             isFillData : true,
    //             emp_id : emp_id
    //         },
    //         dataType:"json",
    //         success:function(data){
    //             //alert(data.emp_id);
    //             $("#txteid").val(data.emp_id);
    //             $("#txtuname").val(data.emp_email);
    //             $("#dropdown-content").css('display', 'none');
    //         },
    //         error:function(eobj,etxt,err){
    //           console.log(etxt);
    //         }
    //       });
    // }

    //  $("#btnsave").click(function(){
    //  var ename=$("#txtename").val();
    //  var eid =$("#txteid").val();
    //  var etype=$("#cmbtype").val();

    //  if(ename==""){
    //    swal("Incomplete input","Please enter User name","error");
    //    return;
    //  }else if(etype==""){
    //    swal("Incomplete input","Please enter User name","error");
    //    return;
    //  }

    //  var fdata = $("form").serialize();
    //  var url = "lib/userhandle.php?type=addNewUser";

    //  $.ajax({

    //    method:"POST",
    //    url:url,
    //    data:fdata,
    //    dataType:"text",
    //    success:function(result){
    //      res = result.split(",");
    //      if(res[0]=="0"){
    //        swal("Error",res[1],"error")
    //      }
    //      else if(res[0]=="1"){
    //        swal("Success",res[1],"success");
    //        $("#lnknewacc").click();
    //      }

    //    },
    //    error:function(eobj,etxt,err){
    //      console.log(etxt);
    //    }
    //    });
    // }); 

    $(document).ready(function() {

      var eid = $("#txteid").val();
      var url = "lib/userhandle.php?type=getUser";
      $.ajax({
        method: "POST",
        url: url,
        data: {
          empid: eid
        },
        dataType: "json",
        success: function(result) {
          // alert("result");
          $("#cmbtitle").val(result.emp_title);
          $("#txtname").val(result.emp_name);
          $("#txtuname").val(result.emp_email);
          $("#cmbtype").val(result.usr_type);
          var status = result.user_status;
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
        var eid = $("#txteid").val();
        var type = $("#cmbtype").val();
        var status = $("#optstatus").val();

        swal({
          title: "Do you want to update this record?",
          text: "You are trying to update:" + eid,
          icon: "warning",
          buttons: true,
          dangerMode: true
        }).then((willDelete) => {
          if (willDelete) {
            var fdata = $('form').serialize();
            var url = "lib/userhandle.php?type=updateUsers";
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
                  $("#lnkviewuser").click();
                }
              },
              error: function(eobj, etxt, err) {
                console.log(etxt);
              }
            });
          }

        });

      });

      // function for cancel button
      $("#btncancel").click(function() {
        $("#lnkviewuser").click();
      });
    });
  </script>

  </html>
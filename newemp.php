<?php
include('common/header.php');
include 'lib/dbconnection.php';



$conn = DB::connectDB();

$sql = "SELECT emp_id FROM tbl_employee ORDER BY emp_id DESC LIMIT 1;";
$resultempid = $conn->query($sql);

if ($conn->errno) {
  echo ("SQL Error : " . $conn->error);
  exit;
}

$nor = $resultempid->num_rows;

if ($nor == 0) {
  $newid = "EMP00001";
} else {
  $rec = $resultempid->fetch_assoc();
  $lastid = $rec["emp_id"];
  $num = substr($lastid, 3);
  $num++;
  $newid = "EMP" . str_pad($num, 5, "0", STR_PAD_LEFT);
}
session_start();
if (!isset($_SESSION['admin'])) {
  $message = "Please Log in";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header("location:loginrequire.php");
}
?>
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
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="newemp.php">New Employee</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- New employee form-->

    <form>
      <div class="form-group row">
        <label for="txteid" class="col-sm-2 col-form-label">Employee ID</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="txteid" name="txteid" value="<?php echo ($newid); ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group row">
        <label for="cmbtitle" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-3">
          <select class="form-control" name="cmbtitle" id="cmbtitle">
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
          <input type="text" class="form-control" id="txtname" name="txtname" value="" placeholder="Employee Full Name">
        </div>
      </div>

      <div class="form-group row">
        <label for="dtpdob" class="col-sm-2 col-form-label">Date Of Birth</label>
        <div class="col-sm-3">
          <input type="date" id="dtpdob" class="form-control" name="dtpdob">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-5">
          <div class="form-check form-check-inline">
            <!-- for align button and label -->
            <input type="radio" class="form-check-input" name="optgen" id="optmale" value="1">
            <label for="optmale" class="form-check-label">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <!-- for align button and label -->
            <input type="radio" class="form-check-input" name="optgen" id="optfemale" value="0">
            <label for="optfemale" class="form-check-label">Female</label>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="txtaddress" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-3">
          <input type="text" id="txtaddress" class="form-control" name="txtaddress" placeholder="Enter Your Address">
        </div>
      </div>

      <div class="form-group row">
        <label for="txttel" class="col-sm-2 col-form-label">Mobile</label>

        <div class="col-sm-3">
          <input type="text" id="txttel" class="form-control" name="txttel" placeholder="Enter Your mobile number">
        </div>
      </div>

      <div class="form-group row">
        <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-3">
          <input type="text" id="txtemail" class="form-control" name="txtemail" placeholder="Enter Your Email Address">
        </div>
      </div>

      <div class="form-group row">
        <label for="txtnic" class="col-sm-2 col-form-label">NIC</label>
        <div class="col-sm-3">
          <input type="text" id="txtnic" class="form-control" name="txtnic" placeholder="Enter Your NIC here">
        </div>
      </div>

      <div class="form-group row">
        <label for="dtpdoj" class="col-sm-2 col-form-label">Date of Join</label>
        <div class="col-sm-3">
          <input type="date" id="dtpdoj" class="form-control" name="dtpdoj">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <input type="button" id="btnreg" class="btn btn-primary" name="btnreg" value="Register">
          <input type="reset" class="btn btn-danger" name="">
        </div>
      </div>

    </form>
  </div>
  </body>

  <script type="text/javascript">
    $(function() {
      $("#btnreg").click(function() {
        var title = $("#cmbtitle").val();
        var name = $("#txtname").val();
        var dob = $("#dtpdob").val();
        var gender = $("input[name='optgen']:checked").length;
        var address = $("#txtaddress").val();
        var mobile = $("#txttel").val();
        var email = $("#txtemail").val();
        var nic = $("#txtnic").val();
        var doj = $("#dtpdoj").val();

        if (title == "0") {
          swal("Invalid Input", "Please Select the title", "error");
          return;
        }
        var name_pattern = /^[a-zA-Z\.\s]+$/;

        if (!name.match(name_pattern)) {
          swal("Invalid Input", "Please enter valid name", "error");
          return;
        }
        var date_pattern = /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/;
        if (!dob.match(date_pattern)) {
          swal("Invalid Input", "Please Enter valid date", "error");
          return;
        }

        if (gender == 0) {
          swal("Required Field ", "Please Select Gender", "error");
          return;
        }
        if (address == 0) {
          swal("Required Field ", "Please enter valid address", "error");
          return;
        }

        var email_pattern = /^[a-zA-Z\d\.\_]+\@[a-zA-Z\d\.\-]+\.[a-zA-Z]{2,4}$/;

        if (!email.match(email_pattern)) {
          swal("Invalid Input", "Please Enter valid email address", "error");
          return;
        }
        var fdata = $('form').serialize();
        var url = "lib/addemployeehandle.php?type=addNewEmp";

        $.ajax({

          method: "POST",
          url: url,
          data: fdata,
          dataType: "text",
          success: function(result) {
            // alert(result);
            res = result.split(",");
            if (res[0] == "0") {
              swal("Error", res[1], "error")
            } else if (res[0] == "1") {
              swal("Success", res[1], "success");
              $("#lnknewemployee").click();
            }
          },
          error: function(eobj, etxt, err) {
            console.log(etxt);
          }

        });

      });
    });



























    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>

  </html>








  <?php
  // echo($newid); 
  ?>
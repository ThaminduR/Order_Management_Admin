<?php
include('common/header.php');
include('lib/userhandle.php');
include('lib/dbconnection.php');
include('lib/deliveryHandle.php');
session_start();
if (!isset($_SESSION['dlvr'])) {
  if (!isset($_SESSION['mgmt'])) {
    $message = "Please Log in";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:loginrequiremgm.php");
  }
}
?>



<script>
    $(document).ready(function() {
      var dataTable = $("#tblvieword").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "lib/vieworderhandle.php?type=viewOrder",
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

    <!-- Order  Table Start-->

    <table id="tblvieword" class="table table-striped">
      <thead>
        <tr>
          <th>Order Id</th>
          <th>Order Date</th>
          <th>Customer ID</th>
          <th>Delivery Person ID</th>
          <th>Tracking Status</th>
          <th>Set Delivery Status</th>
        </tr>
      </thead>

    </table>

    
  </div>


  <!-- Order Table End -->
  <script>
    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>
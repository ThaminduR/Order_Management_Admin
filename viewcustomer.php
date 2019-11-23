<?php

include ('common/header.php')
;
include ('lib/customerhandle.php');
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
                    <li>
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
            </li>
        </li>
    </li>
</ul>
</nav>

        <!-- Page Content  -->
        <div id="content">  
           
        <!--breadcrumb-->
            <div class="container-fluid pt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="viewcustomer.php">view customer</a></li>
                        </ol>
                    </div>
                </div>
            </div>


    <!-- Customer Table Start-->
   
   <table id="tblviewcus" class="table table-striped">
  <thead>
    <tr>
      <th>Cus Id</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Customer Mobile</th>
      <th>Customer Address</th>      
      <th>Customer Email</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  
</table>
    <!-- Customer Table End -->
    
</div></div>


</body>

    <script type="text/javascript">
        $(document).ready(function () {
            var dataTable = $("#tblviewcus").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "lib/customerhandle.php?type=viewCustomer",
                    "type": "POST"
                },
                "columns":[
                  {"data":"0"},
                  {"data":"1"},
                  {"data":"2"},
                  {"data":"3"},
                  {"data":"4"},
                  {"data":"5"},
                ],

                "columnDefs":[
                   {
                    "data":null,
                    "defaultContent": "<a href='#' title='Edit'><i class='fa fa-edit'></i></a>",
                    "targets": 6
                  },
                  {
                    "data":null,
                    "defaultContent": "<a href='#' title='Delete'><i style='color:red' class='fa fa-trash'></i></a>",
                    "targets": 7
                  }
                ]
            });
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            $("#tblviewcus tbody").on('click','a',function(){
                var type = $(this).attr('title');
                var data = dataTable.row($(this).parents('tr')).data();

                var cusid = data[0];
                var fname = data[1];
                if(type=="Edit"){
                window.location = "updatecustomer.php?cusid="+cusid;
                }else if(type=="Delete"){
                            swal({
                            title:"Do you want to remove this customer?",
                            text:"You are trying to remove Customer :"+cusid,
                            icon:"warning",
                            buttons:true,
                            dangerMode:true
                          }).then((willDelete)=>{
                            if(willDelete){
                              var url = "lib/customerhandle.php?type=deleteCus";
                              $.ajax({
                                method:"POST",
                                url:url,
                                data:{cusid:cusid},
                                dataType:"text",
                                success:function(result){
                                  res = result.split(",");
                                  if(res[0]=="0"){
                                    swal("Error",res[1],"error");
                                  }
                                  else if(res[0]=="1"){
                                    swal("Success",res[1],"success");
                                    window.location = "viewcustomer.php";
                                  }
                                },
                                error:function(eobj,etxt,err){
                                  console.log(etxt);
                                }
                              });
                            }
                          });
                      }
            });
        });
    </script>

</html>
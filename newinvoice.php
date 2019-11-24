<?php
include 'common/header.php';
require_once('lib/invoicehandle.php');
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

                    <li class="active">
                    <!--Billing management-->
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-money" aria-hidden="true"></i></i>&nbsp;Billing Mgt</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu7">
                        <li>
                            <a href="newinvoice.php">Generate Invoice</a>
                        </li>
                        <li>
                            <a href="viewbill.php">View</a>
                        </li>
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
        	
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="newnvoice.php">New Invoice</a></li>
                        </ol>
                    </div>
                </div>
            </div>
           
 <!-- Generate New Invoice Start-->
 <form>
<div class="form-group row">
      <label for="cmbcat" class="col col-sm-2 col-form-label">Invoice ID</label>
      <div class="col-sm-3">
          <input type="text" name="txtinvno" id="txtinvno" readonly="readonly" class="form-control" value="<?php getNewINVNo();?>">
      </div>

      <label for="txtrdate" class="col-sm-1 col-form-label">Date</label>
      <div class="col-sm-2">
        <input type="date" class="form-control "  id="txtdate" name="txtdate" value="">    
      </div>

</div>
<div class="form-group row">
      <label for="txtproid" class="col-sm-2 col-form-label">Product ID</label>
      <div class="col-sm-3">
          <input type="text" name="txtproid" id="txtproid" class="form-control" >
      </div>

      <label for="txtproid" class="col-sm-1 col-form-label">Name</label>
      <div class="col-sm-3">
          <input type="text" name="txtproname" id="txtproname" class="form-control" readonly>
          
      </div>
      <label for="txtproid" class="col-sm-1 col-form-label">Availabilty</label>
      <div class="col-sm-1">
          <input type="text" name="txteqty" id="txteqty" class="form-control" readonly  >
      </div>
</div>

<div class="form-group row">
      <label for="cmbcat" class="col col-sm-2 col-form-label">Units</label>
      <div class="col-sm-1">
          <input type="number" name="txtqty" id="txtqty"  class="form-control" value="1" min="1" >
      </div>
 </div>
<div class="form-group row">
      <button type="button" class="ml-3 col-sm-1 btn btn-primary" id="btnadd" name="btnadd" >ADD </button>
      
</div>
<div id="dvdetails">
    <table class="table ">
      <thread>
        <tr>
          <th></th>
          <th>Product ID</th>
          <th>Batch ID</th>
          <th>Product Name</th>       
          <th>Price(Rs)</th>
          <th>Qty</th>
          <th>Total</th>
        </tr>
      <thread>
        <tbody id="invdetails">
          
        </tbody>
        <tfoot>
          <tr align="right">
            <th colspan="6" >Gross Total(Rs)</th>
            <td><input type="text" name="txtgtot" id="txtgtot" class="form-control-plaintext currency" readonly="readonly" size="2" value="0.00" ></td>
          </tr>
          <tr align="right">
            <th colspan="6" >Discount (%)</th>
            <td> <input type="text" size="1" class="currency form-control" id="txtdiscount" name="txtdiscount"> </td>
          </tr>
          <tr align="right">
            <th colspan="6" >Net Total(Rs)</th>
            <td><input type="text" name="txtntot" id="txtntot" class="form-control-plaintext currency" readonly="readonly" size="2" value="0.00 "></td>
          </tr>
          <tr>
            <td colspan="7">
              <button type="button" class=" col-sm-1 btn btn-success" id="btnsave" name="btnsave" >Save </button>
              <button type="button" class=" col-sm-1 btn btn-danger" id="btncancel" name="btncancel" >Cancel </button>
            </td>
          </tr>
        </tfoot>
    </table> 
  
</div>
 </form>  


 <!-- Generate New Invoice End -->

  
<!-- 
        </div> -->
</body>

    <script type="text/javascript">
        $(document).ready(function(){
        $("#txtrdate").datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:"yy-mm-dd",
      maxDate:"0"
    });
        });

        // get product details Srtart
        $("#txtproid").keypress(function(e){
            if(e.which==13){
                if($(this).val()==""){
                    swal("Error","Please enter a product id","error");
                }else{
                 var pid = $(this).val();
                var url = "lib/invoicehandle.php?type=getProductDetails";

                $.ajax({

                  method:"POST",
                  url:url,
                  data:{prodid:pid},
                  dataType:"text",
                  success:function(result){
                   
                    res = result.split(",");
                    
                    if(res[0]=="0"){
                      swal("Error",res[1],"error");
                    }else if(res[0]=="1"){
                        $("#txtproname").val(res[1]);
                        $("#txteqty").val(res[2]);
                      
                    }
                  
                    },
                  error:function(eobj,etxt,err){
                  console.log(etxt);
                    }
                });
            }
          }
       });

        // get product details End

        // Add Nutton Start
             $("#btnadd").click(function(){
            var pid = $("#txtproid").val();
            var avail = parseInt($("#txteqty").val());
            var rqty = parseInt($("#txtqty").val());

            if(rqty>avail){
                swal("Error","Availabilty is less than required quantity","error");
                return;
            }

            var url = "lib/invoicehandle.php?type=getBatchDetails";

            $.ajax({

                  method:"POST",
                  url:url,
                  data:{prodid:pid,rqty:rqty},
                  dataType:"json",
                  success:function(result){
                    for(i=0;i<result.length;i++){
                        var pid = result[i][0];
                        var bid = result[i][1];
                        var pname = result[i][2];
                        var sprice = parseFloat(result[i][3]);
                        var qty = parseInt(result[i][4]);
                        var total = sprice*qty;
                        var gtot = parseFloat($("#txtgtot").val());
                        var ntot = parseFloat($("#txtntot").val());


                        var row ="<tr>";
                        row +="<td><a href='javascript:void(0)'><i class='fa fa-times text-danger remove'           aria-hidden='true'><i/></a></td>";

                        row +="<td><input type='text' class='form-control-plaintext' size='2' readonly='readonly' value='"+pid+"' name='txtipid[]' /></td>";

                        row +="<td><input type='text' class='form-control-plaintext' size='2' readonly='readonly' value='"+bid+"' name='txtibid[]' /></td>";

                        row +="<td><input type='text' class='form-control-plaintext' size='2' readonly='readonly' value='"+pname+"' name='txtipname[]' /></td>";

                        row +="<td><input type='text' class='form-control-plaintext' size='2' readonly='readonly' value='"+sprice+"' name='txtisprice[]' /></td>";

                        row +="<td><input type='text' class='form-control-plaintext' size='2' readonly='readonly' value='"+qty+"' name='txtiqty[]' /></td>";

                        row +="<td><input type='text' class='form-control total' size='2' readonly='readonly' value='"+total+"' name='txtitotal[]' /></td>";

                        row +="</tr>";
                        gtot = gtot+total;
                        ntot = ntot+total;
                        $("#txtgtot").val(gtot);
                        $("#txtntot").val(ntot);

                        $("#invdetails").append(row);
                        resetctrl();
                    
                        }                 
                    },
                    error:function(eobj,etxt,err){
                     console.log(etxt);
                    }
            });

            
        });
         // Add Button End

         // Calculate discount Start
            $("#txtdiscount").keypress(function(e){
            if(e.which==13){
                 if($(this).val()==""){
                      $("#txtntot").val($("#txtgtot").val());
                }else{
                    var discount = parseFloat($(this).val());
                    var gtot = parseFloat($("#txtgtot").val());
                    var ntot = gtot - (gtot*discount/100);
                    $("#txtntot").val(ntot);
                        }
                        
                        $(this).prop("readonly","readonly");
                      }
                    });

                    $("#txtdiscount").dblclick(function(e){
                      $(this).prop("readonly","");
            });
          // Calculate discount End

          // Remove function Start
            $("#invdetails").on("click",".remove",function(){ // after load page if click remove run function
               // $(this).parents("tr").remove();
               var total =parseFloat($(this).parents("tr").find(".total").val());
               var gtot = parseFloat($("#txtgtot").val());
                var ntot = parseFloat($("#txtntot").val());

                gtot = gtot-total;
                $("#txtdiscount").prop("readonly","");
                $("#txtdiscount").val("");
                ntot = gtot;

                $("#txtgtot").val(gtot);
                $("#txtntot").val(ntot);

                $(this).parents("tr").remove();

         });    
           // Remove function End

           // Button Save Start
            $("#btnsave").click(function(){
                var fdata = $('form').serialize();
                var url = "lib/invoicehandle.php?type=newInvoice";

                $.ajax({
                    method:"POST",
                    url:url,
                    data:fdata,
                    dataType:"text",
                    success:function(result){

                        res = result.split(",");
                        if(res[0]=="0"){
                        swal("Error",res[1],"error");
                        }
                        else if(res[0]=="1"){
                        swal("Success",res[1],"success");
                            var invid = $("#txtinvno").val();
                            var amount = $("#txtntot").val();
                            sessionStorage.setItem("invid", invid);
                            sessionStorage.setItem("amt", amount);
                            $("#lnknewinv").click();
                        }
                    },
                       error:function(eobj,etxt,err){
                            console.log(etxt);
            }

                });
            });
           // Button Save End
// $("#btncancel").click(function(){
//           location.reload();
//           });



        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</html>

          
          
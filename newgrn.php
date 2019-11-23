<?php
include 'common/header.php';
require ('lib/grnhandle.php');
?>
 <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a>Dashboard</a>
            </div>
        

            <ul class="list-unstyled components">
                <!--Dashboard-->
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
                     <li class="active">
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

           
        </nav>

        <!-- Page Content  -->
        <div id="content">
        	
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="newgrn.php">New grn</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            
        
  

 <!-- New Stock Start -->
<form>
  <div class="form-group row">
      <label for="cmbcat" class="col-sm-2 col-form-label">GRN No</label>
      <div class="col-sm-3">
          <input type="text" name="txtgrnno" id="txtgrnno" readonly="readonly" class="form-control" value="<?php  getNewGRNNo(); ?>" >
      </div>
    </div>
    <div class="form-group row">
      <label for="cmbsup" class="col-sm-2 col-form-label">Supplier</label>
      <div class="col-sm-3">
        <select class="form-control " id="cmbsup" name="cmbsup">
            <option value="">--Select Supllier--</option>
            <?php getSuppliers();?>
        
        </select>
      </div>

      <label for="txtrdate" class="col-sm-2 col-form-label">Recived Date</label>
      <div class="col-sm-2">
        <input type="text" class="form-control " id="txtrdate" name="txtrdate">
         
          
      </div>
    </div>

    <div class="form-group row">
      <label for="cmbcat" class="col-sm-2 col-form-label">Categories</label>
      <div class="col-sm-3">
        <select class="form-control " id="cmbcat" name="cmbcat">
          <option value="">--Select Category--</option>
          <?php getCategories();?>

        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="cmbcat" class="col-sm-2 col-form-label">Sub Categories</label>
      <div class="col-sm-3">
        <select class="form-control " id="cmbsub" name="cmbsub">
          <option value="">--Select Sub Category--</option>
        </select>
      </div>
    </div>

      <div class="form-group row">
      <label for="cmbcat" class="col-sm-2 col-form-label">Brand Names</label>
      <div class="col-sm-3">
        <select class="form-control " id="cmbbrnd" name="cmbbrnd">
          <option value="">--Select Brand Names--</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="cmbpro" class="col-sm-2 col-form-label">Products</label>
      <div class="col-sm-3">
        <select class="form-control " id="cmbpro" name="cmbpro">
          <option value="">--Select Products--</option>
  
        
        </select>
      </div>
    </div>
   
    <div class="form-group row">
      <label for="txtcprice" class="col-sm-2 col-form-label">Cost Price(Rs)</label>
      <div class="col-sm-2">
        <input type="text" class="form-control " id="txtcprice" name="txtcprice">
         
          
      </div>
    
      <label for="txtsprice" class="col-sm- col-form-label">Selling Price(Rs)</label>
      <div class="col-sm-2">
        <input type="text" class="form-control currency " id="txtsprice" name="txtsprice">
         
          
      </div>
      <label for="txtqty" class="col-sm-2 col-form-label">Quantity</label>
      <div class="col-sm-2">
        <input type="text" class=" form-control  " id="txtqty" name="txtqty">        
          
      </div>
    </div>
    <div class="form-group row">
      <button type="button" class="ml-3 col-sm-1 btn btn-success" id="btnadd" name="btnadd" >ADD </button>
      
    </div>

<div id="dvdetails">
<table class="table ">
  <thread>
    <tr>
      <th></th>
      <th>Product</th>
      <th>Cost Price(Rs)</th>
      <th>Selling Price(Rs)</th>
      <th>Qty</th>
      <th>Total</th>
    </tr>
  </thread>
    <tbody id="grndetails">
      
    </tbody>
    <tfoot>
      <tr align="right">
        <th colspan="6" >Gross Total(Rs)</th>
        <td><input type="text" name="txtgtot" id="txtgtot" class="form-control-plaintext currency" readonly="readonly" size="2" value="0.00" ></td>
      </tr>
      <tr align="right">
        <th colspan="6" >Discount (%)</th>
        <td> <input type="text" size="1" class="currency form-control-plaintext" id="txtdiscount" name="txtdiscount"> </td>
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
</div>
<script type="text/javascript">
    $(document).ready(function(){
         var cdate = new Date();
    var year = cdate.getFullYear();
    var month = cdate.getMonth();
    month = parseInt(month)+1;
    if(month<10){
      month ="0"+month;
      }       

    var date = cdate.getDate();
    if(date<10){
      date = "0"+date;
    }
    });
   
    // $("#txtrdate").val(year+"-"+month+"-"+date);
// Select Subcat Start
        $("#cmbcat").change(function(){
            var cmbcat = $("#cmbcat").val();
            $.post('lib/grnhandle.php?type=setSubSelect',{
                cmbcat:cmbcat
            },function(data){
                $("#cmbsub").html(data);
            });
        });
// Select Subcat End

// Select  brand start
          $("#cmbsub").change(function(){
            var cmbsub = $("#cmbsub").val();
            $.post('lib/grnhandle.php?type=SelectBrnd',{
                cmbsub:cmbsub
            },function(data){
                $("#cmbbrnd").html(data);
            });
        });
// Select  brand end

// Select  Product start
         $("#cmbbrnd").change(function(){
                var cmbbrnd = $("#cmbbrnd").val();
                $.post('lib/grnhandle.php?type=SelectProduct',{
                    cmbbrnd:cmbbrnd
                },function(data){
                    $("#cmbpro").html(data);
                //     alert(data);
                });
            });
// Select  Product end
   
    $("#txtrdate").datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:"yy-mm-dd",
      maxDate:"0"
    });
     $("#btnadd").click(function(){
        var prod_id = $("#cmbpro").val();
        var prod_name = $("#cmbpro option:selected").text();
        // var edate = $("#txtedate").val();
        var cprice = $("#txtcprice").val();
        var sprice = $("#txtsprice").val();
        var qty = $("#txtqty").val();
        var gtot = parseFloat($("#txtgtot").val());
        var ntot = parseFloat($("#txtntot").val());

        var row ="<tr>";
        row +="<td><a href='javascript:void(0)'><i class='fa fa-times text-danger remove' aria-hidden='true'><i/></a></td>";
         
        row +="<td><input type='text' class='form-control-plaintext ' readonly='readonly' value='"+prod_name+"' name='txtpname' /><input type='hidden' value='"+prod_id+"' name='txtproid[]'/></td>";

        // row +="<td><input type='text' class='form-control-plaintext ' readonly='readonly' value='"+edate+"' name='txtexpdate[]' /></td>";
        row +="<td><input type='text' class='form-control-plaintext ' readonly='readonly' value='"+cprice+"' name='txtcostprice[]' /></td>";
        row +="<td><input type='text' class='form-control-plaintext ' readonly='readonly' value='"+sprice+"' name='txtselprice[]' /></td>";
        row +="<td><input type='text' class='form-control-plaintext ' readonly='readonly' value='"+qty+"' name='txtproqty[]' /></td>";
        var total = parseFloat(cprice)*parseInt(qty);
        
        gtot = gtot+total;
        ntot = ntot+total;

        row +="<td><input type='text' class='form-control-plaintext total' readonly='readonly' value='"+total+"' name='txttot[]' /></td>";

        $("#txtgtot").val(gtot);
        $("#txtntot").val(ntot);
         row +="</tr>";

        $("#grndetails").append(row);
        resetctrl();

    });
    $("#grndetails").on("click",".remove",function(){ // after load page if click remove run function
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
    $("#btncancel").click(function(){
      location.reload();
    });
    $("#btnsave").click(function(){
      var fdata = $('form').serialize();
      var url = "lib/grnhandle.php?type=newGRN";

        $.ajax({
        method:"POST",
        url:url,
        data:fdata,
        dataType:"text",
        success:function(result){
         // alert(result);
        res = result.split(",");
        if(res[0]=="0"){
          swal("Error",res[1],"error")
        }
        else if(res[0]=="1"){
          swal("Success",res[1],"success");
          $("#lnknewgrn").click();
        }
      },
        error:function(eobj,etxt,err){
          console.log(etxt);
      }

      });
    });


 

    // <!-- New Stock End -->

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>


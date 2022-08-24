<?php
include("header.php");
$sqlpayment = "SELECT * FROM billing LEFT JOIN customer ON customer.customer_id=billing.customer_id LEFT JOIN product ON product.product_id=billing.product_id ";
if($_GET['billproductid'] != "")
{
$sqlpayment = $sqlpayment . " WHERE billing.product_id='$_GET[billproductid]'";
}
if($_GET['billingid'] != "")
{
$sqlpayment = $sqlpayment . "  WHERE billing.billing_id='$_GET[billingid]'";
}
$qsqlpayment = mysqli_query($con,$sqlpayment);
echo mysqli_error($con);
$rspayment= mysqli_fetch_array($qsqlpayment);
?>

   <div class="content-wraper mt-50">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1"></div>
                        <div class="col-lg-9 col-md-6 col-sm-6">
                            <div class="customer-login-register">
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">

			<div class="agileinfo_single">
		
				<div class="col-md-12 agileinfo_single_right">
					
						
				<h2>Billing Receipt</h2>
				
					<div class="snipcart-item block">
						<div class="w3agile_description">
<div id="printableArea">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >		
       <tr>
		<th colspan="3"><center>Online Auction Hub</center></th>
	   </tr>
	   <tr>
		<td colspan="3"><center>city light Mangalore</center></td>
	   </tr>
		<tr>
			<td><b>Bill No.</b> <?php echo $rspayment['billing_id']; ?> </td>
			<td><b>Date</b>  <?php echo date("d-M-Y",strtotime($rspayment['purchase_date'])); ?></td>
		</tr>
		<tr>
		    <td><b>Customer</b> <?php echo $rspayment['customer_name']; ?></td>
			<td><b>Payment type</b> <?php echo $rspayment['card_type']; ?></td>
		</tr>
		<tr>
			<td><b>Product name</b> </td>
			<td><?php echo $rspayment['product_name']; ?></td>
		</tr>
		<tr>
			<th><b>Paid amount</b></th>
			<td>Rs. <?php echo $rspayment['purchase_amount']; ?>
			</td>
		</tr>
</table>
</div>
<hr>
<center><input type="button" class="btn btn-info" name='print'  onclick="printDiv('printableArea')" value="Click here to Print"></center>
<br>
						</div>	
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
                            </div>
                        </div>
					</div>
                </div>
            </div>
<?php
include("footer.php");
?>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
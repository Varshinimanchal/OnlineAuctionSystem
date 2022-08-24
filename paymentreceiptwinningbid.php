<?php
include("header.php");
$sqlpayment = "SELECT * FROM billing LEFT JOIN customer ON customer.customer_id=billing.customer_id WHERE billing_id='$_GET[paymentid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
echo mysqli_error($con);
$rspayment= mysqli_fetch_array($qsqlpayment);
$sqlproduct = "SELECT * FROM product WHERE product_id='$rspayment[product_id]'";
$qsqlproduct = mysqli_query($con,$sqlproduct);
echo mysqli_error($con);
$rsproduct= mysqli_fetch_array($qsqlproduct);
?>
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">

			<div class="agileinfo_single">
		
				<div class="col-md-12 agileinfo_single_right">
					
						
				<center><h2>Payment Receipt</h2></center>
				
					<div class="snipcart-item block">
						<div class="w3agile_description">
<div id="printableArea">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >		
       <tr>
	   <th colspan="3"><center>Online Auction Hub</center></th>
	   </tr>
	   <tr>
	   <th colspan="3"><center>city light Mangalore</center></th>
	   </tr>
		<tr>
			<td><b>Bill No.</b> <?php echo $rspayment['billing_id']; ?> </td>
			<td><b>Date:</b>  <?php echo $rspayment['purchase_date']; ?></td>
		</tr>
		<tr>
		    <td><b>Customer</b> <?php echo $rspayment['customer_name']; ?></td>
			<td><b>Payment type</b> <?php echo $rspayment['card_type']; ?></td>
		</tr>
			<tr>
			<th><b>Paid amount</b></th>
			<td>Rs. <?php echo $rspayment['purchase_amount']; ?>
			</td>
		</tr>
			<tr>
			<th><b>Product code :</b> <?php echo $rsproduct['product_id']; ?></th>
			<td><b>Product name :</b>  <?php echo $rsproduct['product_name']; ?></td>
			</tr>
</table>
</div><br><hr>
<center><input type="button" name='print' class="btn btn-primary"  onclick="printDiv('printableArea')" value="Click here to Print"></center>
<br><hr>
						</div>	
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
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
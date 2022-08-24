<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
	
		$sql = "UPDATE payment SET customer_id='$_POST[customer_id]',payment_type='$_POST[payment_type]',product_id='$_POST[product_id]',bidding_id='$_POST[bidding_id]',paid_amount='$_POST[paid_amount]',paid_date='$_POST[paid_date]',status='$_POST[status]' where payment_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('payment record updated successfully..');</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO  payment (payment_type,paid_amount,paid_date,status,customer_id,product_id,bidding_id) VALUES('$_POST[payment_type]','$_POST[paid_amount]','$_POST[paid_date]','$_POST[status]','$_POST[customer_id]','$_POST[product_id]','$_POST[bidding_id]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('payment record inserted successfully..');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
	
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM payment WHERE payment_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit= mysqli_fetch_array($qsqledit);
}

?>
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Payment <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
											<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Customer:</label>
		<span id='idcustomer_id' style="color:red;"></span>
			<br><select name="customer_id" id="customer_id" class="form-control"  >
				<option value=''>Select</option>
		<?php
		$sqlcustomer = "SELECT * FROM customer WHERE status='Active'";
		$qsqlcustomer = mysqli_query($con,$sqlcustomer);
		while($rscustomer = mysqli_fetch_array($qsqlcustomer))
		{
			echo "<OPTION VALUE='$rscustomer[customer_id]'>$rscustomer[customer_name]</option>";
		}
		?>
				</select>
	</div>
</div>
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Product:</label>
		<span id='idproduct_id' style="color:red;"></span>
			<br><select name="product_id" id="product_id" class="form-control"  >
				<option value=''>Select</option>
		<?php
		$sqlproduct = "SELECT * FROM product WHERE status='Active'";
		$qsqlproduct = mysqli_query($con,$sqlproduct);
		while($rsproduct = mysqli_fetch_array($qsqlproduct))
		{
			echo "<OPTION VALUE='$rsproduct[product_id]'>$rsproduct[product_name]</option>";
		}
		?>
				</select>
	</div>
</div>
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Bidding:</label>
		<span id='idbidding_id' style="color:red;"></span>
			<br><select name="bidding_id" id="bidding_id" class="form-control"  >
				<option value=''>Select</option>
		<?php
		$sqlbidding = "SELECT * FROM bidding WHERE status='Active'";
		$qsqlbidding = mysqli_query($con,$sqlbidding);
		while($rsbidding = mysqli_fetch_array($qsqlbidding))
		{
			echo "<OPTION VALUE='$rsbidding[bidding_id]'>$rsbidding[bidding_amount]</option>";
		}
		?>
				</select>
	</div>
</div>
<div class="controls">
	<label class="control-label">Payment type</label>
	<span id='idpayment_type' style="color:red;"></span>
	<br>
	<select name="payment_type" id="payment_type" class="form-control">
		<option value=''>Select</option>
		<option value='Credit card'>Credit card</option>
		<option value='Debit Card'>Debit Card</option>
	</select>
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Paid amount</label>
		<span id='idpaid_amount' style="color:red;"></span>
		<input name="paid_amount" id="paid_amount" class="form-control" type="text" placeholder="Paid amount" value="<?php echo $rsedit['paid_amount']; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Paid Date</label>
		<span id='idpaid_date' style="color:red;"></span>
		<input name="paid_date" id="paid_date" class="form-control" type="date" placeholder="Paid date" value="<?php echo $rsedit['paid_date']; ?>">
	</div>
</div>

												
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Status:</label>
		<span id='idstatus' style="color:red;"></span>
			<br><select name="status" id="status" class="form-control">
				<option value=''>Select</option>
				<option value='Active'>Active</option>
				<option value='Inactive'>Inactive</option>
			</select>
	</div>
</div>
													
											</div>
<button class="submit check_out" type="submit" name="submit">Submit</button>
										</div>
									</section>
								</form>
									
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->


<?php
include("footer.php");
?>
<script>
function validateform()
{
	/* #######start 1######### */
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(document.getElementById("customer_id").value == "")
	{
		document.getElementById("idcustomer_id").innerHTML ="Kindly select Customer ID....";	
		i=1;		
	}	
	if(document.getElementById("product_id").value == "")
	{
		document.getElementById("idproduct_id").innerHTML ="Kindly select Product ID....";	
		i=1;		
	}
if(document.getElementById("bidding_id").value == "")
	{
		document.getElementById("idbidding_id").innerHTML ="Kindly select Bidding ID....";	
		i=1;		
	}
	if(document.getElementById("payment_type").value == "")
	{
		document.getElementById("idpayment_type").innerHTML ="Kindly select Payment type....";	
		i=1;		
	}

	if(!document.getElementById("paid_amount").value.match(numericExpression))
	{
		document.getElementById("idpaid_amount").innerHTML ="Paid amount should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("paid_amount").value=="")
		{
		document.getElementById("idpaid_amount").innerHTML ="Paid amount should not be empty..";	
		i=1;		
	}	
	if(document.getElementById("paid_date").value=="")
		{
		document.getElementById("idpaid_date").innerHTML ="Paid date should not be empty..";	
		i=1;		
	}
	if(!document.getElementById("status").value.match(alphaspaceExp))
		{
		document.getElementById("idstatus").innerHTML ="status must contain Alphabets..";	
		i=1;		
	}
	if(document.getElementById("status").value=="")
	{
		document.getElementById("idstatus").innerHTML ="Status should not be empty....";	
		i=1;		
	}
	/* #######start 2######### */
	if(i==0)
	{
		return true;
	}
	else
	{
	return false;
	}
	/* #######end 2######### */
}
</script>

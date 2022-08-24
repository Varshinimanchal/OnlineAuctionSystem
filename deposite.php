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
		<label class="control-label">Card holder</label>
		<span id='idcard_holder' style="color:red;"></span>
		<input name="card_holder" id="card_holder" class="form-control" placeholder="card holder" >
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Card number</label>
		<span id='idcard_number' style="color:red;"></span>
		<input name="card_number" id="card_number" class="form-control" placeholder="Card number"  >
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">CVV number</label>
		<span id='idcvv_number' style="color:red;"></span>
		<input name="cvv_number" id="cvv_number" class="form-control" placeholder="CVV number" >
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Expire date</label>
		<span id='idexpire_date' style="color:red;"></span>
		<input name="expire_date" id="expire_date" type="month" class="form-control" placeholder="expire date">
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
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(document.getElementById("payment_type").value=="")
	{
		document.getElementById("idpayment_type").innerHTML ="Kindly select the Payment type....";	
		i=1;		
	}
	if(document.getElementById("paid_amount").value == "")
	{
		document.getElementById("idpaid_amount").innerHTML ="Paid amount should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("paid_amount").value.match(numericExpression))
	{
		document.getElementById("idpaid_amount").innerHTML ="Amount must be digits...";	
		i=1;		
	}
	if(!document.getElementById("card_holder").value.match(alphaspaceExp))
	{
		document.getElementById("idcard_holder").innerHTML ="Holder name must contain alphabets....";	
		i=1;		
	}	
	if(document.getElementById("card_holder").value=="")
	{
		document.getElementById("idcard_holder").innerHTML ="Holder name cannot be blank..";	
		i=1;		
	}
	if(!document.getElementById("card_number").value.match(numericExpression))
	{
		document.getElementById("idcard_number").innerHTML ="Kindly select the Date....";	
		i=1;		
	}
	if(document.getElementById("status").value == "")
	{
		document.getElementById("idstatus").innerHTML ="Kindly select the status....";	
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
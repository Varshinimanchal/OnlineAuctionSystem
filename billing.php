<?php
include("header.php");

$sqlproduct = "SELECT * FROM product WHERE product_id='$_GET[productid]'";
$qsqlproduct = mysqli_query($con,$sqlproduct);
$rsproduct= mysqli_fetch_array($qsqlproduct);
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
	    $sql = "UPDATE billing SET customer_id='$_POST[customer_id]',product_id='$_POST[product_id]',purchase_date='$_POST[purchase_date]',purchase_amount='$_POST[purchase_amount]',payment_type='$_POST[payment_type]',card_number'$_POST[card_number]',expire_date='$_POST[expire_date]',cvv_number='$_POST[cvv_number]',card_holder='$_POST[card_holder]',delivery_date='$_POST[delivery_date]',note='$_POST[note]',status='$_POST[status]' where billing_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('billing record updated successfully..');</script>";
		}
	}
	  else
	{

		$sql = "INSERT INTO  billing (purchase_date,purchase_amount,payment_type,card_type,card_number,expire_date,cvv_number,card_holder,delivery_date,note,status,customer_id,product_id) VALUES('$dt','100','Sell','$_POST[payment_type]','$_POST[card_number]','$_POST[expire_date]-01','$_POST[cvv_number]','$_POST[card_holder]','$_POST[delivery_date]','$_POST[note]','Active','$_SESSION[customer_id]','$_GET[productid]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('billing record inserted successfully..');</script>";
			$insid = mysqli_insert_id($con);
			
			$sql = "UPDATE product SET status='Active' WHERE product_id='$_GET[productid]'";
			mysqli_query($con,$sql);
			
			echo "<script>window.location='billingreceipt.php?billingid=$insid';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM billing WHERE billing_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit= mysqli_fetch_array($qsqledit);
}

?>          <div class="content-wraper mt-50">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3"></div>
                        <div class="col-lg-9 col-md-6 col-sm-6">
                            <div class="customer-login-register">
							
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
<!-- about -->

		<div class="privacy about">
			<h3>Billing <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
	<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >				
		<tr>
		    <th>Product name</th>
		    <td>
			<?php
				echo $rsproduct['product_name'];
			?>
			</td>
		</tr>
		<tr>
		    <th>Charges</th>
		    <td>
			Rs. 100
			</td>
			</tr>
	</table>		

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
	<label class="control-label">Payment type</label>
	<span id='idpayment_type' style="color:red;"></span>
	<br>
	<select name="payment_type" id="payment_type" class="form-control">
		<option value=''>Select</option>
		<option value="Credit card">Credit card</option>
		<option value="Debit Card">Debit Card</option>
		<option value="VISA">VISA</option>
		<option value="Master Card">Master Card</option>
		
	</select>
</div>



<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Card holder</label>
		<span id='idcard_holder' style="color:red;"></span>
		<input name="card_holder" id="card_holder" class="form-control" placeholder="card holder"  value="<?php echo $rsedit['card_holder']; ?>">
		
	</div>
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Card number</label>
		<span id='idcard_number' style="color:red;"></span>
		<input name="card_number" id="card_number" class="form-control" placeholder="Card number"  value="<?php echo $rsedit['card_number']; ?>">
		
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Expiry date</label>
		<span id='idexpire_date' style="color:red;"></span>
		<input name="expire_date" id="expire_date" type="month" class="form-control" placeholder="expire date"  value="<?php echo $rsedit['expire_date']; ?>" min="<?php echo date("Y-m"); ?>">
		
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">CVV number</label>
		<span id='idcvv_number' style="color:red;"></span>
		<input name="cvv_number" id="cvv_number" class="form-control" placeholder="CVV number">
		
	</div>
</div>
			
													
											</div>
<hr>
<center>
<button class="btn btn-info" type="submit" name="submit">Click here to Make payment</button>
</center>
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





                            </div>
                        </div>
					</div>
                </div>
            </div>

<?php
include("footer.php");
?>
<script>
function validateform()
{
	/* #######start 1######### */
	var alphaExp = /^[a-zA-Z\s]+$/;	//Variable to validate only alphabets
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(document.getElementById("payment_type").value == "")
	{
		document.getElementById("idpayment_type").innerHTML ="Kindly select Payment type....";	
		i=1;		
	}	
	if(!document.getElementById("card_holder").value.match(alphaExp))
	{
		document.getElementById("idcard_holder").innerHTML ="Card holder name should contain only alphabets....";	
		i=1;		
	}
if(document.getElementById("card_holder").value == "")
	{
		document.getElementById("idcard_holder").innerHTML ="Card holder name should not be empty....";	
		i=1;		
	}
	if(document.getElementById("card_number").value.length != 16)
	{
		document.getElementById("idcard_number").innerHTML ="Card number should contain 16 digits..";	
		i=1;		
	}
	if(!document.getElementById("card_number").value.match(numericExpression))
	{
		document.getElementById("idcard_number").innerHTML ="Card number should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("card_number").value == "")
	{
		document.getElementById("idcard_number").innerHTML ="Card number should not be empty....";	
		i=1;		
	}	
	if(document.getElementById("expire_date").value=="")
	{
		document.getElementById("idexpire_date").innerHTML ="Expire date should not be empty..";	
		i=1;		
	}
	if(document.getElementById("cvv_number").value.length != 3)
	{
		document.getElementById("idcvv_number").innerHTML ="Cvv number should contain 3 digits....";	
		i=1;		
	}
	if(!document.getElementById("cvv_number").value.match(numericExpression))
	{
		document.getElementById("idcvv_number").innerHTML="Cvv number should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("cvv_number").value == "")
	{
		document.getElementById("idcvv_number").innerHTML ="Cvv number should not be empty....";	
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

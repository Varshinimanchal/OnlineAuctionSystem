<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE payment SET customer_id='$_POST[customer_id]',payment_type='$_POST[payment_type]',product_id='$_POST[product_id]',bidding_id='$_POST[bidding_id]',paid_amount='$_POST[paid_amount]',paid_date='$_POST[paid_date]',status='$_POST[status]' WHERE  payment_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('payment record updated successfully..');</script>";
		}
		//Update statement ends here		
	}
	else
	{
		$sql = "INSERT INTO payment(customer_id,payment_type,product_id,bidding_id,paid_amount,paid_date,status)
		VALUES('$_POST[customer_id]','$_POST[payment_type]','$_POST[product_id]','$_POST[bidding_id]','$_POST[paid_amount]','$_POST[paid_date]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('payment record inserted successfully..');</script>";
			echo "<script>window.location='payment.php';</script>";
		}
	}
}
?>
<?php
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM payment WHERE payment_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Payment</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-10">
                <div class="container-fluid">
					<!-- checkout-area start -->
                    <div class="checkout-area">
                        <div class="row">
                            <div class="col-lg-12">
<div class="row">
	<div class="col-lg-12 offset-xl-2 col-xl-8 col-sm-12">
		<form action="" method="post">
			<div class="checkbox-form checkout-review-order">
				<h3 class="shoping-checkboxt-title">Payment</h3>
				<div class="row">

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Customer ID</label>
		<select name="customer_id" id="customer_id" class="form-control" >
			<option value=''>Select customer</option>
		</select>
	</p>
</div>

<div class="col-lg-12">
	<p class="single-form-row">
		<label>payment type</label>
		<input type="text" name="payment_type" id="payment_type" class="form-control"  value="<?php echo $rsedit['payment_type']; ?>" >
	</p>
</div>
		
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Product ID</label>
		<select name="product_id" id="product_id" class="form-control" >
			<option value=''>Select Product</option>
		</select>
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Bidding id</label>
		<select name="bidding_id" id="bidding_id" class="form-control" >
			<option value=''>Select Product</option>
		</select>
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Amount paid</label>
		<input type="text" name="paid_amount" id="paid_amount" class="form-control"  value="<?php echo $rsedit['paid_amount']; ?>" >
	</p>
</div>
<div class="col-lg-12">
	<p class="single-form-row">
		<label>paid date</label>
		<input type="date" name="paid_date" id="paid_date" class="form-control"  value="<?php echo $rsedit['paid_date']; ?>" >
	</p>
</div>
	
	
	
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Status</label>
		<select name="status" id="status" class="form-control">
			<option value=''>Select Status</option>
			<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				if($val == $rsedit['status'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val'>$val</option>";
				}
			}
			?>
		</select>
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<center><input type="submit" name="submit" id="submit" class="form-control" style="width: 200px;"></center>
	</p>
</div>	
				</div>
			</div>
		</form>
	</div>
</div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-area end -->
                </div>
            </div>
            <!-- content-wraper end -->
            
            <!-- footer-area start -->
            <?php
			include("footer.php");
			?>
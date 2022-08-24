<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE message SET category_name='$_POST[category_name]',category_icon='$_POST[category_icon]',description='$_POST[description]',status='$_POST[status]' where category_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('category record updated successfully..');</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO  message (message_date_time,message,status) VALUES('$_POST[message_date_time]','$_POST[message]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('message record inserted successfully..');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
	
}
}
if(isset($_GET['editid']))
	{
	$sqledit = "SELECT * FROM message WHERE message_id='$_GET[editid]'";
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
			<h3>Message <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
											
											<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Product:</label>
			<br><select name="product_id" class="form-control"  >
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

<div class="controls">
<label class="control-label">Message date and time</label>
<input class="billing-address-name form-control" type="date" name="message_date_time" placeholder="message date and time" value="<?php echo $rsedit['message_date_time']; ?>">
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Message</label>
		<input name="message" class="form-control" type="file" placeholder="Message" value="<?php echo $rsedit['message']; ?>">
	</div>
</div>

												
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Status:</label>
			<br><select name="status" style="width:90%;" >
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
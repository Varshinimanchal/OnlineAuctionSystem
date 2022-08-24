<?php
include("header.php");
if(isset($_POST['submit']))
{
	
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE message SET sender_id='$_POST[sender_id]',receiver_id='$_POST[receiver_id]',message_date_time='$_POST[message_date_time]',product_id='$_POST[product_id]',message='$_POST[message]',status='$_POST[status]' WHERE  message_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('message record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{
	$sql = "INSERT INTO message(sender_id,receiver_id,message_date_time,product_id,message,status)
	VALUES('$_POST[sender_id]','$_POST[receiver_id]','$_POST[message_date_time]','$_POST[product_id]','$_POST[message]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('message record inserted successfully..');</script>";
		echo "<script>window.location='message.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
	}
}
?>
<?php
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM message WHERE message_id='$_GET[editid]'";
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
                                <li class="breadcrumb-item active">Message</li>
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
				<h3 class="shoping-checkboxt-title">Message</h3>
				<div class="row">
				
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Sender ID</label>
		<select name="sender_id" id="sender_id" class="form-control" >
		<option value=''>Select sender</option>			
		</select>
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Receiver ID</label>
		<select name="receiver_id" id="receiver_id" class="form-control" >
		<option value=''>Select customer</option>
		</select>
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>message_date_time</label>
		<input type="datetime-local" name="message_date_time" id="message_date_time" class="form-control" >
	</p>
</div>

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Product ID</label>
		<select name="product_id" id="product_id" class="form-control" >	
		</select>
	</p>
</div>	




<div class="col-lg-12">
	<p class="single-form-row">
		<label>message</label>
		<input type="text" name="message" id="message" class="form-control" value="<?php echo $rsedit['employee_type']; ?>" >
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
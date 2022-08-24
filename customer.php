<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE customer SET customer_name='$_POST[customer_name]',email_id='$_POST[email_id]',password='$_POST[password]',address='$_POST[address]',state='$_POST[state]',city='$_POST[city]',landmark='$_POST[landmark]',mobile_no='$_POST[mobile_no]',note='$_POST[note]',status='$_POST[status]' WHERE  customer_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Customer record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{
	$sql = "INSERT INTO customer(customer_name,email_id,password,address,state,city,landmark,pincode,mobile_no,note,status) VALUES('$_POST[customer_name]','$_POST[email_id]','$_POST[password]','$_POST[address]','$_POST[state]','$_POST[city]','$_POST[landmark]','$_POST[pincode]','$_POST[mobile_no]','$_POST[note]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('customer record inserted successfully..');</script>";
		echo "<script>window.location='customer.php';</script>";
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
	$sqledit ="SELECT * FROM customer WHERE customer_id='$_GET[editid]'";
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
                                <li class="breadcrumb-item active">Customer</li>
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
		<form action="" method="post" onsubmit="return validatecustomer()">
			<div class="checkbox-form checkout-review-order">
				<h3 class="shoping-checkboxt-title">Customer</h3>
				<div class="row">
				
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Customer Name</label> <span class="errormsg"  id="errcustomer_name"></span>
		<input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo $rsedit['customer_name']; ?>" >
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Email-ID</label> <span class="errormsg"  id="erremail_id"></span>
		<input type="text" name="email_id" id="email_id" class="form-control" value="<?php echo $rsedit['email_id']; ?>" >
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Password</label> <span class="errormsg"  id="errpassword"></span>
		<input type="password" name="password" id="password" class="form-control" value="<?php echo $rsedit['password']; ?>" >
	</p>
</div>	
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Confirm Password</label> <span class="errormsg"  id="errcpassword"></span>
		<input type="password" name="cpassword" id="cpassword" class="form-control" value="<?php echo $rsedit['password']; ?>" >
	</p>
</div>	
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Address</label> <span class="errormsg"  id="erraddress"></span>
		<textarea name="address" id="address" class="form-control"><?php echo $rsedit['address']; ?></textarea>
	</p>
</div>


<div class="col-lg-12">
	<p class="single-form-row">
		<label>State</label> <span class="errormsg"  id="errstate"></span>
		<input type="text" name="state" id="state" class="form-control" value="<?php echo $rsedit['state']; ?>" >
	</p>
</div>

<div class="col-lg-12">
	<p class="single-form-row">
		<label>City</label> <span class="errormsg"  id="errcity"></span>
		<input type="text" name="city" id="city" class="form-control" value="<?php echo $rsedit['city']; ?>" >
	</p>
</div>



<div class="col-lg-12">
	<p class="single-form-row">
		<label>Landmark</label> <span class="errormsg"  id="errlandmark"></span>
		<input type="text" name="landmark" id="landmark" class="form-control" value="<?php echo $rsedit['landmark']; ?>" >
	</p>
</div>




<div class="col-lg-12">
	<p class="single-form-row">
		<label>Pincode</label> <span class="errormsg"  id="errpincode"></span>
		<input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo $rsedit['pincode']; ?>" >
	</p>
</div>





<div class="col-lg-12">
	<p class="single-form-row">
		<label>Mobile No</label> <span class="errormsg"  id="errmobile_no"></span>
		<input type="text" name="mobile_no" id="mobile_no" class="form-control" value="+91<?php echo $rsedit['mobile_no']; ?>" >
	</p>
</div>

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Note</label> <span class="errormsg"  id="errnote"></span>
		<textarea name="note" id="note" class="form-control"><?php echo $rsedit['note']; ?></textarea>
	</p>
</div>

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Status</label> <span class="errormsg"  id="errstatus"></span>
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
<script>
function validatecustomer()
{
	var numericExp = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaSpaceExp = /^[a-zA-Z\s]+$/;
	var alphaNumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	$('.errormsg').html('');
	var errchk = "False";

	if(document.getElementById("customer_name").value.length > 15)
	{
		document.getElementById("errcustomer_name").innerHTML="Customer name not contain less than 15 characters...";
		errchk = "True";
	}
	if(!document.getElementById("customer_name").value.match(alphaSpaceExp))
	{
		document.getElementById("errcustomer_name").innerHTML = "Kindly enter valid Customer name..";
		errchk = "True";
	}
	if(document.getElementById("customer_name").value == "")
	{
		document.getElementById("errcustomer_name").innerHTML="Customer name should not be empty...";
		errchk = "True";
	}
	if(!document.getElementById("email_id").value.match(emailExp))
	{
		document.getElementById("erremail_id").innerHTML = "Entered Email ID is not valid....";
		errchk = "True";
	}
	if(document.getElementById("email_id").value == "")
	{
		document.getElementById("erremail_id").innerHTML="Kindly enter Email ID.";
		errchk = "True";
	}	
		
	if(document.getElementById("password").value.length < 8)
	{
		document.getElementById("errpassword").innerHTML ="Password should contain more than 8 characters...";	
		errchk = "True";		
	}	
	if(document.getElementById("password").value.length > 16)
	{
		document.getElementById("errpassword").innerHTML ="Password should contain less than 16 characters...";	
		errchk = "True";		
	}		
	if(!document.getElementById("password").value.match(alphaNumericExp))
	{
		document.getElementById("errpassword").innerHTML ="New password should contain only alphabets and numbers....";		
		errchk = "True";
	}
	if(document.getElementById("password").value == "")
	{
		document.getElementById("errpassword").innerHTML ="New password should not be empty....";	
		errchk = "True";	
	}
	if(document.getElementById("cpassword").value != document.getElementById("password").value )
	{
		document.getElementById("errcpassword").innerHTML ="Confirm password Must match with new password..";	
		errchk = "True";		
	}
	if(document.getElementById("cpassword").value == "")
	{
		document.getElementById("errcpassword").innerHTML ="Confirm Password should not be empty....";	
		i=1;		
	}
	if(document.getElementById("address").value == "")
	{
		document.getElementById("erraddress").innerHTML="Address Should not be empty..";
		errchk = "True";
	}
	if(!document.getElementById("state").value.match(alphaSpaceExp))
	{
		document.getElementById("errstate").innerHTML = "State should contain alphabets....";
		errchk = "True";
	}
	if(document.getElementById("state").value == "")
	{
		document.getElementById("errstate").innerHTML="State Should not be empty..";
		errchk = "True";
	}
	if(!document.getElementById("city").value.match(alphaSpaceExp))
	{
		document.getElementById("errcity").innerHTML = "City should contain alphabets....";
		errchk = "True";
	}
	if(document.getElementById("city").value == "")
	{
		document.getElementById("errcity").innerHTML="City should not be empty..";
		errchk = "True";
	}
	


	if(!document.getElementById("landmark").value.match(alphaSpaceExp))
	{
		document.getElementById("errlandmark").innerHTML = "Landmark should contain alphabets....";
		errchk = "True";
	}
	if(document.getElementById("landmark").value == "")
	{
		document.getElementById("errlandmark").innerHTML="Landmark should not be empty.";
		errchk = "True";
	}
	if(document.getElementById("pincode").value.length != 6)
	{
		document.getElementById("errpincode").innerHTML="PIN Code should contain 6 digits..";
		errchk = "True";
	}
	if(!document.getElementById("pincode").value.match(numericExp))
	{
		document.getElementById("errpincode").innerHTML = "PIN code should contain digits....";
		errchk = "True";
	}
	if(document.getElementById("pincode").value == "")
	{
		document.getElementById("errpincode").innerHTML="PIN Code should not be empty..";
		errchk = "True";
	}
	if(document.getElementById("mobile_no").value.length != 13)
	{
		document.getElementById("errmobile_no").innerHTML="Mobile Number should contain 10 digits..";
		errchk = "True";
	}
	if(document.getElementById("mobile_no").value == "")
	{
		document.getElementById("errmobile_no").innerHTML="Mobile number should not be empty..";
		errchk = "True";
	}		//  
	if(document.getElementById("status").value == "")
	{
		document.getElementById("errstatus").innerHTML="Kindly select the statuss..";
		errchk = "True";
	}	
	if(errchk == "True")
	{
		return false;
	}
	else
	{
		return true;
	}
}
$("input").keydown(function(e) {
    var oldvalue=$(this).val();
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('+91') !== 0) {
            $(field).val(oldvalue);
        } 
    }, 1);
});
</script>
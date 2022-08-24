<?php
include("header.php");
if(isset($_POST['submit']))
{   
	$sql ="INSERT INTO customer(customer_name,email_id,password,mobile_no,status) values('" . $_POST['customer_name'] . "','" . $_POST['email_id'] . "','" . $_POST['password'] ."','" . $_POST['mobile_no'] . "','Active')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Customer Registration done successfully..');</script>";
		echo "<script>window.location='customerlogin.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to Register..');</script>";
		echo mysqli_error($con);
	}
}
?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Register </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-50">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="customer-login-register">
                                <center><h3>Register</h3></center>
                                <div class="login-Register-info">
<form action="" method="post"  onsubmit="return validatecustomer()"> 
	<p class="coupon-input form-row-first">
		<label>Name<span class="required">*</span> <span class="errormsg"  id="errcustomer_name"></span></label>
		<input type="text" name="customer_name" id="customer_name">
	</p>
	<p class="coupon-input form-row-first">
		<label>Email <span class="required">*</span> <span class="errormsg"  id="erremail_id"></span></label>
		<input type="text" name="email_id" id="email_id">
	</p>
	<p class="coupon-input form-row-first">
		<label>Mobile No. <span class="required">*</span>  <span class="errormsg"  id="errmobile_no"></span></label>
		<input type="text" name="mobile_no" id="mobile_no"  >
	</p>
	<p class="coupon-input form-row-last">
		<label>Password <span class="required">*</span> <span class="errormsg"  id="errpassword"></span></label>
		<input type="password" name="password" id="password" >
	</p>
	<p class="coupon-input form-row-last">
		<label>Confirm password <span class="required">*</span> <span class="errormsg"  id="errcpassword"></span></label>
		<input type="password" name="cpassword" id="cpassword">
	</p>
   <div class="clear"></div>
	<p>
		<button value="Login" name="submit" id="submit" class="button-login" type="submit">Register</button>
		
	</p>
</form>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-3 col-sm-3"></div>
					</div>
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
	var regexpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
	$('.errormsg').html('');
	var errchk = "False";

	if(document.getElementById("customer_name").value.length > 25)
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
	/*
	if(!document.getElementById("password").value.match(regexpass))
	{
		document.getElementById("errpassword").innerHTML ="New password should contain at least one digit, one lower case, one upper case and 8 characters....";
		errchk = "True";
	}
	*/
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
	/*
	if(document.getElementById("mobile_no").value.length != 13)
	{
		document.getElementById("errmobile_no").innerHTML="Mobile Number should contain 10 digits..";
		errchk = "True";
	}
	*/
	if(document.getElementById("mobile_no").value == "")
	{
		document.getElementById("errmobile_no").innerHTML="Mobile number should not be empty..";
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
/*
$("#mobile_no").keydown(function(e) {
    var oldvalue=$(this).val();
		var field=this;
		setTimeout(function () {
			if(field.value.indexOf('+91') !== 0) {
				$(field).val(oldvalue);
			} 
		}, 1);
});
*/
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
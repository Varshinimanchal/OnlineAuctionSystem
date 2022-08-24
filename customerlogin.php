<?php
include("header.php");
if(isset($_POST['btncustlogin']))
{
	$sql ="SELECT * FROM customer WHERE (email_id='$_POST[email]' || mobile_no='$_POST[email]') AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rs = mysqli_fetch_array($qsql);
		$_SESSION['customer_id'] = $rs['customer_id'];
		echo "<script>window.location='customeraccount.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to Login');</script>";
	}
}
?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Login </li>
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
                                <center><h3>Login</h3></center>
                                <div class="login-Register-info">
                                    <form action="" method="post" action=""   onsubmit="return validatecustomer()"> 
                                        <p class="coupon-input form-row-first">
                                            <label>Mobile No. or Email <span class="required">*</span>  <span class="errormsg"  id="erremail"></span></label>
                                            <input type="text" name="email" id="email">
                                        </p>
                                        <p class="coupon-input form-row-last">
                                            <label>password <span class="required">*</span>  <span class="errormsg"  id="errpassword"></span></label>
                                            <input type="password" name="password" id="password">
                                        </p>
                                       <div class="clear"></div>
                                        <p>
                                            <button value="Login" name="btncustlogin" class="button-login" type="submit">Login</button>
											<?php
											/*
                                            <a href="#" class="lost-password">Lost your password?</a>
											*/
											?>
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
	$('.errormsg').html('');
	var errchk = "False";
	/*
	if(!document.getElementById("email").value.match(emailExp))
	{
		document.getElementById("erremail").innerHTML = "Entered Email ID is not valid....";
		errchk = "True";
	}
	if(document.getElementById("email").value == "")
	{
		document.getElementById("erremail").innerHTML="Kindly enter Email ID. or Mobile number to Login";
		errchk = "True";
	}	 
	*/
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
	if(!document.getElementById("password").value.match(alphaNumericExp))
	{
		document.getElementById("errpassword").innerHTML ="password should contain only alphabets and numbers....";		
		errchk = "True";
	}
	*/
	if(document.getElementById("password").value == "")
	{
		document.getElementById("errpassword").innerHTML =" password should not be empty....";	
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
</script>
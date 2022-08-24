<?php
include("header.php");
if(isset($_SESSION["customer_id"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['btnlogin']))
{
	include("phpmailer.php");
	$sqlcustomer = "SELECT * FROM customer WHERE email_id='$_POST[emailid]'";
	$qsqlcustomer = mysqli_query($con,$sqlcustomer);
	$rsmailcustomer = mysqli_fetch_array($qsqlcustomer);
	$mailmsg = "Dear " . $rsmailcustomer['customer_name'] . ",<br> Your login credentials are here:
	<br>
	<b>Login ID </b> : $rsmailcustomer[email_id] <br>
	<b>Password </b> : $rsmailcustomer[password] <br><hr>
	Login URL: http://localhost/onlineauction/login.php
	";
	sendmail($rsmailcustomer['customer_name'],$rsmailcustomer['email_id'], "Mail from Online Auction Hub..", $mailmsg);
	echo "<script>alert('Password recovery mail sent successfully...');</script>";
	echo "<script>window.location='login.php';</script>";
}
?>
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login">
			<h3>Recover Password</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div><i class="fa"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Enter Email ID to Recover Password</h2>
					<form action="" method="post" onsubmit="return validateform()">
					  <input type="text" name="emailid" id="emailid" placeholder="Email ID" >
					  <span id='idemailid' style="color:red;"></span>
					  <input type="submit" name="btnlogin" value="Recover Password">
					</form>
				  </div>
				  <div class="form">
				  </div>
				  <div class="cta">
				  <br>
<a href="login.php">
<input type="submit" value="Click Here to Login">
</a>
<hr>					
<a href="register.php">
<input type="submit" value="Click Here to Register">
</a>
				  </div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
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
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
		      
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(!document.getElementById("emailid").value.match(emailpattern))
	{
		document.getElementById("idemailid").innerHTML ="Entered email id is not valid....";	
		i=1;		
	}
	if(document.getElementById("emailid").value == "")
	{
		document.getElementById("idemailid").innerHTML ="Email ID should not be empty....";	
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

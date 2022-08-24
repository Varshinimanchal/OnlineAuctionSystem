<?php
include("header.php");
if(isset($_SESSION["customer_id"]))
{
	echo "<script>window.location='index.php';</script>";
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
			<h3>Sign In</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div><i class="fa"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form action="" method="post" onsubmit="return validateform()">
					<span id='idemailid' style="color:red;"></span>
					  <input type="text" name="emailid" id="emailid" placeholder="Email ID" >
					  
					  <span id='idpassword' style="color:red;"></span>
					  <input type="password" name="password" id="password" placeholder="Password">
					  
					  <input type="submit" name="btnlogin" value="Login">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					<form action="#" method="post">
					  <input type="text" name="Username" placeholder="Username" required=" ">
					  <input type="password" name="Password" placeholder="Password" required=" ">
					  <input type="email" name="Email" placeholder="Email Address" required=" ">
					  <input type="text" name="Phone" placeholder="Phone Number" required=" ">
					  <input type="submit" value="Register">
					</form>
				  </div>
				  <div class="cta"><a href="forgotpassword.php">Forgot your password?</a><hr>
					New User?<br>
				  <a href="register.php">
				   <input type="submit" value="Click Here to Register">
				  </a></div>
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
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
		      
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
	if(document.getElementById("password").value.length<3)
	{
		document.getElementById("idpassword").innerHTML ="Password should contain more than 3 character..";	
		i=1;		
	}
	if(document.getElementById("password").value == "")
	{
		document.getElementById("idpassword").innerHTML ="Password should not be empty....";	
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
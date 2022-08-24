<?php
include("header.php");
if(isset($_SESSION['employeeid']))
{
	echo "<script>window.location='index.php';</script>";
}

if(isset($_POST["btnloginemp"]))
{
	$sql= "SELECT * FROM employee WHERE login_id='$_POST[Username]' AND password='$_POST[Password]' AND status='Active'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) >= 1 )
	{
		$rs = mysqli_fetch_array($qresult);
		$_SESSION['employeeid'] = $rs['employee_id'];
		$_SESSION['employee_type'] = $rs['emp_type'];
		echo "<script>window.location='dashboard.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to login...');</script>";
	}
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
			<h3>Employee Login Panel</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="form">
					
				  </div>
				  <div class="form">
					<h2>Enter Login credentials..</h2>
					<form action="" method="post">
					  <input type="text" name="Username" placeholder="Username" >
					  <input type="password" name="Password" placeholder="Password" >
					  <input type="submit" value="Login" name="btnloginemp">
					</form>
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
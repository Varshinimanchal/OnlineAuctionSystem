<?php
include("header.php");
if(isset($_POST['btnadminlogin']))
{  
	$sql ="SELECT * FROM employee WHERE login_id='$_POST[email]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rs = mysqli_fetch_array($qsql);
		$_SESSION['employee_id'] = $rs['employee_id'];
		$_SESSION['employee_type'] = $rs['employee_type'];
		echo "<script>window.location='employeeaccount.php';</script>";
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
                                <li class="breadcrumb-item"><a href="index.pphp">Home</a></li>
                                <li class="breadcrumb-item active">Employee Login </li>
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
                                <center><h3>Employee Login</h3></center>
                                <div class="login-Register-info">
<form action="" method="post"> 
	<p class="coupon-input form-row-first">
		<label>Login ID <span class="required">*</span></label>
		<input type="text" name="email" id="email">
	</p>
	<p class="coupon-input form-row-last">
		<label>password <span class="required">*</span></label>
		<input type="password" name="password" id="password">
	</p>
   <div class="clear"></div>
	<p>
		<button value="Login" name="btnadminlogin" id="login" class="button-login" type="submit">Login</button>
	 
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
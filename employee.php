<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE employee SET employee_name='$_POST[employee_name]',login_id='$_POST[login_id]',password='$_POST[password]',employee_type='$_POST[employee_type]',status='$_POST[status]' WHERE  employee_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Employee record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{
		//Insert statement starts here
		$sql = "INSERT INTO employee(employee_name,login_id,password,employee_type,status) VALUES('$_POST[employee_name]','$_POST[login_id]','$_POST[password]','$_POST[employee_type]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Employee record inserted successfully..');</script>";
			echo "<script>window.location='employee.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Insert statement ends here
	}
}
?>
<?php
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM employee WHERE employee_id='$_GET[editid]'";
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
                                <li class="breadcrumb-item active">Employee</li>
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
		<form action="" method="post" onsubmit="return validateform()">
			<div class="checkbox-form checkout-review-order">
				<h3 class="shoping-checkboxt-title">Employee</h3>
				<div class="row">
				
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Employee Name</label> <span id='idemployee_name' style="color:red;"></span>
		<input type="text" name="employee_name" id="employee_name" class="form-control" value="<?php echo $rsedit['employee_name']; ?>" >
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Login ID</label> <span id='idlogin_id' style="color:red;"></span>
		<input type="text" name="login_id" id="login_id" class="form-control" value="<?php echo $rsedit['login_id']; ?>" >
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Password</label> <span id='idpassword' style="color:red;"></span>
		<input type="password" name="password" id="password" class="form-control" value="<?php echo $rsedit['password']; ?>" >
	</p>
</div>

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Confirm Password</label> <span id='idcpassword' style="color:red;"></span>
		<input type="password" name="cpassword" id="cpassword" class="form-control" value="<?php echo $rsedit['password']; ?>" >
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Employee type</label> <span id='idemployee_type' style="color:red;"></span>
		<select name="employee_type" id="employee_type" class="form-control">
			<option value=''>Select Employee type</option>
			<?php
			$arr = array("Admin","Employee");
			foreach($arr as $val)
			{
				if($val == $rsedit['employee_type'])
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
		<label>Status</label> <span id='idstatus' style="color:red;"></span>
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
function validateform()
{
	/* #######start 1######### */
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id		      
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	if(document.getElementById("employee_name").value.length < 3)
	{
		document.getElementById("idemployee_name").innerHTML ="Employee name should not contain less than 3 characters...";	
		i=1;		
	}
	if(document.getElementById("employee_name").value.length > 20)
	{
		document.getElementById("idemployee_name").innerHTML ="Employee name should not contain more than 20 characters...";	
		i=1;		
	}
	if(!document.getElementById("employee_name").value.match(alphaspaceExp))
	{
		document.getElementById("idemployee_name").innerHTML ="Employee name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("employee_name").value == "")
	{
		document.getElementById("idemployee_name").innerHTML ="Employee name should not be empty....";	
		i=1;		
	}
	if(document.getElementById("login_id").value.length < 5)
	{
		document.getElementById("idlogin_id").innerHTML ="Login ID  should not contain less than 5 characters....";	
		i=1;		
	}
	if(document.getElementById("login_id").value.length > 20)
	{
		document.getElementById("idlogin_id").innerHTML ="Login ID should not contain more than 20 characters....";	
		i=1;		
	}
	if(!document.getElementById("login_id").value.match(alphaExp))
	{
		document.getElementById("idlogin_id").innerHTML ="Entered login ID is not valid...";	
		i=1;		
	}
	if(document.getElementById("login_id").value == "")
	{
		document.getElementById("idlogin_id").innerHTML ="Login ID should not be empty....";
		i=1;		
	}	   
	if(document.getElementById("password").value.length < 8)
	{
		document.getElementById("idpassword").innerHTML ="Password should contain more than 8 characters...";	
		i=1;		
	}	
	if(document.getElementById("password").value.length > 16)
	{
		document.getElementById("idpassword").innerHTML ="Password should contain less than 16 characters...";	
		i=1;		
	}
	if(document.getElementById("password").value == "")
	{
		document.getElementById("idpassword").innerHTML ="Password should not be empty....";
		i=1;
	}
	if(document.getElementById("password").value != document.getElementById("cpassword").value)
	{
		document.getElementById("idcpassword").innerHTML ="Password and Confirm password not matching....";	
		i=1;		
	}
	if(document.getElementById("cpassword").value == "")
	{
		document.getElementById("idcpassword").innerHTML ="Confirm Password should not be empty....";	
		i=1;		
	} 
	if(document.getElementById("employee_type").value == "")
	{
		document.getElementById("idemployee_type").innerHTML ="Kindly Select Employee Type..";	
		i=1;		
	}
	if(document.getElementById("status").value == "")
	{
		document.getElementById("idstatus").innerHTML ="Kindly select the status....";	
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
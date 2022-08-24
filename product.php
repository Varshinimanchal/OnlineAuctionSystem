<?php
include("header.php");
if(!isset($_SESSION["customer_id"]) && !isset($_SESSION["employee_id"]) )
{
	echo "<SCRIPT>window.location='login.php';</SCRIPT>";
}
if(isset($_POST['submit']))
{
	$productdescription = mysqli_real_escape_string($con,$_POST['product_description']);
	$imgname = rand() . $_FILES["product_image"]["name"];
	move_uploaded_file($_FILES["product_image"]["tmp_name"],"imgproduct/".$imgname);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE product SET product_name='$_POST[product_name]',product_description='$productdescription',starting_bid='$_POST[starting_bid]',ending_bid='$_POST[ending_bid]',product_cost='$_POST[product_cost]',";
		if($_FILES["product_image"]["name"] != "")
		{
		$sql = $sql . "product_image='$imgname',";
		}
		$sql = $sql . "product_warranty='$_POST[product_warranty]',product_delivery='$_POST[product_delivery]',company_name='$_POST[company_name]',status='$_POST[status]' where product_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('product record updated successfully..');</script>";
		}
	} 
	else
	{ 
		$sql = "INSERT INTO  product (customer_id,category_id,product_name,product_description,starting_bid,ending_bid,start_date_time,end_date_time,product_cost,product_image,product_warranty,product_delivery,company_name,status) VALUES('$_SESSION[customer_id]','$_POST[category_id]','$_POST[product_name]','$productdescription','$_POST[starting_bid]','$_POST[starting_bid]','$_POST[start_date] $_POST[start_time]','$_POST[end_date] $_POST[end_time]','$_POST[product_cost]','$imgname','$_POST[product_warranty]','$_POST[product_delivery]','$_POST[company_name]','Pending')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('product record inserted successfully..');</script>";
			$insid = mysqli_insert_id($con);
			echo "<script>window.location='billing.php?productid=$insid';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}

if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM product WHERE product_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit= mysqli_fetch_array($qsqledit);
}
?>           <div class="content-wraper mt-50">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3"></div>
                        <div class="col-lg-9 col-md-6 col-sm-6">
                            <div class="customer-login-register">
							
							
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">

			<div class="checkout-left">	

				<div class="col-md-8 ">
<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">
<input type='hidden' name='category_id'	value='<?php echo $_GET['categoryid']; ?>'>

									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">

<label class="control-label"><h3>Upload <span>Product</span></h3></label>

		<?php
		$sqlcategory = "select * from category WHERE status='Active' AND category_id='$_GET[categoryid]'";
		$qsqlcategory = mysqli_query($con,$sqlcategory);
		while($rscategory = mysqli_fetch_array($qsqlcategory))
		{
		?>
		
<div class="controls">
<label class="control-label">Category</label>
<span id='idcategory_name' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="category_name" id="category_name" value="<?php echo $rscategory['category_name']; ?>" readonly style="background-color:grey; color:white;">
</div>
		<?php
		}
		?>
		
<div class="controls">
<label class="control-label">Product Name</label>
<span id='idproduct_name' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="product_name" id="product_name" placeholder="Product name" value="<?php echo $rsedit['product_name']; ?>">

</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Product description</label>
		<span id='idproduct_description' style="color:red;"></span>
		<textarea name="product_description" id="product_description" class="form-control" type="text" placeholder="Product description" style="height: 250px;"><?php echo $rsedit['product_description']; ?></textarea>
		
	</div>
</div>
			
<div class="controls">
<label class="control-label">Upload image</label>
<span id='idproduct_name' style="color:red;"></span>
		<span id='idproduct_image' style="color:red;"></span>
		<input name="product_image" id="product_image" class="form-control" type="file" placeholder="product images" accept="image/*">
		<br>
		<?php
		if(isset($_GET['editid']))
		{
		?>
		<img src='imgproduct/<?php echo $rsedit['product_image']; ?>' style="width:100%;">
		<?php
		}
		?>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Starting bid</label>
		<span id='idstarting_bid' style="color:red;"></span>
		<input name="starting_bid" id="starting_bid" class="form-control" type="text" placeholder="starting bid"  value="<?php echo $rsedit['starting_bid']; ?>">
		
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Actual cost</label>
		<span id='idproduct_cost' style="color:red;"></span>
		<input name="product_cost" id="product_cost" class="form-control" type="text" placeholder="product cost" value="<?php echo $rsedit['product_cost']; ?>">
		
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Start date</label>
		<?php
if(isset($_GET['editid']))
{
?>
	<input name="start_date_time" class="form-control"  type="date" placeholder="start date and time" min="<?php echo date("Y-m-d"); ?>" value="<?php
	if(isset($_GET['editid']))
	{
		echo date("Y-m-d",strtotime($rsedit['start_date_time'])); 
	}
	else
	{
		echo date("Y-m-d");
	}
	?>"  <?php
		if(isset($_GET['editid']))
		{
			echo " readonly  style='background-color:#fcf8e3;' ";
		}
		?> >
<?php
}
else
{
?>
	<input name="start_date" class="form-control"  type="date" placeholder="start date and time"  min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" onchange="changedate(this.value)"  onkeyup="changedate(this.value)" >
	
<?php
}
?>
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
<label class="control-label">Start time</label>


<?php
if(isset($_GET['editid']))
{
?>
	<input name="start_time" class="form-control"  type="time" placeholder="Start time"  value="<?php echo date("H:i",strtotime($rsedit['start_date_time'])); ?>" readonly style="background-color:#fcf8e3;" >
	
<?php
}
else
{
?>
	<input name="start_time" class="form-control"  type="time" placeholder="Start time"  value="<?php
		echo date("H:i");
	?>" >
	
<?php
}
?>
</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">End date</label>
		<div id="idchangetodate"><?php include("ajaxenddate.php"); ?></div>
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">End time</label>
		<div id="idend_time">
			<input  style="background-color:#fcf8e3;" name="end_time" class="form-control"  type="time" placeholder="End time"  value="<?php 
			if(isset($_GET['editid']))
			{
			echo date("H:i:s",strtotime($rsedit['end_date_time']));
			}
			else
			{
				echo date("H:i");
			}
			?>"  >
		</div>
	</div>
</div>

<?php
/*
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Product warranty</label>
		<span id='idproduct_warranty' style="color:red;"></span>
		<input name="product_warranty" id="product_warranty" class="form-control" type="text" placeholder="product warranty" value="<?php echo $rsedit['product_warranty']; ?>">
		
	</div>
</div>
*/
?>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Product delivery</label>
		<span id='idproduct_delivery' style="color:red;"></span>
		<?php
		/*
		<textarea name="product_delivery" id="product_delivery" class="form-control" placeholder="Product delivery"><?php echo $rsedit['product_delivery']; ?></textarea>
		*/
		?>
		
			<select name="product_delivery" id="product_delivery" class="form-control" >
				<option value=''>Select Product delivery</option>
				<?php
				$arr = array("3-4 Days","4-5 days","5-7 days","7-10 days","10-14 days");
				foreach($arr as $val)
				{
					if($val == $rsedit['product_delivery'])
					{
					echo "<option selected value='$val'>$val</option>";
					}
					else
					{
					echo "<option value='$val'>$val</option>";
					}
				}
				?>
			</select>
</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Company name</label>
		<span id='idcompany_name' style="color:red;"></span>
		<input name="company_name" id="company_name" class="form-control" type="text" placeholder="company name" value="<?php echo $rsedit['company_name']; ?>">
		
	</div>
</div>
												
<?php
if(isset($_SESSION['employeeid']))
{
?>												
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Status:</label>
		<span id='idstatus' style="color:red;"></span>
			<br><select name="status" id="status" class="form-control" >
				<option value=''>Select</option>
				<?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['status'])
					{
					echo "<option selected value='$val'>$val</option>";
					}
					else
					{
					echo "<option value='$val'>$val</option>";
					}
				}
				?>
			</select>
	</div>
</div>
<?php
}
else
{
?>
<span id='idstatus' style="color:red;"></span>
<input type='hidden' name='status' id='status' value='<?php 
	if(isset($_GET['editid']))
	{
		echo $rsedit['status']; 
	}
	else
	{
		echo "Pending";
	}
?>'>
<?php
}	
?>
											</div>

<button  type="submit" name="submit"  class="form-control" >Submit</button>

										</div>
									</section>
									
					</div>


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


                            </div>
                        </div>
					</div>
                </div>
            </div>

<?php
include("footer.php");
?>
<script>
function validateform()
{
	/* #######start 1######### */
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space	
	var alphaspacenumbericExp = /^[a-zA-Z0-9\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id		      
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(!document.getElementById("product_name").value.match(alphaspacenumbericExp))
	{
		document.getElementById("idproduct_name").innerHTML ="Product name should contain only alphabets and spaces....";	
		i=1;		
	}
	if(document.getElementById("product_name").value.length < 5)
	{
		document.getElementById("idproduct_name").innerHTML ="Product name should contain more than 10 characters....";	
		i=1;		
	}
	if(document.getElementById("product_name").value.length > 20)
	{
		document.getElementById("idproduct_name").innerHTML ="Product name should contain less than 20 characters....";	
		i=1;		
	}
	if(document.getElementById("product_name").value == "")
	{
		document.getElementById("idproduct_name").innerHTML ="Product name should not be empty....";	
		i=1;		
	}
	var image =document.getElementById("product_image").value;
    var checkimg = image.toLowerCase();
    if(!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.gif|\.GIF|\.jpeg|\.JPEG)$/))
	{
		document.getElementById("idproduct_image").innerHTML ="Please enter Image File Extensions .jpg,.png,.jpeg,.gif..";
		i=1;	
	}
	if(document.getElementById("product_image").value == "")
	{
		document.getElementById("idproduct_image").innerHTML ="Kindly upload the image..";	
		i=1;
	}
	if(document.getElementById("product_description").value == "")
	{
		document.getElementById("idproduct_description").innerHTML ="Description should not be empty....";	
		i=1;		
	}	
	if(document.getElementById("starting_bid").value < 1)
	{
		document.getElementById("idstarting_bid").innerHTML ="Starting bid must be more than a Rs.1....";	
		i=1;		
	}
	if(document.getElementById("starting_bid").value == "")
	{
		document.getElementById("idstarting_bid").innerHTML ="Starting bid should not be empty....";	
		i=1;		
	}
	if(document.getElementById("product_cost").value < 100)
	{
		document.getElementById("idproduct_cost").innerHTML ="Product cost should be more than RS.100....";	
		i=1;		
	}
	
	if(document.getElementById("product_cost").value == "")
	{
		document.getElementById("idproduct_cost").innerHTML ="Product cost should not be empty....";	
		i=1;		
	}
	/*
	if(document.getElementById("product_warranty").value=="")
	{
		document.getElementById("idproduct_warranty").innerHTML ="Product Warranty should not be empty..";	
		i=1;		
	}
	*/
	if(document.getElementById("product_delivery").value=="")
	{
		document.getElementById("idproduct_delivery").innerHTML ="Product delivery should not be empty....";	
		i=1;		
	}
	
	if(document.getElementById("company_name").value.length < 3)
	{
		document.getElementById("idcompany_name").innerHTML ="Company name should contain more than 3 characters....";	
		i=1;		
	}
	if(document.getElementById("company_name").value.length > 20)
	{
		document.getElementById("idcompany_name").innerHTML ="Company name should contain less than 20 characters...";	
		i=1;		
	}
	if(document.getElementById("company_name").value=="")
	{
		document.getElementById("idcompany_name").innerHTML ="Company name should not be empty....";	
		i=1;		
	}
	if(document.getElementById("status").value =="")
	{
		document.getElementById("idstatus").innerHTML ="Status should not be empty..";	
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
function changedate(dt)
{
	var start_date = dt;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("idchangetodate").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxenddate.php?start_date="+start_date,true);
	xmlhttp.send();
}
</script>
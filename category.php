<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand(). $_FILES["category_icon"]["name"];
	move_uploaded_file($_FILES["category_icon"]["tmp_name"],"imgcategory/".$filename);
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE category SET category_name='$_POST[category_name]',category_icon='$filename',description='$_POST[description]',status='$_POST[status]' WHERE  category_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('category record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{
		$sql = "INSERT INTO category(category_name,category_icon,description,status) VALUES('$_POST[category_name]','$filename','$_POST[description]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('category record inserted successfully..');</script>";
			echo "<script>window.location='category.php';</script>";
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
	$sqledit ="SELECT * FROM category WHERE category_id='$_GET[editid]'";
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
					<li class="breadcrumb-item active">Category</li>
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
		<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
			<div class="checkbox-form checkout-review-order">
				<h3 class="shoping-checkboxt-title">Category</h3>
				<div class="row">
				
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Category Name</label><span class="required">*</span><span class="errormsg"  id="errcategory_name"></span></label>
		<input type="text" name="category_name" id="category_name" class="form-control"  value="<?php echo $rsedit['category_name']; ?>" >
	</p>
</div>	

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Category Icon</label><span class="required">*</span> <span class="errormsg" id="errcategory_icon"></span></label>
		<input type="file" name="category_icon" id="category_icon" class="form-control" accept="image/*" >
		<?php
		if(isset($_GET['editid']))
		{
			if($rsedit['category_icon'] == "")
			{
				echo "<img src='img/No-Image-Available.png' style='width: 200px;height:250px;'>";
			}
			else if(file_exists("imgcategory/".$rsedit['category_icon']))
			{
				echo "<img src='imgcategory/$rsedit[category_icon]' style='width: 200px;height:250px;'>";
			}
			else
			{
				echo "<img src='img/No-Image-Available.png' style='width: 200px;height:250px;'>";
			}
		}
		?>
	</p>
</div>

<div class="col-lg-12">
	<p class="single-form-row">
		<label>Description</label><span class="errormsg"  id="errdescription"></span></label>
		<textarea name="description" id="description" class="form-control"><?php echo $rsedit['description']; ?></textarea>
	</p>
</div>	
<div class="col-lg-12">
	<p class="single-form-row">
		<label>Status<span class="required">*</span> <span class="errormsg" id="errstatus"></span></label>
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
	<p class="single-form-row"><hr>
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
    $("span").html("");
	var i=0;
	/* ########end 1######## */
  
	if(!document.getElementById("category_name").value.match(alphaspaceExp))
	{
		document.getElementById("errcategory_name").innerHTML ="Category name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("category_name").value == "")
	{
		document.getElementById("errcategory_name").innerHTML ="Category name should not be empty....";	
		i=1;		
	}
	
	var image =document.getElementById("category_icon").value;
    var checkimg = image.toLowerCase();
    if(!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.gif|\.GIF|\.jpeg|\.JPEG)$/))
	{
		document.getElementById("errcategory_icon").innerHTML ="Please enter Image File Extensions .jpg,.png,.jpeg,.gif..";
		i=1;	
	}
	if(document.getElementById("category_icon").value == "")
	{
		document.getElementById("errcategory_icon").innerHTML ="Category icon should not be empty....";	
		i=1;		
	}
	if(document.getElementById("status").value == "")
	{
		document.getElementById("errstatus").innerHTML ="Kindly select category status....";	
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
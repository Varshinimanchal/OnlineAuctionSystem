<?php
include("header.php");
if(!isset($_SESSION["customer_id"]))
{
	echo "<SCRIPT>window.location='customerlogin.php';</SCRIPT>";
}
?>
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
		<h2>Select category..</h2>			
			
						<div class="row">
						
		<?php
		$sql = "select * from category WHERE status='Active'";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			if (file_exists("imgcategory/".$rs['category_icon'])) 
			{
				 $imgname = "imgcategory/".$rs['category_icon'];
			} 
			else 
			{
				$imgname = "img/No-Image-Available.png";
			}
		?>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml"  >
					<div class="view view-tenth" onclick='window.location=`product.php?categoryid=<?php echo $rs['category_id']; ?>`' style="Cursor:pointer;">
						<img src="<?php echo $imgname; ?>" style="height:280px;width: 100%;" class="img-responsive" />
						<div class="mask">
							<h4><?php echo $rs['category_name']; ?></h4>
							<p><?php echo $rs['description']; ?></p>
						</div>
					</div>
				<hr>
				</div>
		<?php
		}
		?>		
				</div>
			
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<?php
include("footer.php");
?>
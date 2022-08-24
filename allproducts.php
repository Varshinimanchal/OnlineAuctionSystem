<?php
include("header.php");
?>
<script>
function countdowntimer(id, time)
{
		// Set the date we're counting down to
		var countDownDate = new Date(time).getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		// Get todays date and time
		var now = new Date().getTime();
		
		// Find the distance between now an the count down date
		var distance = countDownDate - now;
		
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
		// Output the result in an element with id="demo"
		document.getElementById("countdowntime"+id).innerHTML = "<b  style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";
		
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("countdowntime"+id).innerHTML = "<center><b  style='color: red;'>EXPIRED</b></center>";
		}
	}, 1000);
	
}
</script>  
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>View Auction products<span class="blink_me"></span></h3>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid">
		<?php
		$sqlcategory = "select * from category WHERE status='Active' ";
		if($_GET['category_id'] != "")
		{
		$sqlcategory = $sqlcategory . " AND category_id='$_GET[category_id]'";
		}
		$qsqlcategory = mysqli_query($con,$sqlcategory);
		while($rscategory = mysqli_fetch_array($qsqlcategory))
		{
			$sqlproduct = "select * from product WHERE status='Active' AND category_id='$rscategory[category_id]' AND end_date_time >= '$dt $tim' ";
			if($_GET['product'] != "")
			{
				$sqlproduct = $sqlproduct . " AND product_name LIKE '%$_GET[product]%'";
			}
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			if(mysqli_num_rows($qsqlproduct) >=1)
			{
		?>	
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6><?php echo $rscategory['category_name']; ?></h6>
			<?php
			while($rsproduct = mysqli_fetch_array($qsqlproduct))
			{
				if (file_exists("imgproduct/".$rsproduct['product_image'])) 
				{
					 $imgname = "imgproduct/".$rsproduct['product_image'];
				} 
				else 
				{
					$imgname = "images/noimage.gif";
				}				
?>
					 <div class="col-md-4 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb"	>
											<a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><img src="<?php echo $imgname; ?>" alt=" " class="img-responsive"style="height: 250px;" /></a>
											<p><b><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct['product_name']; ?></a></b></p>
<!-- Timer code starts here -->
<p id="countdowntime<?php echo $rsproduct[0]; ?>"></p>
<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0]; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct['end_date_time'])); ?>');</script>
<!-- Timer code ends here -->
											
											<h4>Current Bid Amount : ₹<?php echo $rsproduct['starting_bid']; ?> </h4>
										</div>
                                               <div class="snipcart-details">
												<fieldset>
													<a href='single.php?productid=<?php echo $rsproduct['product_id']; ?>'><input type="button" name="submit" value="Bid Now" class="button" /></a>
												</fieldset>  
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
			<?php
			}
			?>
					<div class="clearfix"> </div>
				</div>
			<?php
			}
			?>
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
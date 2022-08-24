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

<hr>		
            <!-- Latest Auctions start -->
            <div class="product-area pb-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="section-title-3">
                                        <h2>Latest Auctions</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div id="for-men" class="tab-pane active show" role="tabpanel">
                                            <div class="row">
                                                <div class="product-active-3 owl-carousel">
												
	<?php
$i=0;	
	?><?php
			$sqlproduct = "select product.*,category.category_name from product LEFT JOIN category on product.category_id=category.category_id WHERE product.status='Active' AND product.customer_id!='0' order by product.product_id DESC limit 0,4";
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			while($rsproduct = mysqli_fetch_array($qsqlproduct))
			{
				$i++;
				if (file_exists("imgproduct/".$rsproduct['product_image'])) 
				{
					 $imgname = "imgproduct/".$rsproduct['product_image'];
				} 
				else 
				{
					$imgname = "images/noimage.gif";
				}
?>
<div class="col">
	<!-- single-product-wrap start -->
	<div class="single-product-wrap">
		<div class="product-image box"  style="height:350px;width:100%;">
			<a href="single.php?productid=<?php echo $rsproduct[0]; ?>">
				<img class="primary-image" src="<?php echo $imgname; ?>" alt=""  style="width:100%; height:100%">
				<?php /*<img class="secondary-image" src="<?php echo $imgname; ?>" alt=""> */ ?>
			</a>
			<div class="label-product"><?php echo $rsproduct['category_name']; ?></div>
		</div>
		<div class="product_desc">
			<div class="product_desc_info">
<?php
/*			
				<div class="rating-box">
					<ul class="rating">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
					</ul>
				</div>
*/
?>				
				<h4><a class="product_name" href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct['product_name']; ?></a></h4>
		<div class="manufacturer"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>">Product Code: <?php echo $rsproduct['product_id']; ?></a></div>
<!-- Timer code starts here -->
<?php /* <p id="countdowntime<?php echo $rsproduct[0].$i; ?>">abc</p> */ ?>
<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0].$i; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct['end_date_time'])); ?>');</script>
<!-- Timer code ends here -->
				<div class="price-box">
					<span class="new-price">Current Bid Amount : ₹<?php 
					if($rsproduct['ending_bid'] > $rsproduct['starting_bid'])
					{
					echo $rsproduct['ending_bid']; 
					}
					else
					{
					echo $rsproduct['starting_bid'];
					}
					?></span>
					<?php /*<span class="old-price">$250.00</span> */ ?>
				</div>
			</div>
			<div class="add-actions">
				<ul class="add-actions-link">
					<li class="add-cart"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><i class="ion-android-cart"></i> Click here to BID</a></li>
				<?php
				/*
					<li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li>
					<li><a class="links-details" href="single-product.php"><i class="ion-clipboard"></i></a></li>
					*/
					?>
				</ul>
			</div>
		</div>
	</div>
	<!-- single-product-wrap end -->
</div>
			<?php
			}
			?>
												
												</div>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Auctions end -->
            

			<hr>
            <!-- Featured Auctions start -->
            <div class="product-area pb-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="section-title-3">
                                        <h2>Featured Auctions</h2>
                                    </div>
                                </div>
                            </div>
							
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div id="for-men" class="tab-pane active show" role="tabpanel">
                                            <div class="row">
                                                <div class="product-active-3 owl-carousel">
												
	<?php
$i=0;	
	?><?php
			$sqlproduct = "select product.*,category.category_name from product LEFT JOIN category on product.category_id=category.category_id WHERE product.status='Active' AND product.customer_id!='0' AND end_date_time<'$dttim' order by product.product_id ASC limit 0,4";
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			while($rsproduct = mysqli_fetch_array($qsqlproduct))
			{
				$i++;
				if (file_exists("imgproduct/".$rsproduct['product_image'])) 
				{
					 $imgname = "imgproduct/".$rsproduct['product_image'];
				} 
				else 
				{
					$imgname = "images/noimage.gif";
				}
?>
<div class="col">
	<!-- single-product-wrap start -->
	<div class="single-product-wrap">
		<div class="product-image box"  style="height:350px;width:100%;">
			<a href="single.php?productid=<?php echo $rsproduct[0]; ?>">
				<img class="primary-image" src="<?php echo $imgname; ?>" alt=""  style="width:100%; height:100%">
				<?php /*<img class="secondary-image" src="<?php echo $imgname; ?>" alt=""> */ ?>
			</a>
			<div class="label-product"><?php echo $rsproduct['category_name']; ?></div>
		</div>
		<div class="product_desc">
			<div class="product_desc_info">
<?php
/*			
				<div class="rating-box">
					<ul class="rating">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
					</ul>
				</div>
*/
?>				
				<h4><a class="product_name" href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct['product_name']; ?></a></h4>
		<div class="manufacturer"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>">Product Code: <?php echo $rsproduct['product_id']; ?></a></div>
<!-- Timer code starts here -->
<p id="countdowntime<?php echo $rsproduct[0].$i; ?>"></p>
<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0].$i; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct['end_date_time'])); ?>');</script>
<!-- Timer code ends here -->
				<div class="price-box">
					<span class="new-price">Current Bid Amount : ₹<?php 
					if($rsproduct['ending_bid'] > $rsproduct['starting_bid'])
					{
					echo $rsproduct['ending_bid']; 
					}
					else
					{
					echo $rsproduct['starting_bid'];
					}
					?></span>
					<?php /*<span class="old-price">$250.00</span> */ ?>
				</div>
			</div>
			<div class="add-actions">
				<ul class="add-actions-link">
					<li class="add-cart"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><i class="ion-android-cart"></i> Click here to BID</a></li>
				<?php
				/*
					<li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li>
					<li><a class="links-details" href="single-product.php"><i class="ion-clipboard"></i></a></li>
					*/
					?>
				</ul>
			</div>
		</div>
	</div>
	<!-- single-product-wrap end -->
</div>
			<?php
			}
			?>
												
												</div>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        
							</div>
                    </div>
                </div>
            </div>
            <!-- Featured Auctions end -->
            <hr>
            <!-- Upcoming Auctions start -->
            <div class="product-area pb-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="section-title-3">
                                        <h2>Upcoming Auctions</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div id="for-men" class="tab-pane active show" role="tabpanel">
                                            <div class="row">
                                                <div class="product-active-3 owl-carousel">
												
	<?php
$i=0;	
	?><?php
			$sqlproduct = "select product.*,category.category_name from product LEFT JOIN category on product.category_id=category.category_id WHERE product.status='Active' AND product.customer_id!='0'  AND start_date_time>'$dttim' order by product.product_id DESC limit 0,4";
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			while($rsproduct = mysqli_fetch_array($qsqlproduct))
			{
				$i++;
				if (file_exists("imgproduct/".$rsproduct['product_image'])) 
				{
					 $imgname = "imgproduct/".$rsproduct['product_image'];
				} 
				else 
				{
					$imgname = "images/noimage.gif";
				}
?>
<div class="col">
	<!-- single-product-wrap start -->
	<div class="single-product-wrap">
		<div class="product-image box"  style="height:350px;width:100%;">
			<a href="single.php?productid=<?php echo $rsproduct[0]; ?>">
				<img class="primary-image" src="<?php echo $imgname; ?>" alt=""  style="width:100%; height:100%">
				<?php /*<img class="secondary-image" src="<?php echo $imgname; ?>" alt=""> */ ?>
			</a>
			<div class="label-product"><?php echo $rsproduct['category_name']; ?></div>
		</div>
		<div class="product_desc">
			<div class="product_desc_info">
<?php
/*			
				<div class="rating-box">
					<ul class="rating">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
					</ul>
				</div>
*/
?>				
				<h4><a class="product_name" href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct['product_name']; ?></a></h4>
		<div class="manufacturer"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>">Product Code: <?php echo $rsproduct['product_id']; ?></a></div>
<!-- Timer code starts here -->
<p id="countdowntime<?php echo $rsproduct[0].$i; ?>"></p>
<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0].$i; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct['end_date_time'])); ?>');</script>
<!-- Timer code ends here -->
				<div class="price-box">
					<span class="new-price">Current Bid Amount : ₹<?php 
					if($rsproduct['ending_bid'] > $rsproduct['starting_bid'])
					{
					echo $rsproduct['ending_bid']; 
					}
					else
					{
					echo $rsproduct['starting_bid'];
					}
					?></span>
					<?php /*<span class="old-price">$250.00</span> */ ?>
				</div>
			</div>
			<div class="add-actions">
				<ul class="add-actions-link">
					<li class="add-cart"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><i class="ion-android-cart"></i> Click here to BID</a></li>
				<?php
				/*
					<li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li>
					<li><a class="links-details" href="single-product.php"><i class="ion-clipboard"></i></a></li>
					*/
					?>
				</ul>
			</div>
		</div>
	</div>
	<!-- single-product-wrap end -->
</div>
			<?php
			}
			?>
												
												</div>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        
						</div>
                    </div>
                </div>
            </div>
            <!-- Upcoming Auctions end -->
            <hr>
            <!-- Closing Auctions start -->
            <div class="product-area pb-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="section-title-3">
                                        <h2>Closing Auctions</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div id="for-men" class="tab-pane active show" role="tabpanel">
                                            <div class="row">
                                                <div class="product-active-3 owl-carousel">
												
	<?php
$i=0;	
	?><?php
			$sqlproduct = "select product.*,category.category_name from product LEFT JOIN category on product.category_id=category.category_id WHERE product.status='Active' AND product.customer_id!='0'   AND product.end_date_time>'$dt $tim' AND product.end_date_time <'$dt 23:59:59'  order by product.product_id DESC limit 0,4";
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			while($rsproduct = mysqli_fetch_array($qsqlproduct))
			{
				$i++;
				if (file_exists("imgproduct/".$rsproduct['product_image'])) 
				{
					 $imgname = "imgproduct/".$rsproduct['product_image'];
				} 
				else 
				{
					$imgname = "images/noimage.gif";
				}
?>
<div class="col">
	<!-- single-product-wrap start -->
	<div class="single-product-wrap">
		<div class="product-image box"  style="height:350px;width:100%;">
			<a href="single.php?productid=<?php echo $rsproduct[0]; ?>">
				<img class="primary-image" src="<?php echo $imgname; ?>" alt=""  style="width:100%; height:100%">
				<?php /*<img class="secondary-image" src="<?php echo $imgname; ?>" alt=""> */ ?>
			</a>
			<div class="label-product"><?php echo $rsproduct['category_name']; ?></div>
		</div>
		<div class="product_desc">
			<div class="product_desc_info">
<?php
/*			
				<div class="rating-box">
					<ul class="rating">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
					</ul>
				</div>
*/
?>				
				<h4><a class="product_name" href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct['product_name']; ?></a></h4>
		<div class="manufacturer"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>">Product Code: <?php echo $rsproduct['product_id']; ?></a></div>
<!-- Timer code starts here -->
<p id="countdowntime<?php echo $rsproduct[0].$i; ?>"></p>
<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0].$i; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct['end_date_time'])); ?>');</script>
<!-- Timer code ends here -->
				<div class="price-box">
					<span class="new-price">Current Bid Amount : ₹<?php 
					if($rsproduct['ending_bid'] > $rsproduct['starting_bid'])
					{
					echo $rsproduct['ending_bid']; 
					}
					else
					{
					echo $rsproduct['starting_bid'];
					}
					?></span>
					<?php /*<span class="old-price">$250.00</span> */ ?>
				</div>
			</div>
			<div class="add-actions">
				<ul class="add-actions-link">
					<li class="add-cart"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><i class="ion-android-cart"></i> Click here to BID</a></li>
				<?php
				/*
					<li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li>
					<li><a class="links-details" href="single-product.php"><i class="ion-clipboard"></i></a></li>
					*/
					?>
				</ul>
			</div>
		</div>
	</div>
	<!-- single-product-wrap end -->
</div>
			<?php
			}
			?>
												
												</div>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        
					   </div>
                    </div>
                </div>
            </div>
            <!-- Closing Auctions end -->
            <hr>
            <!-- Closed Auctions start -->
            <div class="product-area pb-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="section-title-3">
                                        <h2>Closed Auctions</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div id="for-men" class="tab-pane active show" role="tabpanel">
                                            <div class="row">
                                                <div class="product-active-3 owl-carousel">
												
	<?php
$i=0;	
	?><?php
			$sqlproduct = "select product.*,category.category_name from product LEFT JOIN category on product.category_id=category.category_id WHERE product.status='Active'  AND product.customer_id!='0' AND end_date_time<'$dt $tim' order by product.product_id DESC limit 0,4";
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			while($rsproduct = mysqli_fetch_array($qsqlproduct))
			{
				$i++;
				if (file_exists("imgproduct/".$rsproduct['product_image'])) 
				{
					 $imgname = "imgproduct/".$rsproduct['product_image'];
				} 
				else 
				{
					$imgname = "images/noimage.gif";
				}
?>
<div class="col">
	<!-- single-product-wrap start -->
	<div class="single-product-wrap">
		<div class="product-image box"  style="height:350px;width:100%;">
			<a href="single.php?productid=<?php echo $rsproduct[0]; ?>">
				<img class="primary-image" src="<?php echo $imgname; ?>" alt=""  style="width:100%; height:100%">
				<?php /*<img class="secondary-image" src="<?php echo $imgname; ?>" alt=""> */ ?>
			</a>
			<div class="label-product"><?php echo $rsproduct['category_name']; ?></div>
		</div>
		<div class="product_desc">
			<div class="product_desc_info">
<?php
/*			
				<div class="rating-box">
					<ul class="rating">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
						<li class="no-star"><i class="fa fa-star"></i></li>
					</ul>
				</div>
*/
?>				
				<h4><a class="product_name" href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct['product_name']; ?></a></h4>
		<div class="manufacturer"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>">Product Code: <?php echo $rsproduct['product_id']; ?></a></div>
<!-- Timer code starts here -->
<p id="countdowntime<?php echo $rsproduct[0].$i; ?>"></p>
<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0].$i; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct['end_date_time'])); ?>');</script>
<!-- Timer code ends here -->
				<div class="price-box">
					<span class="new-price">Current Bid Amount : ₹<?php 
					if($rsproduct['ending_bid'] > $rsproduct['starting_bid'])
					{
					echo $rsproduct['ending_bid']; 
					}
					else
					{
					echo $rsproduct['starting_bid'];
					}
					?></span>
					<?php /*<span class="old-price">$250.00</span> */ ?>
				</div>
			</div>
			<div class="add-actions">
				<ul class="add-actions-link">
					<li class="add-cart"><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><i class="ion-android-cart"></i> Click here to BID</a></li>
				<?php
				/*
					<li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li>
					<li><a class="links-details" href="single-product.php"><i class="ion-clipboard"></i></a></li>
					*/
					?>
				</ul>
			</div>
		</div>
	</div>
	<!-- single-product-wrap end -->
</div>
			<?php
			}
			?>
												
												</div>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        
					   </div>
                    </div>
                </div>
            </div>
            <!-- Closed Auctions end -->	   

<?php
include("footer.php");
?>
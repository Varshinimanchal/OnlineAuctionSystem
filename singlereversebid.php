<?php
include("header.php");
if(isset($_POST['submit']))
{	
		if($accbalamt > 0)
		{
			
		$sqlproduct = "SELECT * FROM bidding  WHERE product_id='$_GET[productid]' AND bidding_amount='$_POST[purchase_amount]'";
		$qsqlproduct = mysqli_query($con,$sqlproduct);
		if(mysqli_num_rows($qsqlproduct) >= 1)
		{
		echo "<script>alert('Reverse bidding failed - Someone has done bidding on Same price..');</script>";
		}
		
		$dttime = date("Y-m-d H:i:s");
		$sql = "INSERT INTO  bidding (customer_id,product_id,bidding_amount,bidding_date_time,note,status) VALUES('$_SESSION[customer_id]','$_GET[productid]','$_POST[purchase_amount]','$dttime','$_POST[note]','Active')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Bidding done successfully..');</script>";
		}
		
		$biddingid = mysqli_insert_id($con);
			
		$sql = "UPDATE product SET ending_bid='$_POST[purchase_amount]' where product_id='$_GET[productid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		
		$biddingpercentageamt = 5 + $_POST['purchase_amount']; //($_POST[purchase_amount]*10)/100;
			
		$sql = "INSERT INTO  payment(customer_id,payment_type,product_id,bidding_id,paid_amount,paid_date,status) VALUES('$_SESSION[customer_id]','Bid','$_GET[productid]','$biddingid','$biddingpercentageamt','$dt','Active')";
		$qsql = mysqli_query($con,$sql);

		echo "<script>window.location='singlereversebid.php?productid=$_GET[productid]';</script>";
	}
	else
	{
		echo "<script>alert(`Your account does't have sufficient balance.. Kindly deposit amount.. `);</script>";
		echo "<script>window.location='deposit.php';</script>";
	}
}
$sqlproduct = "SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id LEFT JOIN customer ON customer.customer_id=product.customer_id WHERE product.product_id='$_GET[productid]'";
$qsqlproduct = mysqli_query($con,$sqlproduct);
$rsproduct= mysqli_fetch_array($qsqlproduct);

if (file_exists("imgproduct/".$rsproduct['product_image'])) 
{
	$imgname = "imgproduct/".$rsproduct['product_image'];
} 
else 
{
	$imgname = "images/noimage.gif";
}
?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                                <li class="breadcrumb-item active"><?php echo $rsproduct['product_name']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row single-product-area">
                                <div class="col-xl-4  col-lg-6 offset-xl-1 col-md-5 col-sm-12">
                                    <div class="single-product-tab">
                                        <div class="zoomWrapper">
		<div id="img-1" class="zoomWrapper single-zoom" style="background-color: #f8f8f8;">
			<a href="#">
				<center><img id="zoom1" src="<?php echo $imgname; ?>" data-zoom-image="<?php echo $imgname; ?>" alt="big-1"></center>
			</a>
		</div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-12">
                                    <!-- product-thumbnail-content start -->
                                    <div class="quick-view-content">
                                        <div class="product-info">
                                            <h2><?php echo $rsproduct['product_name']; ?> </h2>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"><b><?php echo $rsproduct['category_name']; ?></b></i></li>
                                                </ul>
                                            </div>
                                            <p>
<h4>Time Remaining<p id="demo<?php $rsproduct['product_id']; ?>" style="color: red;"></p></h4>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo date("M d, Y H:i:s",strtotime($rsproduct[8])); ?>").getTime();

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
    document.getElementById("demo").innerHTML = days + "days " + hours + "hrs "
    + minutes + "min " + seconds + "sec ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo<?php $rsproduct['product_id']; ?>").innerHTML = "EXPIRED";
		
		document.getElementById("divbidstatus").innerHTML = '<div class="snipcart-details agileinfo_single_right_details"><input type="button" name="submit" value="Closed" class="button" disabled /></div>';
		
    }
}, 1000);
</script>
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

											</p>

                                            <div class="price-box">
<p><b>Actual product cost</b> : ₹<?php echo $rsproduct['product_cost']; ?></p>
<?php 
/*
 <h4>Current Bid Amount : <br>₹<?php echo $rsproduct['ending_bid']; ?></h4>
*/
?>

<input type='hidden' name='max_bid_amt' id='max_bid_amt' value='<?php echo $rsproduct['ending_bid']+25; ?>'>

                                              <?php /* <span class="new-price">$225.00</span>
                                               <span class="old-price">$250.00</span>
											   */ ?>
<form action="" method="post"  onsubmit="return confirmbidding()">
<input type='hidden' name='ending_bid' id='ending_bid' value='<?php echo $rsproduct['ending_bid']; ?>'>
<?php
if(isset($_SESSION["customer_id"]))
{
	 $currenttime = strtotime(date("Y-m-d H:i:s"));
	 $endtime = strtotime($rsproduct['end_date_time']);
	 //echo $rsproduct[end_date_time];
	if($endtime >$currenttime)
	{
		if($_SESSION['customer_id'] == $rsproduct['customer_id'])
		{
?>
<div id="divbidstatus">
	<div class="w3_agileits_card_number_grid_left">
		<div class="controls">
			<label class="control-label">You can't bid for own products..</label>
		</div>
	</div>
</div>
<?php
		}
		else
		{
?>
<div id="divbidstatus">
	<div class="w3_agileits_card_number_grid_left">
		<div class="controls">
			<label class="control-label"><b>Enter Bid Amount</b></label>
			<input name="purchase_amount" id="purchase_amount" class="form-control" type="text" placeholder="Enter amount" style="width:200px;" autocomplete="off"  >		
		</div>
	</div> <br>
	<div class="snipcart-details agileinfo_single_right_details">
			<fieldset>
				<input type="submit" name="submit" value="Bid Now" class="form-control" style="width: 250px;"   />
			</fieldset>
	</div>
</div>
<?php
		}
	}
	else
	{
?>
<fieldset>

	<div class="snipcart-details agileinfo_single_right_details">
		<a href='single.php?productid=<?php echo $rsproduct['product_id']; ?>'><input type="button" name="submit" value="Closed" class="form-control" style="width: 250px;" disabled /></a>
	</div>
</fieldset> 
<?php
	}
}
else
{
?>
<div class="snipcart-details agileinfo_single_right_details">
		<fieldset>
			<input type="button" onclick='window.location=`customerlogin.php`' name="submit" value="Login to Bid" class="form-control" style="width: 250px;" />
		</fieldset>
</div>
<?php
}
?>
</form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-thumbnail-content end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info-review">
                        <div class="row">
                            <div class="col">
                                <div class="product-info-detailed">
                                    <div class="discription-tab-menu">
                                        <ul role="tablist" class="nav">
                                            <li class="active"><a href="#description" data-toggle="tab" class="active show">Description</a></li>
<?php
	 $sqledit = "SELECT * FROM bidding LEFT JOIN customer ON bidding.customer_id = customer.customer_id WHERE product_id='$_GET[productid]' ORDER BY bidding_id DESC";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit  = mysqli_fetch_array($qsqledit);

?>	
<li><a href="#review" data-toggle="tab">Bidders list (<?php echo mysqli_num_rows($qsqledit); ?>)</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="discription-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active show" id="description">
                                            <div class="description-content">
							
<div class="col-md-8">
<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<th>Uploaded by :</th><td>Admin</td>
		</tr>
		<tr>
			<th>Product Code :</th><td><?php echo $rsproduct['product_id']; ?></td>
		</tr>
		<tr>
			<th>Product warranty :</th><td><?php echo $rsproduct['product_warranty']; ?></td>
		</tr>
		<tr>
			<th>Company :</th><td><?php echo $rsproduct['company_name']; ?></td>
		</tr>
	</tbody>
</table>
</div>
<div class="col-md-12"><p><?php echo $rsproduct['product_description']; ?></p></div>
<hr>
<p><b>Product Delivery details :</b> <?php echo $rsproduct['product_delivery']; ?></p>
<hr>
<?php
if(isset($_SESSION["customer_id"]))
{
	include("chat.php");
}
else
{
	echo "<b style='color:red'><a href='login.php'>Login to chat..</a></b><hr>";
}
?>
                                            </div>
                                        </div>
                                        <div id="review" class="tab-pane fade">

<div class="description-content">
	<p>
	<?php
		if(mysqli_num_rows($qsqledit) == 0)
		{
			echo "<center><b style='color: red;'>No biddings done yet..</b></center>";
		}
		else
		{
			$sqleditbidding = "SELECT * FROM bidding LEFT JOIN customer ON bidding.customer_id = customer.customer_id WHERE product_id='$_GET[productid]' ORDER BY bidding_id DESC";
			$qsqleditbidding = mysqli_query($con,$sqleditbidding);
			while($rsedit= mysqli_fetch_array($qsqleditbidding))
			{
			echo $rsedit['bidding_id'] . "-" . $rsedit['customer_name'] . " bidded ₹XXXX on " . date("d-M-Y h:i A",strtotime($rsedit['bidding_date_time'])) ."<hr>";
			}
		}
	?>
	</p>
</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->

            
            
            <!-- footer-area start -->
           <?php
		   include("footer.php");
		   ?>
<script>
function confirmbidding()
{
	 
		if(document.getElementById("purchase_amount").value == "")
		{
			alert('Bidding amount not entered..');
			return false;
		}
		else if(parseFloat(document.getElementById("purchase_amount").value)  > parseFloat(document.getElementById("max_bid_amt").value))
		{
			alert('Bidding amount should be lesser than ₹' + document.getElementById("max_bid_amt").value);
			return false;
		}
		else
		{
			if(confirm("Confirm to bid..!!") == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
}
</script>
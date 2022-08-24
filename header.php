<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
//default_time_stamp();
include("productlistcss.php");
date_default_timezone_set('Asia/Kolkata');
include("databaseconnection.php");
$currentpagename= trim(basename($_SERVER['PHP_SELF']));	
$dttim = date("Y-m-d H:i:s");
//Default record starts here
$sqlemployee = "SELECT * FROM employee WHERE employee_id='1'";
$qsqlemployee = mysqli_query($con,$sqlemployee);
echo mysqli_error($con);
if(mysqli_num_rows($qsqlemployee) == 0)
{
	$sqlINSERTemployee= "INSERT INTO employee(employee_id,employee_name,login_id,password,employee_type,status) VALUES('1','Administrator','Admin','admin','Admin','Active')";
	mysqli_query($con,$sqlINSERTemployee);
	echo mysqli_error($con);
}
//Default record ends here
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y-m-d");
$tim = date("H:i:s");
$currentpagename= trim(basename($_SERVER['PHP_SELF']));	
if(isset($_POST['btnlogin']))
{
	$sql= "SELECT * FROM customer WHERE email_id='$_POST[emailid]' AND password='$_POST[password]' AND status='Active'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1 )
	{
		$rs = mysqli_fetch_array($qresult);
		$_SESSION["customer_id"] = $rs['customer_id'];
		
		$sql = "SELECT SUM(purchase_amount) FROM billing WHERE customer_id='$_SESSION[customer_id]' and status='Active' and payment_type='Deposit'";
		$qsql = mysqli_query($con,$sql);
		$rs = mysqli_fetch_array($qsql);
		$depamt =  $rs[0];

		$sql = "SELECT SUM(paid_amount) FROM payment WHERE customer_id='$_SESSION[customer_id]' and status='Active' and payment_type='Bid'";
		$qsql = mysqli_query($con,$sql);
		$rs = mysqli_fetch_array($qsql);
		$widamt = $rs[0];

		$accbalamt = $depamt-$widamt;
		
		if($accbalamt > 0)
		{
			echo "<script>window.location='index.php';</script>";
		}
		else
		{
			echo "<script>window.location='deposit.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('Failed to login...');</script>";
	}
}
$sqlwinningbid ="SELECT * FROM product LEFT JOIN winners ON product.product_id = winners.product_id LEFT JOIN bidding ON bidding.product_id=product.product_id WHERE product.ending_bid=bidding.bidding_amount AND product.status='Active' AND product.end_date_time<'$dt $tim' AND winners.product_id IS NULL";
$qsqlwinningbid  = mysqli_query($con,$sqlwinningbid);
while($rswinningbid = mysqli_fetch_array($qsqlwinningbid))
{
	$sqlwinner ="INSERT INTO winners(product_id,customer_id,winning_bid,end_date,status) VALUES('$rswinningbid[0]','$rswinningbid[23]','$rswinningbid[6]','$rswinningbid[26]','Pending')";
	mysqli_query($con,$sqlwinner);
}
if(isset($_SESSION['customer_id']))
{
	$sql = "SELECT SUM(purchase_amount) FROM billing WHERE customer_id='$_SESSION[customer_id]' and status='Active' and payment_type='Deposit'";
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	$depamt =  $rs[0];

	$sql = "SELECT SUM(paid_amount) FROM payment WHERE customer_id='$_SESSION[customer_id]' and status='Active' and payment_type='Bid'";
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	$widamt = $rs[0];

	$accbalamt = $depamt-$widamt;
	
}
if(!isset($_SESSION['customer_id']))
{
	$pagenames=array("","deposit.php","viewwinningbid.php");
	if(array_search($currentpagename,$pagenames) >=1)
	{
		echo "<script>window.location='login.php';</script>";
	}
}
?>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Online Auction</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <!-- Place favicon.ico in the root directory -->
	    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">	
		<!-- all CSS hear -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/mainmenu.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">	
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">	
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<style>
			.errormsg
			{
				color: red;
				padding-left: 5px;
			}
		</style>
    </head>
    <body>
        <!-- Add your application content here -->
        
        <div class="wrapper home-3">            
            <!-- header start -->
            <header>
                <!-- header-top start -->
                <div class="header-top bg-black">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 md-custom-12">
                                <!-- logo start -->
                                <div class="logo">
                                    <a href="index.php"><img src="img/logo/logo-2.png" alt=""></a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="col-lg-10 col-md-9 md-custom-12">
                                <div class="row">
<?php
if(!isset($_SESSION['employee_id']))
{
?>
                                    <div class="col-lg-3 d-none d-lg-block">
<!-- main-menu-area start -->
<div class="main-menu-area">
	<nav>
		<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about-us.php">About</a></li>
<li><a href="contact.php">Contact</a></li>
		</ul>
	</nav>
</div>
<!-- main-menu-area end -->
                                    </div>
<?php
}
?>
<?php
if(isset($_SESSION['employee_id']))
{
?>
<div class="col-lg-12 col-md-12">
<?php
}
else
{
?>
<div class="col-lg-9 col-md-12">
<?php
}
?>
                                        <!-- full-setting-area start -->
                                        <div class="full-setting-area setting-style-3">
<div class="top-dropdown">
	<ul>
	<?php
	if(isset($_SESSION['customer_id']))
	{
	?>
		<li><a href="customeraccount.php">Main</a></li>
		
		
		<li><a href="messagebox.php">Message Box</a></li>
		
		
		<li class="drodown-show"><a href="#"> View My Bid <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
			
		<li><a href="viewmybid.php">My Bid (<?php
$sql = "SELECT * FROM bidding WHERE customer_id='$_SESSION[customer_id]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>)</a></li>

				<li><a href="viewwinningbid.php">Winning Bid (<?php
$sql = "sELECT * FROM winners LEFT JOIN product ON winners.product_id=product.product_id WHERE product.customer_id!='0' AND winners.customer_id='$_SESSION[customer_id]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>)</a></li>

				<li><a href="reversebidwinner.php">Reverse Bid (<?php
$sql = "SELECT MIN(t1.bidding_amount) AS price, t1.product_id FROM ( SELECT `bidding_amount`, product_id FROM bidding WHERE bidding.customer_id='$_SESSION[customer_id]' GROUP BY `bidding_amount`, product_id HAVING COUNT(`bidding_amount`) = 1) t1";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>)</a></li>

<li><a href="viewbillingcustomer.php">View Trasaction</a></li>
			</ul>
		</li>
		<li class="drodown-show"><a href="#"> My Products <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
				<li><a href="selectcategory.php">Add Products</a></li>
				<li><a href="viewproduct.php">View Products</a></li>
			</ul>
		</li>
		<li class="drodown-show"><a href="#"> My account <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
				<li><a href="customerprofile.php">Profile</a></li>
				<li><a href="custchangepassword.php">Change password</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</li>
	<?php
	}
	else if(isset($_SESSION['employee_id']))
	{
	?>
						
		<li class="drodown-show"><a href="#"> Reverse Product <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
				<li><a href="selectreversebidcategory.php">Add Product</a></li>
				<li><a href="viewreverseproduct.php">View Products</a></li>
			</ul>
		</li>
		
		<li class="drodown-show"><a href="#"> Users <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
			<?php
			if($_SESSION['employee_type'] == "Admin")
			{
			?>
				<li><a href="employee.php">Add Staff</a></li>
				<li><a href="viewemployee.php">View Staff</a></li>
			<?php
			}
			?>
				<li><a href="viewcustomer.php">View Customers</a></li>
			</ul>
		</li>
		
			<?php
			if($_SESSION['employee_type'] == "Admin")
			{
			?>
		<li class="drodown-show"><a href="#"> Auction Settings <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
				<li><a href="category.php">Add Categories</a></li>
				<li><a href="viewcategory.php">View Categories</a></li>
			</ul>
		</li>
			<?php
			}
			?>
		<li class="drodown-show"><a href="#"> Bidding Report <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
				<li><a href="viewbiddingproduct.php">Current Bidding</a></li>
				<li><a href="closebiddingproduct.php">Closed Bidding</a></li>
				<li><a href="viewwinners.php">View Winners List</a></li>
			</ul>
		</li>
		<li class="drodown-show"><a href="#"> Report <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
				<li><a href="viewbilling.php">View Billing</a></li>
				<li><a href="viewcustomer.php">Customer Report</a></li>
				<li><a href="viewmessage.php">View Messages</a></li>
				<li><a href="viewpayment.php">View Payment</a></li>
				<li><a href="viewproduct.php">View products</a></li>
			</ul>
		</li>
		<li class="drodown-show"><a href="#"> My account <i class="fa fa-angle-down"></i></a>
			<ul class="open-dropdown setting">
				<li><a href="employeeaccount.php">Dashboard</a></li>
				<li><a href="empprofile.php">My Profile</a></li>
				<li><a href="empchangepassword.php">Change password</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</li>
	<?php
	}
	else
	{
	?>
			<li><a href="register.php">Register</a></li>
			<li><a href="customerlogin.php">Login</a></li>
	<?php
	}
	?>
	</ul>
</div>
                                        </div>
                                        <!-- full-setting-area end -->
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- header-top end -->
                <!-- header-mid-area start -->
                <div class="header-mid-area header-mid-style-3 bg-black">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- hot-line-area start -->
                                <div class="hot-line-area">
                                    <div class="phone">
                                        Customer Support: <span>+91-9972463499 </span>
                                    </div>
                                </div>
                                <!-- hot-line-area end -->

                                <!-- searchbox start -->
                                <div class="searchbox">
<form action="searchproduct.php" method="get">
	<div class="search-form-input">
		<select id="searchcategory_id" name="searchcategory_id" class="nice-select">
			<option value="">All Categories</option>
			<?php
	$sql ="SELECT * FROM category";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
			echo "<option value='$rs[category_id]'>$rs[category_name]</option>";
	}
			?>
		</select>
		<input type="text" name="searchcriteria" placeholder="Enter your search key ... ">
		<button class="top-search-btn" type="submitsearch">Search</button>
	</div>
</form>
                                </div>
                                <!-- searchbox end -->

<div class="shopping-cart-box white-cart-box">
<ul>
<?php
if(isset($_SESSION["customer_id"]))
{
?>

<li>
<a href="deposit.php">
<span class="item-cart-inner">
Balance
</span>
<div class="item-total">₹<?php echo $accbalamt; ?></div>
</a>
</li>
<?php
}
else
{
?>
<li>
<a href="customerlogin.php">
	<span class="item-cart-inner">
	Deposit
	</span>
	<div class="item-total"></div>
</a>
</li>			
<?php
}
?>



</ul>
</div>
<!-- shopping-cart-box start -->                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-mid-area end -->
                <!-- header-bottom-area start -->
                <div class="header-bottom-area bg-black" style="background-color: #f3f3f3;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                                <!-- main-menu-area start -->
                                <div class="main-menu-area">
                                    <nav>
                                        <ul>

<li><a href="latestauction.php?auctiontype=Latest Auctions" style="color:black;">Latest Auctions</a></li>
<li><a href="featured.php?auctiontype=featured Auctions" style="color:black;">Featured Auctions</a></li>
<li><a href="upcominauction.php?auctiontype=Upcoming Auctions" style="color:black;">Upcoming Auctions</a></li>
<li><a href="closingauctions.php?auctiontype=Closing Auctions" style="color:black;">Closing Auctions</a></li>
<li><a href="closed.php?auctiontype=Closed Auctions" style="color:black;" >Closed Auctions</a></li>
<li><a href="displayreversebid.php" style="color:black;" >Reverse Bid</a></li>

                                        </ul>
                                    </nav>
                                </div>
                                <!-- main-menu-area end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-bottom-area end -->
            </header>
            <!-- header end -->

<?php
if(basename($_SERVER['PHP_SELF']) == "index.php")
{
?>
<!-- slider-main-area start -->
<div class="slider-main-area">
	<div class="slider-active owl-carousel">
		<!-- slider-wrapper start -->
		<div class="slider-wrapper" style="background-image:url(img/slider/home-3-01.jpg);width: 100%;">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="slider-text-info style-2 text-center slider-text-animation">
							<h1 class="title1"><span class="text">Online Auction..</span></h1>
							<p>India's top rated auction platform..</p>
							<div class="slier-btn-1">
								<a title="Bid now" href="latestauction.php?auctiontype=Latest%20Auctions" class="shop-btn">View Latest Auctions</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-wrapper end -->
		<!-- slider-wrapper start -->
		<div class="slider-wrapper" style="background-image:url(img/slider/home-2-02.jpg);width: 100%;">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="slider-text-info style-2 text-center slider-text-animation">
							<h1 class="title1"><span class="text">Online Auction.. </span> </h1>
							<p>India's top rated auction platform..</p>
							<div class="slier-btn-1">
								<a title="Bid now" href="featured.php?auctiontype=featured%20Auctions" class="shop-btn">View Featured Auctions</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-wrapper end -->
		<!-- slider-wrapper start -->
		<div class="slider-wrapper" style="background-image:url(img/slider/home-3-1.jpg);width: 100%;">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="slider-text-info style-2 text-center slider-text-animation">
							<h1 class="title1"><span class="text">Online Auction.. </span> </h1>
							<p>India's top rated auction platform..</p>
							<div class="slier-btn-1">
								<a title="Bid now" href="upcominauction.php?auctiontype=Upcoming%20Auctions" class="shop-btn">View Upcoming Auctions</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-wrapper end -->
	</div>
</div>
<!-- slider-main-area end -->
<?php
}
?>
            <!-- footer-area start -->
            <footer class="footer-area">
                <!-- our-service-area  start -->
                <div class="our-service-area">
                    <div class="container-fluid">
                        <div class="our-service-inner">
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="img/icon/f-1.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>Free delivery</h3>
                                        <p>Free shipping on all winning Bid</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="img/icon/f-2.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>Online Support 24x7</h3>
                                        <p>Support online 24 hours</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="img/icon/f-3.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>Money Return</h3>
                                        <p>guarantee under 7 days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="img/icon/f-5.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>24x7 Auction</h3>
                                        <p>Bid 24x7 365 Days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="img/icon/f-6.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>SECURE BIDDING</h3>
                                        <p>All cards accepted</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- our-service-area  end -->
                <div class="footer-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="about-us-footer">
                                    <div class="footer-logo">
                                        <a href="#"><img src="img/logo/logo_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-info">
                                        <p class="phone">+91-9972463499</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="footer-info-inner">
                                    <div class="row">
<?php
if(!isset($_SESSION['customer_id']))
{
	if(!isset($_SESSION['employee_id']))
	{
	?>					
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="footer-title">
			<h3>Employee Account</h3>
		</div>
		<ul>
			<li><a href="employeelogin.php?logintype=Admin">Admin Login</a></li>
			<li><a href="employeelogin.php?logintype=Employee">Employee Login</a></li>
		</ul>
	</div>
	<?php
	}
}
	if(isset($_SESSION['employee_id']))
	{
	?>					
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="footer-title">
			<h3>Employee Account</h3>
		</div>
		<ul>
			<li><a href="empprofile.php">Employee Profile</a></li>
			<li><a href="empchangepassword.php">Change Password</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<?php
	}
?>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="footer-title">
                                                <h3>Your account </h3>
                                            </div>
                                            <ul>
                                                <li><a href="about-us.php">About us</a></li>
                                                <li><a href="contact.php">Contact us </a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-5 offset-xl-1 col-md-6 col-sm-6">
                                            <div class="footer-title">
                                                <h3>Get in touch</h3>
                                            </div>
                                            <div class="block-contact-text">
                                                <p> E-Auction<br>3rd Floor, Main Gate road, Balmatta, Mangalore.<br>India</p>
                                                <p>Call us: <span>+91-9972463499 </span></p>
                                                <p>Email us: <span>contact@onlineauction.com</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright">Copyright &copy; Online Auction. All Rights Reserved</div>
                            </div>	
                            <div class="col-lg-6 col-md-6">
                                 <div class="payment"><img alt="" src="img/icon/payment.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer-area start -->
            
            <!-- Modal start-->
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="single-product-tab">
                                        <div class="zoomWrapper">
                                            <div id="img-1" class="zoomWrapper single-zoom">
                                                <a href="#">
                                                    <img id="zoom1" src="img/product/1.jpg" data-zoom-image="img/product/1.jpg" alt="big-1">
                                                </a>
                                            </div>
                                            <div class="single-zoom-thumb">
                                                <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="img/product/1.jpg" data-zoom-image="img/product/1.jpg"><img src="img/product/1.jpg" alt="zo-th-1"/></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="img/product/2.jpg" data-zoom-image="img/product/2.jpg"><img src="img/product/2.jpg" alt="zo-th-2"></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="img/product/3.jpg" data-zoom-image="img/product/3.jpg"><img src="img/product/3.jpg" alt="ex-big-3" /></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="img/product/4.jpg" data-zoom-image="img/product/4.jpg"><img src="img/product/4.jpg" alt="zo-th-4"></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="img/product/5.jpg" data-zoom-image="img/product/5.jpg"><img src="img/product/5.jpg" alt="zo-th-5"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <!-- product-thumbnail-content start -->
                                    <div class="quick-view-content">
                                        <div class="product-info">
                                            <h2>Brand Name FREE RN 2018</h2>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="price-box">
                                               <span class="new-price">$225.00</span>
                                               <span class="old-price">$250.00</span>
                                            </div>
                                            <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</p>
                                            <div class="modal-size">
                                                <h4>Size</h4>
                                                <select>
                                                    <option title="S" value="1">S</option>
                                                    <option title="M" value="2">M</option>
                                                    <option title="L" value="3">L</option>
                                                </select>
                                            </div>
                                            <div class="modal-color">
                                                <h4>Color</h4>
                                                <div class="color-list">
                                                    <ul>
                                                        <li><a href="#" class="orange active"></a></li>
                                                        <li><a href="#" class="paste"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="quick-add-to-cart">
                                                <form class="modal-cart">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" type="text" value="0">
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                                </form>
                                            </div>
                                            <div class="instock">
                                                <p>In stock </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-thumbnail-content end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <!-- Modal end-->
        </div>   
           
        
		<!-- jquery -->		
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
		<!-- all plugins JS hear -->		
        <script src="js/popper.min.js"></script>	
        <script src="js/bootstrap.min.js"></script>	
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.mainmenu.js"></script>	
        <script src="js/ajax-email.js"></script>
        <script src="js/plugins.js"></script>
		<!-- main JS -->		
        <script src="js/main.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
    </body>

<!-- Mirrored from demo.hasthemes.com/juta-preview/juta-v1/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2019 04:55:35 GMT -->
</html>
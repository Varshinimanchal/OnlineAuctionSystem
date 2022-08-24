<?php
include("header.php");
?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-95">
                <div class="container-fluid">
                    <div class="account-dashboard mtb-60">
                        <div class="dashboard-upper-info">
                           <div class="row align-items-center no-gutters">
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <p class="user-name">Hello <span>yourmail@info</span></p>
                                       <p>(not yourmail@info? <a href="#">Log Out</a>)</p>
                                   </div>
                               </div>
                               <div class="col-lg-4 col-md-12">
                                   <div class="d-single-info">
                                       <p>Need Assistance? Customer service at.</p>
                                       <p>admin@devitems.com.</p>
                                   </div>
                               </div>
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <p>E-mail them at </p>
                                       <p>support@yoursite.com</p>
                                   </div>
                               </div>
                               <div class="col-lg-2 col-md-12">
                                   <div class="d-single-info text-lg-center">
                                       <a class="view-cart" href="cart.html"><i class="fa fa-cart-plus"></i>view cart</a>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-2">
                                <!-- Nav tabs -->
                                <ul class="nav flex-column dashboard-list" role="tablist">
                                    <li><a class="nav-link active" data-toggle="tab" href="#dashboard">Dashboard</a></li>
                                    <li> <a class="nav-link" data-toggle="tab" href="#orders">Orders</a></li>
                                    <li><a class="nav-link" data-toggle="tab" href="#downloads">Downloads</a></li>
                                    <li><a class="nav-link" data-toggle="tab" href="#address">Addresses</a></li>
                                    <li><a class="nav-link" data-toggle="tab" href="#account-details">Account details</a></li>
                                    <li><a class="nav-link" href="login-register.html">logout</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-lg-10">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard-content">
                                    <div id="dashboard" class="tab-pane fade show active">
                                        <h3>Dashboard </h3>
                                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                    </div>
                                    <div id="orders" class="tab-pane fade">
                                        <h3>Orders</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>	 	 	 	
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>May 10, 2018</td>
                                                        <td>Processing</td>
                                                        <td>$25.00 for 1 item </td>
                                                        <td><a class="view" href="cart.html">view</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>May 10, 2018</td>
                                                        <td>Processing</td>
                                                        <td>$17.00 for 1 item </td>
                                                        <td><a class="view" href="cart.html">view</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="downloads" class="tab-pane fade">
                                        <h3>Downloads</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Downloads</th>
                                                        <th>Expires</th>
                                                        <th>Download</th>	 	 	 	
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Haven - Free Real Estate PSD Template</td>
                                                        <td>May 10, 2018</td>
                                                        <td>never</td>
                                                        <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nevara - ecommerce html template</td>
                                                        <td>Sep 11, 2018</td>
                                                        <td>never</td>
                                                        <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="address" class="tab-pane">
                                       <p>The following addresses will be used on the checkout page by default.</p>
                                        <h4 class="billing-address">Billing address</h4>
                                        <a class="view" href="#">edit</a>
                                        <p>Johan Don</p>
                                        <p>Bangladesh</p>   
                                    </div>
                                    <div id="account-details" class="tab-pane fade">
                                        <h3>Account details </h3>
                                        <div class="login">
                                            <div class="login-form-container">
                                                <div class="account-login-form">
                                                    <form action="" method="post">
                                                        <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                        <label>Social title</label>
                                                        <div class="input-radio">
                                                            <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mr.</span>
                                                            <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mrs.</span>
                                                        </div>
                                                        <label>First Name</label>
                                                        <input name="first-name" type="text">
                                                        <label>Last Name</label>
                                                        <input name="last-name" type="text">
                                                        <label>Email</label>
                                                        <input name="email-name" type="text">
                                                        <label>Password</label>
                                                        <input name="user-password" type="password">
                                                        <label>Birthdate</label>
                                                        <input name="birthday" value="" placeholder="MM/DD/YYYY" type="text">
                                                        <span class="example">
                                                          (E.g.: 05/31/1970)
                                                        </span>
                                                        <span class="custom-checkbox">
                                                            <input name="optin" value="1" type="checkbox">
                                                            <label>Receive offers from our partners</label>
                                                        </span>
                                                        <span class="custom-checkbox">
                                                            <input name="newsletter" value="1" type="checkbox">
                                                            <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                        </span>
                                                        <div class="button-box">
                                                            <button type="submit" class="default-btn">save</button>
                                                        </div>
                                                    </form>
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
            <!-- content-wraper end -->
            
            
            <!-- footer-area start -->
           <?php
		   include("footer.php");
		   ?>
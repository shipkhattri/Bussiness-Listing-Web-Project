<?php
session_start();
include('db_conn.php');
if(!isset($_SESSION['user_id']))
{
 header("location:logout.php");
}
$_SESSION['mobile_otp']=rand(100000,999999);
$_SESSION['email_otp']=rand(100000,999999);

$query = "SELECT * FROM seller_login WHERE id = ".$_SESSION['user_id'];	
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$email_verified = $row["email_verified"];
$mobile_verified = $row["mobile_verified"];
if( $row["email_verified"] ==1 &&  $row["mobile_verified"]==1 && $_SESSION['live_status'] != 1)
{
    $sql2 = "UPDATE `seller_login` SET `live_status` = 1 WHERE id = ".$_SESSION['user_id'];	
	$result2=mysqli_query($conn,$sql2);
	$_SESSION['live_status'] = 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>World Best Local Directory Website template</title>
    <?php include('head_links.php'); ?>
</head>

<body>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!--TOP SEARCH SECTION-->
	<section class="bottomMenu dir-il-top-fix">
		<div class="container top-search-main">
			<div class="row">
				<div class="ts-menu">
					<!--SECTION: LOGO-->
					<div class="v3-m-1" style="margin-top: 8px;">
							<img src="images/logo2.png" alt="">
						</div>
					<!--SECTION: SEARCH BOX-->
					<div class="ts-menu-3">
						<div class="">
							<form class="tourz-search-form tourz-top-search-form">
								<div class="input-field">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
									<input type="text" id="top-select-search" class="autocomplete">
									<label for="top-select-search" class="search-hotel-type">Search your services like hotel, resorts, events and more</label>
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn"> </div>
							</form>
						</div>
					</div>
					<!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->
					<div class="ts-menu-4">
						<div class="v3-top-ri">
							<ul>
								<li><a href="dashboard.php" class="v3-menu-sign"><i class="fa fa-user"></i>
								<?php
    						    $id=$_SESSION['user_id'];
    						    $sql = "SELECT * FROM seller_login WHERE id='$id' ";	
    		                    $result=mysqli_query($conn,$sql);
                				while($row = mysqli_fetch_array($result)) 
                				{
                				    echo $row['username'];
                				}
						        ?>
								</a></li>
							</ul>
						</div>
					</div>
					<!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
					<div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>
					<!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
					<div class="mob-right-nav" data-wow-duration="0.5s">
						<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
						<h5>Business</h5>
						<ul class="mob-menu-icon">
							<li><a href="price.html">Add Business</a> </li>
							<li><a href="register.php">Register</a> </li>
							<li><a href="login.html">Sign In</a> </li>
						</ul>
						<h5>All Categories</h5>
						<ul>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Help Services</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Appliances Repair & Services</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Furniture Dealers</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Packers and Movers</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Pest Control </a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Solar Product Dealers</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Interior Designers</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Carpenters</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Plumbing Contractors</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Modular Kitchen</a> </li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Internet Service Providers</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--DASHBOARD-->
	<section>
		<div class="tz">
			<!--LEFT SECTION-->
			<div class="tz-l">
				<div class="tz-l-1">
					<ul>
						<li><img src="images/db-profile.jpg" alt="" /></li>
						<li><span>80%</span> profile compl</li>
						<li><span>18</span> Notifications</li>
					</ul>
					<div style="padding:20px;">
					    <?php 
					        if( $email_verified !=1 ){?>
						<a href="otp.php?type=e8v3" class="db-list-edit">Verify Email</a>
						<?php }
						if( $mobile_verified !=1 ){?>
						<a href="otp.php?type=m94x" class="db-list-edit">Verify Mobile No</a>
						<?php } ?>
					</div>
				</div>
				<div class="tz-l-2">
					<ul>
						<li>
							<a href="dashboard.php" class="tz-lma"><img src="images/icon/dbl6.png" alt="" /> My Profile</a>
						</li>
						<li>
							<a href="seller_update.php"><img src="images/icon/dbl3.png" alt="" /> Update Profile </a>
						</li>
						<li>
							<a href="listing_view.php" target="_blank"><img src="images/icon/dbl3.png" alt="" /> View </a>
						</li>
						<li>
							<a href="logout.php"><img src="images/icon/dbl12.png" alt="" /> Log Out</a>
						</li>
					</ul>
				</div>
			</div>
			<!--CENTER SECTION-->
			<div class="tz-2">
				<div class="tz-2-com tz-2-main">
					<h4>Manage My Profile</h4>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<h2>Profile</h2>
						</div>
						<?php
						    $id=$_SESSION['user_id'];
						    $sql = "SELECT * FROM seller_login WHERE id='$id' ";	
		                    $result=mysqli_query($conn,$sql);
            				while($row = mysqli_fetch_array($result)) 
            				{
						?>
						<table class="responsive-table bordered">
							<tbody>
								<tr>
									<td>User Name</td>
									<td>:</td>
									<td><?php echo $row["username"]; ?></td>
								</tr>
								<tr>
									<td>Password</td>
									<td>:</td>
									<td><?php echo $row["password"]; ?></td>
								</tr>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td><?php echo $row["firstname"]; echo $row["lastname"]; ?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td><?php echo $row["mobile"]; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $row["email"]; ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td><?php echo $row["address"]; ?></td>
								</tr>
								<tr>
									<td>Listing Title</td>
									<td>:</td>
									<td><?php echo $row["title"]; ?></td>
								</tr>
								<tr>
									<td>Listing Type</td>
									<td>:</td>
									<td><?php echo $row["type"]; ?></td>
								</tr>
								<tr>
									<td>Country</td>
									<td>:</td>
									<td><?php echo $row["country"]; ?></td>
								</tr>
								<tr>
									<td>City</td>
									<td>:</td>
									<td><?php echo $row["city"]; ?></td>
								</tr>
								<tr>
									<td>Category</td>
									<td>:</td>
									<td><?php echo $row["category"]; ?></td>
								</tr>
								<tr>
									<td>Subcategory</td>
									<td>:</td>
									<td><?php echo $row["subcategory"]; ?></td>
								</tr>
								<tr>
									<td>Opening Days</td>
									<td>:</td>
									<td><?php echo $row["days"]; ?></td>
								</tr>
								<tr>
									<td>Open Time</td>
									<td>:</td>
									<td><?php echo $row["open_time"]; ?></td>
								</tr>
								<tr>
									<td>Close Time</td>
									<td>:</td>
									<td><?php echo $row["closing_time"]; ?></td>
								</tr>
								<tr>
									<td>Listing Description</td>
									<td>:</td>
									<td><?php echo $row["description"]; ?></td>
								</tr>
								<tr>
								    <td><b>Social Media Informations</b></td>
								</tr>
								<tr>
									<td>Facebook</td>
									<td>:</td>
									<td><?php echo $row["facebook"]; ?></td>
								</tr>
								<tr>
									<td>Google</td>
									<td>:</td>
									<td><?php echo $row["google"]; ?></td>
								</tr>
								<tr>
									<td>Twitter</td>
									<td>:</td>
									<td><?php echo $row["twitter"]; ?></td>
								</tr>
								<tr>
								    <td><b>Listing Guarantee</b></td>
								</tr>
								<tr>
									<td>Service Guarantee</td>
									<td>:</td>
									<td><?php echo $row["service_guarantee"]; ?></td>
								</tr>
								<tr>
									<td>Are you professional in this service?</td>
									<td>:</td>
									<td><?php echo $row["professionals"]; ?></td>
								</tr>
								<tr>
									<td>Insurance Limits</td>
									<td>:</td>
									<td><?php echo $row["insurance_limits"]; ?></td>
								</tr>
								<tr></tr>
								<tr>
									<td>Google Map</td>
									<td>:</td>
									<td><?php echo $row["google_map"]; ?></td>
								</tr>
								<tr>
									<td>360 degree view</td>
									<td>:</td>
									<td><?php echo $row["360degree_view"]; ?></td>
								</tr>
							</tbody>
						</table>
						<?php } ?>
						<div class="db-mak-pay-bot">
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p> <a href="seller_update.php" class="waves-effect waves-light btn-large">Edit my profile</a> </div>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			
		</div>
	</section>
	<!--END DASHBOARD-->
	<!--MOBILE APP-->
	<section class="web-app com-padd">
		<div class="container">
			<div class="row">
				<div class="col-md-6 web-app-img"> <img src="images/mobile.png" alt="" /> </div>
				<div class="col-md-6 web-app-con">
					<h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>
					<ul>
						<li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>
						<li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>
						<li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>
						<li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>
					</ul> <span>We'll send you a link, open it on your phone to download the app</span>
					<form>
						<ul>
							<li>
								<input type="text" placeholder="+01" /> </li>
							<li>
								<input type="number" placeholder="Enter mobile number" /> </li>
							<li>
								<input type="submit" value="Get App Link" /> </li>
						</ul>
					</form>
					<a href="#"><img src="images/android.png" alt="" /> </a>
					<a href="#"><img src="images/apple.png" alt="" /> </a>
				</div>
			</div>
		</div>
	</section>
	<!--FOOTER SECTION-->
	<footer id="colophon" class="site-footer clearfix">
		<div id="quaternary" class="sidebar-container " role="complementary">
			<div class="sidebar-inner">
				<div class="widget-area clearfix">
					<div id="azh_widget-2" class="widget widget_azh_widget">
						<div data-section="section">
							<div class="container">
								<div class="row">
									<div class="col-sm-4 col-md-3 foot-logo"> <img src="images/foot-logo.png" alt="logo">
										<p class="hasimg">Worlds's No. 1 Local Business Directory Website.</p>
										<p class="hasimg">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
									</div>
									<div class="col-sm-4 col-md-3">
										<h4>Support & Help</h4>
										<ul class="two-columns">
											<li> <a href="advertise.html">Advertise us</a> </li>
											<li> <a href="about-us.html">About Us</a> </li>
											<li> <a href="customer-reviews.html">Review</a> </li>
											<li> <a href="how-it-work.html">How it works </a> </li>
											<li> <a href="add-listing.html">Add Business</a> </li>
											<li> <a href="#!">Register</a> </li>
											<li> <a href="#!">Login</a> </li>
											<li> <a href="#!">Quick Enquiry</a> </li>
											<li> <a href="#!">Ratings </a> </li>
											<li> <a href="trendings.html">Top Trends</a> </li>
										</ul>
									</div>
									<div class="col-sm-4 col-md-3">
										<h4>Popular Services</h4>
										<ul class="two-columns">
											<li> <a href="#!">Hotels</a> </li>
											<li> <a href="#!">Hospitals</a> </li>
											<li> <a href="#!">Transportation</a> </li>
											<li> <a href="#!">Real Estates </a> </li>
											<li> <a href="#!">Automobiles</a> </li>
											<li> <a href="#!">Resorts</a> </li>
											<li> <a href="#!">Education</a> </li>
											<li> <a href="#!">Sports Events</a> </li>
											<li> <a href="#!">Web Services </a> </li>
											<li> <a href="#!">Skin Care</a> </li>
										</ul>
									</div>
									<div class="col-sm-4 col-md-3">
										<h4>Cities Covered</h4>
										<ul class="two-columns">
											<li> <a href="#!">Atlanta</a> </li>
											<li> <a href="#!">Austin</a> </li>
											<li> <a href="#!">Baltimore</a> </li>
											<li> <a href="#!">Boston </a> </li>
											<li> <a href="#!">Chicago</a> </li>
											<li> <a href="#!">Indianapolis</a> </li>
											<li> <a href="#!">Las Vegas</a> </li>
											<li> <a href="#!">Los Angeles</a> </li>
											<li> <a href="#!">Louisville </a> </li>
											<li> <a href="#!">Houston</a> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div data-section="section" class="foot-sec2">
							<div class="container">
								<div class="row">
									<div class="col-sm-3">
										<h4>Payment Options</h4>
										<p class="hasimg"> <img src="images/payment.png" alt="payment"> </p>
									</div>
									<div class="col-sm-4">
										<h4>Address</h4>
										<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
										<p> <span class="strong">Phone: </span> <span class="highlighted">+01 1245 2541</span> </p>
									</div>
									<div class="col-sm-5 foot-social">
										<h4>Follow with us</h4>
										<p>Join the thousands of other There are many variations of passages of Lorem Ipsum available</p>
										<ul>
											<li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .widget-area -->
			</div>
			<!-- .sidebar-inner -->
		</div>
		<!-- #quaternary -->
	</footer>
	<!--COPY RIGHTS-->
	<section class="copy">
		<div class="container">
			<p>copyrights © <span id="cryear">2017</span> RN53Themes.net. &nbsp;&nbsp;All rights reserved. </p>
		</div>
	</section>
	<!--QUOTS POPUP-->
	<section>
		<!-- GET QUOTES POPUP -->
		<div class="modal fade dir-pop-com" id="list-quo" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header dir-pop-head">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title">Get a Quotes</h4>
						<!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
					</div>
					<div class="modal-body dir-pop-body">
						<form method="post" class="form-horizontal">
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Full Name *</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="fname" placeholder="" required> </div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Mobile</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="mobile" placeholder=""> </div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Email</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="email" placeholder=""> </div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Message</label>
								<div class="col-md-8 get-quo">
									<textarea class="form-control"></textarea>
								</div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<div class="col-md-6 col-md-offset-4">
									<input type="submit" value="SUBMIT" class="pop-btn"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- GET QUOTES Popup END -->
	</section>
	<!--SCRIPT FILES-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
</body>

</html>
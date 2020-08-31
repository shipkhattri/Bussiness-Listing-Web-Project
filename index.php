<?php
session_start();
include('db_conn.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>World Best Local Directory Website template</title>
    <?php include('head_links.php'); ?>
</head>
<body>
     <?php include('header.php'); ?>
	<section id="background1" class="dir1-home-head">
		<div class="container dir-ho-t-sp">
			<div class="row">
				<div class="dir-hr1">
					<div class="dir-ho-t-tit dir-ho-t-tit-2">
						<h1>Connect with the right Service Experts</h1> 
						<p>Find B2B & B2C businesses contact addresses, phone numbers,<br> user ratings and reviews.</p>
					</div>
						<div class="ts-menu-3">
						<div class="">
						<form method="POST" action="search.php">
						    <div class="row">
						    <div class="form-group mb-2">
							<select class="form-control" name="city">
										<option value="" disabled selected>Select City</option>
										<?php
										$q="SELECT * FROM city";
										 $res=mysqli_query($conn,$q);
                        				while($row = mysqli_fetch_array($res)) 
                        				{
										?>
										<option value="<?php echo $row["city"]; ?>"><?php echo $row["city"]; ?></option>
										<?php } ?>
																			
								</select>
								</div>
								<div class="form-group mx-sm-3 mb-2">
							<select class="form-control" name="category">
											<option value="" disabled selected>Select Category</option>
											<?php
											$sql="SELECT * FROM category";
											 $result=mysqli_query($conn,$sql);
                            				while($row = mysqli_fetch_array($result)) 
                            				{
											?>
											<option value="<?php echo $row["category"]; ?>"><?php echo $row["category"]; ?></option>
											<?php } ?>
																				
									</select>
									</div>
									<div class="form-group row">
							    <input type="submit" value="Search" name="select_search" class="waves-effect waves-light tourz-top-sear-btn">
						</div>
						</div>
						</form>
						</div></div>
				</div>
			</div>
		</div>
	</section>

	
	<!--BEST THINGS-->
	<section class="com-padd com-padd-redu-bot1">
		<div class="container dir-hom-pre-tit">
			<div class="row">
				<div class="com-title">
					<h2>Top Trendings for <span>your City</span></h2>
					<p>Explore some of the best tips from around the world from our partners and friends.</p>
				</div>
						<?php
						    $sql="SELECT * FROM seller_login WHERE live_status='1' ORDER BY price DESC LIMIT 10";
						    $result=mysqli_query($conn,$sql);
						    $i=0;
            				while($row = mysqli_fetch_array($result)) 
            				{
            				    if($i<5){
						?>
				<div class="col-md-6">
					<div>
						<!--POPULAR LISTINGS-->
						<div class="home-list-pop">
							<!--POPULAR LISTINGS IMAGE-->
							<div class="col-md-3"> <img src="images/services/tr2.jpg" alt="" /> </div>
							<!--POPULAR LISTINGS: CONTENT-->
							<div class="col-md-9 home-list-pop-desc"> <a href="property-listing-details.html"><h3><?php echo $row['title']; ?></h3></h3></a>
								<h4><?php echo $row['city']; ?>, <?php echo $row['country']; ?></h4>
								<p><?php echo $row['address']; ?></p> 
								<?php if($row['paid_status']=='1'){ ?>
            						<span class="home-list-pop-rat" >Paid</span>
            					<?php } ?>
								<?php if($row['mobile_verified']=='0'){ ?>
								    <span class="home-list-pop-rat" style="margin-top:30px;">Unverified</span>
    								<div class="hom-list-share" style="width:800px;">
    									<ul>
    										<li><a href="claim-business.php?id=<?php echo $row['id']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Claim this Business</a> </li>
    									</ul>
    								</div>
    							<?php } ?>
								<div class="hom-list-share">
									<ul>
										<li><a href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
										<li><a href="<?php echo $row['google']; ?>"><i class="fa fa-google" aria-hidden="true"></i></a> </li>
										<li><a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
									</ul>
								</div>
							</div>
						</div>
						<?php if($row['mobile_verified']!='0'){ ?>
						<div style="margin-top:70px;"></div>
						<?php } ?>
						<!--POPULAR LISTINGS END-->
					</div>
				</div>
				<?php } 
				else {
				?>
				<div class="col-md-6">
					<div>
						<!--POPULAR LISTINGS-->
						<div class="home-list-pop">
							<!--POPULAR LISTINGS IMAGE-->
							<div class="col-md-3"> <img src="images/services/tr2.jpg" alt="" /> </div>
							<!--POPULAR LISTINGS: CONTENT-->
							<div class="col-md-9 home-list-pop-desc"> <a href="property-listing-details.html"><h3><?php echo $row['title']; ?></h3></h3></a>
								<h4><?php echo $row['city']; ?>, <?php echo $row['country']; ?></h4>
								<p><?php echo $row['address']; ?></p> 
								<?php if($row['mobile_verified']=='0'){ ?>
								    <span class="home-list-pop-rat">Unverified</span>
    								<div class="hom-list-share" style="width:800px;">
    									<ul>
    										<li><a href="claim-business.php?id=<?php echo $row['id']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Claim this Business</a> </li>
    									</ul>
    								</div>
    							<?php }?>
								<div class="hom-list-share">
									<ul>
										<li><a href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
										<li><a href="<?php echo $row['google']; ?>"><i class="fa fa-google" aria-hidden="true"></i></a> </li>
										<li><a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
									</ul>
								</div>
							</div>
						</div>
						<!--POPULAR LISTINGS END-->
					</div>
				</div>
				<?php } $i++; } ?>
			</div>
		</div>
	</section>
	<!-- New ADDED -->
	<section class="dir-pa-sp-top">
		<div class="container com-padd dir-hom-pre-tit">
			<div class="com-title">
				<h2>New Businesses in<span> this month</span></h2>
				<p>Explore some of the best tips from around the world from our partners and friends.</p>
			</div>
			<div class="row span-none">
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/1.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$720</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Holiday Inn Express</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/3.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$380</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
								<h5>Staybridger Suites</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/2.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>InterContinental</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/4.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$720</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Starboard Red Wines</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/5.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$380</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
								<h5>Pet Shops</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/6.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Philly Honeymoon Packages</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/7.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Shake Fashions</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/8.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Sparrow Chicken</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/9.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Big Jack T-stall</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/10.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Continental Shopiing Street</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/11.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Flow Flower Shop</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/12.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Maths Tuitions Centre</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/13.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Indian Grill Chicken</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/14.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Suprime Car ShowRoom</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#!">
						<div class="list-mig-like-com com-mar-bot-30">
							<div class="list-mig-lc-img"> <img src="images/listing/15.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
							<div class="list-mig-lc-con">
								<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
								<h5>Joney Supermarket</h5>
								<p>Illinois City,</p>
							</div>
						</div>
					</a>
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
<?php
    session_start();
    include("db_conn.php");
    if (isset($_POST["submit_city"]))
{
    	$city = $_POST["city"];
		$sql = "INSERT INTO `city`(`city`) VALUES ('".$city."')";	
		$result=mysqli_query($conn,$sql);
		header("location:register.php");
}

if (isset($_POST["submit_category"]))
{
    	$category = $_POST["category"];
		$sql = "INSERT INTO `category`(`category`) VALUES ('".$category."')";	
		$result=mysqli_query($conn,$sql);
		header("location:register.php");
}
    if (isset($_POST['submit']))
    {
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $title=$_POST['title'];
                $phone=$_POST['phone'];
                $email=$_POST['email'];
                $addr=$_POST['address'];
                $country=$_POST['country'];
                $state=$_POST['state'];
                $city=$_POST['c'];
                $area=$_POST['area'];
                
                $c=$_POST['cat'];
                $q1="SELECT category FROM category WHERE id='$c'";
                $res=mysqli_query($conn,$q1);
                while($r = mysqli_fetch_array($res)) 
                {
                    $category = $r['category'];
                }
                $subcategory=$_POST['subcat'];
                
                //$days=$_POST['days'];
                $days="";
            foreach ($_POST['days'] as $value) {
                $days.= $value.", ";
            }
                $open_time=$_POST['open_time'];
                $closing_time=$_POST['close_time'];
                $desc=$_POST['description'];
                $fb=$_POST['facebook'];
                $google=$_POST['google'];
                $twitter=$_POST['twitter'];
                $img=$_POST['img'];
                if($img)
                {
                $query="INSERT INTO `seller_login`(`username`, `email`, `mobile`, `password`, `email_verified`, `mobile_verified`, `live_status`, 
                `paid_status`, `price`, `firstname`, `lastname`, `title`, `address`, `country`,`state`, `city`, `area`, `category`, `subcategory`, `days`, 
                `open_time`, `closing_time`, `description`, `facebook`, `google`, `twitter`, `cover_image`) VALUES(' ', '$email', '$phone', ' ', 
                ' 0','0','1', '0', '0', '$fname', '$lname','$title','$addr', '$country','$city' ,'$category', '$subcategory', '$days','$open_time',
                '$closing_time','$desc','$fb','$google','$twitter','$img')"; 
                }else{
                    $query="INSERT INTO `seller_login`(`username`, `email`, `mobile`, `password`, `email_verified`, `mobile_verified`, `live_status`, 
                `paid_status`, `price`, `firstname`, `lastname`, `title`, `address`, `country`, `city`, `category`, `subcategory`, `days`, 
                `open_time`, `closing_time`, `description`, `facebook`, `google`, `twitter`) VALUES(' ', '$email', '$phone', ' ', ' 0','0','1', '0',
                '0', '$fname', '$lname','$title','$addr', '$country', '$state', '$city', '$area', '$category', '$subcategory', '$days','$open_time', 
                '$closing_time', '$desc','$fb','$google','$twitter')"; 
                }
                if(mysqli_query($conn,$query))
                {
                    echo '<script type="text/javascript">
                               window.onload = function () 
                           { alert("Successfully added");
                               window.location= "index.php"; 
                           }
                            </script>';
                }
                else
                {
                    echo "Error description:" . mysqli_error($conn);
                }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>World Best Local Directory Website template</title>
	<?php include('head_links.php'); ?>
    <script language="Javascript" src="jquery.js"></script>
    <script type="text/JavaScript" src='state.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script >
		function hidereg2() {
	
				document.getElementById('sellerInfo2').style.display='block';
		}
			function hidereg3() {
		
				document.getElementById('sellerInfo3').style.display='block';
		}
		
		
</script>
</head>

<body>
	<?php include('header.php'); ?>
	<!--DASHBOARD-->
	<section>
		<div class="tz">
			<!--CENTER SECTION-->
			<div class="tz-2" style="margin-left:250px;">
				<div class="tz-2-com tz-2-main">
					<h4>Add Business</h4>
					<div class="db-list-com tz-db-table">
						<div class="hom-cre-acc-left hom-cre-acc-right">
							<div class="">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="row">
										<div class="input-field col s6">
											<input id="first_name" name="fname" type="text" class="validate" required>
											<label for="first_name">First Name</label>
										</div>
										<div class="input-field col s6">
											<input id="last_name" name="lname" type="text" class="validate">
											<label for="last_name">Last Name</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="list_name"  name="title" type="text" class="validate" required>
											<label for="list_name">Listing Title</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="list_phone" name="phone" type="text" class="validate" pattern="[\d*]{10,}" maxlength="10" title="Phone number must contain 10 digits" required>
											<label for="list_phone">Phone</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="email" name="email" type="email" class="validate" required>
											<label for="email">Email</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="list_addr" name="address" type="text" class="validate" required>
											<label for="list_addr">Address</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<select name="country" class="countries" id="countryId" required>
											    <option value="" disabled selected>Select Country</option>
											    <option value="India">India</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<select name="state" class="state" id="stateId" required>
											    <option value="" disabled selected>Select State</option>
											    <option value="Delhi">Delhi</option>
											</select>
										</div>
									</div>
							<div class="row">
								<div class="input-field col s10">
								    <select name="c" required>
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
								<div class="input-field col s1">
									<a id="cat"  onclick="hidereg3()" class="btn-floating"><i class="material-icons">add</i></a>
								</div>
							</div>
							<div id="sellerInfo3" style="display:none;">
							    <div class="row">
									<div class="input-field col s9">
            						    <div class="input-field s12">
                						    <input type="text"  name="city" class="validate" >
                							<label>Add New City</label>
                						</div>
                					</div>
                					<div class="input-field col s2">
										<input type="submit" name="submit_city" value="ADD" class="waves-effect waves-light ">
									</div>
        						</div>	
					    	</div>
					    	<div class="row">
								<div class="input-field col s12">
									<input id="area" name="area" type="text" class="validate" required>
									<label for="area">Area</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s10">
									<select name="cat" id="category" required>
											<option value="" disabled selected>Select Category</option>
											<?php
											$sql="SELECT * FROM category";
											 $result=mysqli_query($conn,$sql);
                            				while($row = mysqli_fetch_array($result)) 
                            				{
											?>
											<option value="<?php echo $row["id"]; ?>"><?php echo $row["category"]; ?></option>
											<?php } ?>
																				
									</select>
								</div>
								<div class="input-field col s1">
									<a id="cat"  onclick="hidereg2()" class="btn-floating"><i class="material-icons">add</i></a>
								</div>
							</div>
								
							<div id="sellerInfo2" style="display:none;">
							    <div class="row">
									<div class="input-field col s9">
            						    <div class="input-field s12">
                						    <input type="text"  name="category" class="validate" >
                							<label>Add New category</label>
                						</div>
                					</div>
                					<div class="input-field col s2">
										<input type="submit" name="submit_category" value="ADD" class="waves-effect waves-light ">
									</div>
        						</div>
    						</div>
    						<div class="input-field col s10">
    						    Select Subcategory: <br>
								<div id="sc">
								    
								</div>
								<br><br>
								</div>
									<div class="row">
										<div class="input-field col s12">
											<select multiple name="days[]" required>
												<option disabled selected>Opening Days</option>
												<option value="All Days">All Days</option>
												<option value="Monday">Monday</option>
												<option value="Tuesday">Tuesday</option>
												<option value="Wednesday">Wednesday</option>
												<option value="Thursday">Thursday</option>
												<option value="Friday">Friday</option>
												<option value="Saturday">Saturday</option>
												<option value="Sunday">Sunday</option>
											</select>
										</div>
									</div>
								<div class="row">
									<div class="input-field col s6">
										<select name="open_time">
											<option disabled selected>Open Time</option>
											<option value="12:00 AM">12:00 AM</option>
											<option value="01:00 AM">01:00 AM</option>
											<option value="02:00 AM">02:00 AM</option>
											<option value="03:00 AM">03:00 AM</option>
											<option value="04:00 AM">04:00 AM</option>
											<option value="05:00 AM">05:00 AM</option>
											<option value="06:00 AM">06:00 AM</option>
											<option value="07:00 AM">07:00 AM</option>
											<option value="08:00 AM">08:00 AM</option>
											<option value="09:00 AM">09:00 AM</option>
											<option value="10:00 AM">10:00 AM</option>
											<option value="11:00 AM">11:00 AM</option>
											<option value="12:00 PM">12:00 PM</option>
											<option value="01:00 PM">01:00 PM</option>
											<option value="02:00 PM">02:00 PM</option>
											<option value="03:00 PM">03:00 PM</option>
											<option value="04:00 PM">04:00 PM</option>
											<option value="05:00 PM">05:00 PM</option>
											<option value="06:00 PM">06:00 PM</option>
											<option value="07:00 PM">07:00 PM</option>
											<option value="08:00 PM">08:00 PM</option>
											<option value="09:00 PM">09:00 PM</option>
											<option value="10:00 PM">10:00 PM</option>
											<option value="11:00 PM">11:00 PM</option>											
										</select>
									</div>
									<div class="input-field col s6">
										<select name="close_time">
											<option value="" disabled selected>Closing Time</option>
											<option value="12:00 AM">12:00 AM</option>
											<option value="01:00 AM">01:00 AM</option>
											<option value="02:00 AM">02:00 AM</option>
											<option value="03:00 AM">03:00 AM</option>
											<option value="04:00 AM">04:00 AM</option>
											<option value="05:00 AM">05:00 AM</option>
											<option value="06:00 AM">06:00 AM</option>
											<option value="07:00 AM">07:00 AM</option>
											<option value="08:00 AM">08:00 AM</option>
											<option value="09:00 AM">09:00 AM</option>
											<option value="10:00 AM">10:00 AM</option>
											<option value="11:00 AM">11:00 AM</option>
											<option value="12:00 PM">12:00 PM</option>
											<option value="01:00 PM">01:00 PM</option>
											<option value="02:00 PM">02:00 PM</option>
											<option value="03:00 PM">03:00 PM</option>
											<option value="04:00 PM">04:00 PM</option>
											<option value="05:00 PM">05:00 PM</option>
											<option value="06:00 PM">06:00 PM</option>
											<option value="07:00 PM">07:00 PM</option>
											<option value="08:00 PM">08:00 PM</option>
											<option value="09:00 PM">09:00 PM</option>
											<option value="10:00 PM">10:00 PM</option>
											<option value="11:00 PM">11:00 PM</option>
										</select>
									</div>
								</div>
									<div class="row"> </div>
									<div class="row">
										<div class="input-field col s12">
											<textarea id="textarea1" name="description" class="materialize-textarea"></textarea>
											<label for="textarea1">Listing Descriptions</label>
										</div>
									</div>
									<div class="row">
										<div class="db-v2-list-form-inn-tit">
											<h5>Social Media Informations:</h5>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="text" name="facebook" class="validate">
											<label>www.facebook.com/directory</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="text" name="google" class="validate">
											<label>www.googleplus.com/directory</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="text" name="twitter" class="validate">
											<label>www.twitter.com/directory</label>
										</div>
									</div>	
									<div class="row tz-file-upload">
										<div class="file-field input-field">
											<div class="tz-up-btn"> <span>File</span>
												<input type="file" id="img" name="img" accept="image/*" placeholder="upload cover image"></div>
											<div class="file-path-wrapper db-v2-pg-inp">
												<input class="file-path validate" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 v2-mar-top-40"> <button class="waves-effect waves-light btn-large full-btn" name="submit">Add Business</button></div>
									</div>
								</form>
							</div>
						</div>
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
	
<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
		
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sc").html(dataResult);
				}
			});
		
		
	});
});
</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
</body>

</html>
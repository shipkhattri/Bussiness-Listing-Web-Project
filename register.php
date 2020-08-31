<?php
ob_start();
session_start();
include('db_conn.php');
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
  
    	
    	
if (isset($_POST["submit_signup"]))
{
	$username = $_POST["username"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$password = $_POST["password"];
	$c_password = $_POST["confirm_password"];
	$city2 = $_POST["s_city"];
	$category2 = $_POST["s_category"];
    					
     if($_POST['abc']=='seller')
     {
    	 $check_query = "
    	 SELECT * FROM seller_login 
    	 WHERE username = :username
    	 ";
    	 $statement = $connect->prepare($check_query);
    	 $check_data = array(
    	  ':username'  => $username
    	 );
    	 if($statement->execute($check_data)) 
    	 {
    	  if($statement->rowCount() > 0)
    	  {
    		echo '<script type="text/javascript">
    		window.onload = function () 
    		{ alert("Username already taken !"); }
    		</script>';
    	  }
    	  else
    	  {
    		if($password != $c_password)
    		{
    			echo '<script type="text/javascript">
    					window.onload = function () 
    					{ alert("Password and Confirm password not matched !"); }
    					</script>';
    		}
    		else{
    			$sql = "INSERT INTO `seller_login`(`username`, `email`, `mobile`, `password`,`city`, `category`, `email_verified`, `mobile_verified`, `live_status` ) VALUES ('".$username."', '".$email."', '".$mobile."', '".$password."', '".$city2."','".$category2."', 0,0,0)";	
    			if(mysqli_query($conn,$sql))
                {
                    echo '<script type="text/javascript">
                               window.onload = function () 
                           { alert("Successfully added");
                               window.location= "login.php"; 
                           }
                            </script>';
                }
                else
                {
                    echo "Error description:" . mysqli_error($conn);
                }
    		}
          }
         }
        
    }
     if($_POST['abc']=='user')
    {
    	 $check_query = "
    	 SELECT * FROM user_login 
    	 WHERE username = :username
    	 ";
    	 $statement = $connect->prepare($check_query);
    	 $check_data = array(
    	  ':username'  => $username
    	 );
    	 if($statement->execute($check_data)) 
    	 {
    	  if($statement->rowCount() > 0)
    	  {
    		echo '<script type="text/javascript">
    		window.onload = function () 
    		{ alert("Username already taken !"); }
    		</script>';
    	  }
    	  else
    	  {
    		if($password != $c_password)
    		{
    			echo '<script type="text/javascript">
    					window.onload = function () 
    					{ alert("Password and Confirm password not matched !"); }
    					</script>';
    		}
    		else{
    			$sql = "INSERT INTO `user_login`( `username`, `email`, `password`, `mobile`, `verified`) VALUES ('".$username."', '".$email."', '".$password."', '".$mobile."', '0')";	
    			$result=mysqli_query($conn,$sql);
    			
                $_SESSION['user_both_otp']=rand(100000,999999);
                $_SESSION['new_username'] = $username;
                
    			header("location:user-otp.php");			
    		}
          }
         }
        
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>World Best Local Directory Website template</title>
	<?php include('head_links.php'); ?>
	<script >
	function hidereg() {
			if(document.getElementById('s').checked)
			{
				document.getElementById('sellerInfo').style.display='block';
			}
			else
			{
				document.getElementById('sellerInfo').style.display='none';
			}
			
			
	}
	
		function hidereg2() {
		
				document.getElementById('sellerInfo2').style.display='block';
		}
			function hidereg3() {
		
				document.getElementById('sellerInfo3').style.display='block';
		}
</script>
</head>

<body data-ng-app="">
    <?php include('header.php'); ?>
	<section class="tz-register">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span>{{ name1 }}</span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
					</a>
					<h4>Create an Account</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12" action="" method="POST">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name1"  name="username" class="validate">
								<label>User name</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="email"  name="email" class="validate" >
								<label>Email id</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="text"  name="mobile" title="Phone number must contain 10 digits" pattern="[\d*]{10,}" maxlength="10" required class="validate" >
								<label>Mobile No</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" id="password" name="password" class="validate" >
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" id="confirm_password" name="confirm_password" class="validate" >
								<label>Confirm password</label>
							</div>
						</div>
						<div>
														
						<input type="radio" id="u" name="abc" value="user" onclick="hidereg()" >
                        <label for="u">User</label>
                        <input type="radio" id="s" name="abc" value="seller" onclick="hidereg()" checked>
                        <label for="s">Seller</label><br>
                        												
						</div>
						<br>
						<div id="sellerInfo">
						    <div class="row">
								<div class="input-field col s10">
									<select name="s_category">
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
										<input type="submit" name="submit_category" value="ADD" class="waves-effect waves-light log-in-btn">
									</div>
        						</div>
    						</div>
						  <div class="row">
								<div class="input-field col s10">
								    <select name="s_city">
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
										<input type="submit" name="submit_city" value="ADD" class="waves-effect waves-light log-in-btn">
									</div>
        						</div>	
					    	</div>
    						
				</div>
				<div>
    							<div class="input-field s4">
    								<input type="submit" name="submit_signup" value="Register" class="waves-effect waves-light log-in-btn"> </div>
    						</div>
					
    						<div>
    							<div class="input-field s12"> <a href="login.php">Are you a already member ? Login</a> </div>
    						</div>
					    </form>
			</div>
	</section>
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
	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
</body>

</html>
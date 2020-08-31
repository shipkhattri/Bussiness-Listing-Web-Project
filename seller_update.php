<?php
session_start();
include('db_conn.php');
if(!isset($_SESSION['user_id']))
{
 header("location:logout.php");
}
$_SESSION['mobile_otp']=rand(100000,999999);
$_SESSION['email_otp']=rand(100000,999999);

 if (isset($_POST["submit_city"]))
{
    	$city = $_POST["city"];
		$sql = "INSERT INTO `city`(`city`) VALUES ('".$city."')";	
		$result=mysqli_query($conn,$sql);
		header("location:seller_update.php");
}

if (isset($_POST["submit_category"]))
{
    	$category = $_POST["category"];
		$sql = "INSERT INTO `category`(`category`) VALUES ('".$category."')";	
		$result=mysqli_query($conn,$sql);
		header("location:seller_update.php");
}

if (isset($_POST['submit']))
    {
                $id=$_SESSION['user_id'];
                $uname=$_POST['username'];
                $pass=$_POST['password'];
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $title=$_POST['title'];
                $phone=$_POST['phone'];
                $email=$_POST['email'];
                $addr=$_POST['address'];
                $type=$_POST['type'];
                $country=$_POST['country'];
                $city=$_POST['c'];
                
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
                $service_guarantee=$_POST['service_guarantee'];
                $professionals=$_POST['professionals'];
                $insurance_limits=$_POST['insurance_limits'];
                $gmap=$_POST['gmap'];
                $dview=$_POST['dview'];

                $t1 = "img/1".time().".jpg";
                $t2 = "img/2".time().".jpg";
                $t3 = "img/3".time().".jpg";
                $t4 = "img/4".time().".jpg";
                $t5 = "img/5".time().".jpg";
                $t6 = "img/6".time().".jpg";
                $t7 = "img/7".time().".jpg";
                $t8 = "img/8".time().".jpg";

                $img1= $_FILES['img1']['name'];
                $img2= $_FILES['img2']['name'];
                $img3= $_FILES['img3']['name'];
                $img4= $_FILES['img4']['name'];
                $img5= $_FILES['img5']['name'];
                $img6= $_FILES['img6']['name'];
                $img7= $_FILES['img7']['name'];
                $img8= $_FILES['img8']['name'];

                move_uploaded_file($_FILES['img1']['tmp_name'],$t1);
                move_uploaded_file($_FILES['img2']['tmp_name'],$t2);
                move_uploaded_file($_FILES['img3']['tmp_name'],$t3);
                move_uploaded_file($_FILES['img4']['tmp_name'],$t4);
                move_uploaded_file($_FILES['img5']['tmp_name'],$t5);
                move_uploaded_file($_FILES['img6']['tmp_name'],$t6);
                move_uploaded_file($_FILES['img7']['tmp_name'],$t7);
                move_uploaded_file($_FILES['img8']['tmp_name'],$t8);


                $query="UPDATE `seller_login` SET username='$uname', password='$pass', firstname='$fname', lastname='$lname', title='$title', mobile='$phone', email='$email', address='$addr', type='$type', country='$country',
                city='$city', category='$category', subcategory='$subcategory', days='$days', open_time='$open_time', closing_time='$closing_time', description='$desc', facebook='$fb', google='$google', twitter='$twitter', 
                service_guarantee='$service_guarantee', professionals='$professionals', insurance_limits='$insurance_limits', google_map='$gmap', 360degree_view='$dview' WHERE id='$id' "; 
                if(mysqli_query($conn,$query))
                {
                    echo '<script type="text/javascript">
                               window.onload = function () 
                           { alert("Successfully updated");}
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
<script type="JavaScript" src='state.js'></script>
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
						<li><img src="images/db-profile.jpg" alt="" /> </li>
						<li><span>80%</span> profile compl</li>
						<li><span>18</span> Notifications</li>
					</ul>
					<div style="padding:20px;">
						<a href="otp.php?type=e8v3" class="db-list-edit">Verify Email</a>
						<a href="otp.php?type=m94x" class="db-list-edit">Verify Mobile No</a>
					</div>
				</div>
				<div class="tz-l-2">
					<ul>
						<li>
							<a href="dashboard.php" ><img src="images/icon/dbl6.png" alt="" /> My Profile</a>
						</li>
						<li>
							<a href="seller_update.php" class="tz-lma"><img src="images/icon/dbl3.png" alt="" /> Update Profile </a>
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
					<h4>Update Listings</h4>
					<div class="db-list-com tz-db-table">
						<div class="hom-cre-acc-left hom-cre-acc-right">
							<div class="">
							    
						<?php
						    $id=$_SESSION['user_id'];
						    $sql = "SELECT * FROM seller_login WHERE id='$id' ";	
		                    $result=mysqli_query($conn,$sql);
            				while($row = mysqli_fetch_array($result)) 
            				{
						?>
								<form method="post" action="" class="" enctype="multipart/form-data">
									<div class="row">
										<div class="input-field col s6">
											<input id="username" name="username" type="text" class="validate" value="<?php echo $row["username"]; ?>">
											<label for="user_name">User Name</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="password" name="password" type="text" class="validate" value="<?php echo $row["password"]; ?>">
											<label for="user_name">Password</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="first_name" name="fname" type="text" class="validate" value="<?php echo $row["firstname"]; ?>">
											<label for="first_name">First Name</label>
										</div>
										<div class="input-field col s6">
											<input id="last_name" name="lname" type="text" class="validate" value="<?php echo $row["lastname"]; ?>">
											<label for="last_name">Last Name</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="list_phone" name="phone" type="text" class="validate" value="<?php echo $row["mobile"]; ?>">
											<label for="list_phone">Phone</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="email" name="email" type="email" class="validate" value="<?php echo $row["email"]; ?>">
											<label for="email">Email</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="list_addr" name="address" type="text" class="validate" value="<?php echo $row["address"]; ?>">
											<label for="list_addr">Address</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="list_name"  name="title" type="text" class="validate" value="<?php echo $row["title"]; ?>">
											<label for="list_name">Listing Title</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<select name="type">
												<option value="<?php echo $row["type"]; ?>" selected><?php echo $row["type"]; ?></option>
												<option value="Free">Free</option>
												<option value="Premium">Premium</option>
												<option value="Premium Plus">Premium Plus</option>
												<option value="Ultra Premium Plus">Ultra Premium Plus</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<select name="country" class="countries" id="countryId" >
											    <option value="<?php echo $row["country"]; ?>" selected><?php echo $row["country"]; ?></option>
											    <option value="India">India</option>
											    <option value="Other">Other</option>
											</select>
										</div>
									</div>
							<div class="row">
								<div class="input-field col s10">
								    <select name="c" required>
										<option value="<?php echo $row["city"]; ?>" selected><?php echo $row["city"]; ?></option>
										<?php
											$q="SELECT * FROM city";
											 $res=mysqli_query($conn,$q);
                            				while($r1 = mysqli_fetch_array($res)) 
                            				{
											?>
											<option value="<?php echo $r1["city"]; ?>"><?php echo $r1["city"]; ?></option>
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
								<div class="input-field col s10">
									<select name="cat" id="category" required>
											<option value="<?php echo $row["category"]; ?>" selected><?php echo $row["category"]; ?></option>
											<?php
    											$sql="SELECT * FROM category";
    											 $result=mysqli_query($conn,$sql);
                                				while($r= mysqli_fetch_array($result)) 
                                				{
    											?>
    											<option value="<?php echo $r["id"]; ?>"><?php echo $r["category"]; ?></option>
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
								    <input type="radio" id="<?php echo $row["id"];?>" name="subcat" value="<?php echo $row["subcategory"];?>" checked>
                                    <label for="<?php echo $row["id"];?>"><?php echo $row["subcategory"];?></label><br>
								</div>
								<br><br>
								</div>
									<div class="row">
										<div class="input-field col s12">
											<select multiple name="days[]" >
												<option value="<?php echo $row["days"]; ?>" selected><?php echo $row["days"]; ?></option>
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
										<select name="open_time" >
											<option value="<?php echo $row["open_time"]; ?>" selected><?php echo $row["open_time"]; ?></option>
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
										<select name="close_time" >
											<option value="<?php echo $row["closing_time"]; ?>"  selected><?php echo $row["closing_time"]; ?></option>
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
											<textarea id="textarea1" name="description" class="materialize-textarea"><?php echo $row["description"]; ?></textarea>
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
											<input type="text" name="facebook" class="validate" value="<?php echo $row["facebook"]; ?>">
											<label>www.facebook.com/directory</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="text" name="google" class="validate" value="<?php echo $row["google"]; ?>">
											<label>www.googleplus.com/directory</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="text" name="twitter" class="validate" value="<?php echo $row["twitter"]; ?>">
											<label>www.twitter.com/directory</label>
										</div>
									</div>	
									<div class="row">
										<div class="db-v2-list-form-inn-tit">
											<h5>Listing Guarantee:</h5>
										</div>
									</div>	
									<div class="row">
										<div class="input-field col s12">
											<select name="service_guarantee">
												<option  value="<?php echo $row["service_guarantee"]; ?>" selected><?php echo $row["service_guarantee"]; ?></option>
												<option value="Upto 2 month of service">Upto 2 month of service</option>
												<option value="Upto 6 month of service">Upto 6 month of service</option>
												<option value="Upto 1 year of service">Upto 1 year of service</option>
												<option value="Upto 2 year of service">Upto 2 year of service</option>
												<option value="Upto 5 year of service">Upto 5 year of service</option>
											</select>
										</div>
									</div>									
									<div class="row">
										<div class="input-field col s12">
											<select name="professionals" >
												<option value="<?php echo $row["professionals"]; ?>" selected><?php echo $row["professionals"]; ?></option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
									</div>									
									<div class="row">
										<div class="input-field col s12">
											<select name="insurance_limits" >
												<option value="<?php echo $row["insurance_limits"]; ?>" selected><?php echo $row["insurance_limits"]; ?></option>
												<option value="Upto $5,000">Upto $5,000</option>
												<option value="Upto $10,000">Upto $10,000</option>
												<option value="Upto $15,000">Upto $15,000</option>
											</select>
										</div>
									</div>	
									<div class="row">
										<div class="db-v2-list-form-inn-tit">
											<h5>Google Map:</h5>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="text" name="gmap" class="validate" value="<?php echo $row["google_map"]; ?>">
											<label>Paste your iframe code here</label>
										</div>
									</div>
									<div class="row">
										<div class="db-v2-list-form-inn-tit">
											<h5>360 Degree View:</h5>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input type="text" name="dview" class="validate" value="<?php echo $row["360degree_view"]; ?>">
											<label>Paste your iframe code here</label>
										</div>
									</div>									
									<div class="row">
										<div class="db-v2-list-form-inn-tit">
											<h5>Cover Image <span class="v2-db-form-note">(image size 1350x500):<span></h5>
										</div>
									</div>
									<div class="row tz-file-upload">
										<div class="file-field input-field">
											<div class="tz-up-btn"> <span>File</span>
												<input type="file" id="img1" name="img1" accept="image/*"></div>
											<div class="file-path-wrapper db-v2-pg-inp">
												<input class="file-path validate" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="db-v2-list-form-inn-tit">
											<h5>Photo Gallery <span class="v2-db-form-note">(upload multiple photos note:size 750x500):<span></h5>
										</div>
									</div>
									<div class="row tz-file-upload">
										<div class="file-field input-field">
											<div class="tz-up-btn"> <span>File</span>
												<input type="file" id="img2" name="img2" accept="image/*" multiple> </div>
											<div class="file-path-wrapper db-v2-pg-inp">
												<input class="file-path validate" type="text"> 
											</div>
										</div>
									</div>									
									<div class="row">
										<div class="db-v2-list-form-inn-tit">
											<h5>Services Offered <span class="v2-db-form-note">(Enter service name and upload service image note:size 400x250):<span>:</h5>
										</div>
									</div>	
									<div class="row">
										<div class="input-field col s6">
											<input type="text" class="validate" >
											<label>Service Name (ex:Room Booking)</label>
										</div>
										<div class="col s6">
											<div class="row tz-file-upload">
												<div class="file-field input-field">
													<div class="tz-up-btn"> <span>File</span>
														<input type="file" id="img3" name="img3" accept="image/*"> </div>
													<div class="file-path-wrapper db-v2-pg-inp">
														<input class="file-path validate" type="text"> 
													</div>
												</div>
											</div>
										</div>										
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input type="text" class="validate">
											<label>Service Name (ex:Java Development)</label>
										</div>
										<div class="col s6">
											<div class="row tz-file-upload">
												<div class="file-field input-field">
													<div class="tz-up-btn"> <span>File</span>
														<input type="file" id="img4" name="img4" accept="image/*"> </div>
													<div class="file-path-wrapper db-v2-pg-inp">
														<input class="file-path validate" type="text"> 
													</div>
												</div>
											</div>
										</div>										
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input type="text" class="validate">
											<label>Service Name (ex:Home Lones)</label>
										</div>
										<div class="col s6">
											<div class="row tz-file-upload">
												<div class="file-field input-field">
													<div class="tz-up-btn"> <span>File</span>
														<input type="file" id="img5" name="img5" accept="image/*"> </div>
													<div class="file-path-wrapper db-v2-pg-inp">
														<input class="file-path validate" type="text"> 
													</div>
												</div>
											</div>
										</div>										
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input type="text" class="validate">
											<label>Service Name (ex:Property Rent)</label>
										</div>
										<div class="col s6">
											<div class="row tz-file-upload">
												<div class="file-field input-field">
													<div class="tz-up-btn"> <span>File</span>
														<input type="file" id="img6" name="img6" accept="image/*"> </div>
													<div class="file-path-wrapper db-v2-pg-inp">
														<input class="file-path validate" type="text"> 
													</div>
												</div>
											</div>
										</div>										
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input type="text" class="validate">
											<label>Service Name (ex:Job Trainings)</label>
										</div>
										<div class="col s6">
											<div class="row tz-file-upload">
												<div class="file-field input-field">
													<div class="tz-up-btn"> <span>File</span>
														<input type="file" id="img7" name="img7" accept="image/*"> </div>
													<div class="file-path-wrapper db-v2-pg-inp">
														<input class="file-path validate" type="text"> 
													</div>
												</div>
											</div>
										</div>										
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input type="text" class="validate">
											<label>Service Name (ex:Travels)</label>
										</div>
										<div class="col s6">
											<div class="row tz-file-upload">
												<div class="file-field input-field">
													<div class="tz-up-btn"> <span>File</span>
														<input type="file" id="img8" name="img8" accept="image/*"> </div>
													<div class="file-path-wrapper db-v2-pg-inp">
														<input class="file-path validate" type="text"> 
													</div>
												</div>
											</div>
										</div>										
									</div>									
									<div class="row">
										<div class="input-field col s12 v2-mar-top-40"> <button class="waves-effect waves-light btn-large full-btn" name="submit">Update Listing</button></div>
									</div>
								</form>
								<?php } ?>
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
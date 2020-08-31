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
<script type="JavaScript" src='state.js'></script>
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
    <?php include('admin-header.php'); ?>
			<!--== BODY INNER CONTAINER ==-->
			<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="#"> Add Listing</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Add New Listing</h4>
						<!-- Dropdown Structure -->
						<div class="split-row">
				        <div class="tz-2-com tz-2-main">
						<div class="hom-cre-acc-left hom-cre-acc-right">
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
		</div>
	<!--== BOTTOM FLOAT ICON ==-->
	<section>
		<div class="fixed-action-btn vertical">
			<a class="btn-floating btn-large red pulse"> <i class="large material-icons">mode_edit</i> </a>
			<ul>
				<li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a> </li>
				<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a> </li>
				<li><a class="btn-floating green"><i class="material-icons">publish</i></a> </li>
				<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a> </li>
			</ul>
		</div>
	</section>
	<!--SCRIPT FILES-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
</body>

</html>
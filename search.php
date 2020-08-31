<?php
ob_start();
session_start();
include('db_conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$city = "";
$category = "";
$subcategory="";
if(isset($_POST['select_search']))
{
    $c=$_POST['category'];
    $q1="SELECT category FROM category WHERE id='$c'";
    $res=mysqli_query($conn,$q1);
    while($r = mysqli_fetch_array($res)) 
    {
        $category = $r['category'];
    }
$city = $_POST["city"];
$subcategory=$_POST['subcat'];

}
 	    
    function writeEmail($email,$text2) {

    $address=$email;
 // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
       
        
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isMail();                                            // Send using SMTP
        $mail->Host       = 'localhost';                    // Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@marketing90sec.com';                     // SMTP username
        $mail->Password   = 'Z8EbftRARKMy74#cT3*vuo23';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('info@marketing90sec.com','Search Results');
        $mail->addAddress($email);     // Add a recipient
        $mail->addAddress($email);               // Name is optional
        $mail->addReplyTo('info@marketing90sec.com','info');
     
        // Content
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->Subject = 'Search Results';
        $mail->Body    = "Your Search Results are:\n\n".$text2;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
     
    }
    }
    
    
if(isset($_SESSION['type']))
{
 if($_SESSION['type']=="user"){
     $text="";
      $sql2="SELECT * FROM seller_login WHERE live_status='1' AND city LIKE '%$city%' AND category LIKE '%$category%' AND subcategory LIKE '%$subcategory%' ORDER BY PRICE DESC LIMIT 5";
	    $result2=mysqli_query($conn,$sql2);
	    $i=1;
	    $text_business="This user Viewed Your Business \nName: ".$_SESSION['name']."\nEmail: ".$_SESSION['email']."\nMob :".$_SESSION['mobile'];
		while($row = mysqli_fetch_array($result2)) 
		{
		    $text.=$i.". ".$row['title']." ( ". $row['email'].", ". $row['mobile']." )\n";
		    $i+=1;
		    writeEmail($row['email'],$text_business);
		}
            $mobile = $_SESSION['mobile'];
    		$url = 'http://bhashsms.com/api/sendmsg.php?user=krishnaku&pass=123456&sender=KRISHN&phone='.$mobile.'&text='.$text.'&priority=ndnd&stype=normal';
    		$array = get_headers($url);
    	
    		$string = $array[0];
    		if(strpos($string,"200")) {
    		} else {
    				/*echo '<script type="text/javascript">
				window.onload = function () 
				{ alert("text'.$mobile.'"); }
				</script>';*/
    		}
    	    
    	    writeEmail($_SESSION['email'],$text);
   
	
 }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>World Best Local Directory Website template</title>
	<?php include('head_links.php') ?>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include('header.php') ?>
	<section class="dir-alp dir-pa-sp-top">
		<div class="container">
			<div class="row">
				<div class="dir-alp-tit">
					<h1>Search</h1>	
				</div>
			</div>
			<div class="row">
				<div class="dir-alp-con">
					<div class="col-md-3 dir-alp-con-left">
					
						<!--==========Sub Category Filter============-->
						<div class="dir-alp-l3 dir-alp-l-com" >
							<h4>Filters</h4>
								<form action="search.php" method="POST">
									<ul>
										<li>
    										<select  name="city">
        										<option value="" disabled selected>Select City</option>
        										<?php
        										$q="SELECT * FROM city";
        										 $res=mysqli_query($conn,$q);
                                				while($row = mysqli_fetch_array($res)) 
                                				{
        										?>
        										<option value="<?php echo $row["city"]; ?>"><?php echo $row["city"]; ?></option>
        										<?php } ?>
    																			
    							        	</select >
										</li>
										<li>
											<select name="category" id="category">
    											<option value="" disabled selected>Select Category</option>
    											<?php
    											$sql="SELECT * FROM category";
    											 $result=mysqli_query($conn,$sql);
                                				while($row = mysqli_fetch_array($result)) 
                                				{
    											?>
    											<option  value="<?php echo $row["id"]; ?>"><?php echo $row["category"]; ?></option>
    											<?php } ?>
																				
								        	</select>
										</li>
										<li>
                						    Select Subcategory: <br>
            								<div id="sc">
            								    
            								</div>
            								<br><br>
										</li>
									
									</ul>
									<input type="submit" name="select_search" value="Apply" class="list-view-more-btn">
								
								</form> 
								
						</div>
						<!--==========End Sub Category Filter============-->
					
					</div>
					<div class="col-md-9 dir-alp-con-right">
						<div class="dir-alp-con-right-1">
							<div class="row">
								<!--LISTINGS-->
									<?php
            						    $sql="SELECT * FROM seller_login WHERE live_status='1' AND city LIKE '%$city%' AND category LIKE '%$category%' AND subcategory LIKE '%$subcategory%' ORDER BY PRICE DESC ";
            						    $result=mysqli_query($conn,$sql);
            						    $i=0;
                        				while($row = mysqli_fetch_array($result)) 
                        				{
            						?>
								<div class="home-list-pop list-spac">
									<!--LISTINGS IMAGE-->
									<div class="col-md-3 list-ser-img"> <img src="images/services/s10.jpeg" alt="" /> </div>
									<!--LISTINGS: CONTENT-->
									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="listing-details.html"><h3><?php echo $row['title']; ?></h3></a>
										<h4><?php echo $row['city']; ?>, <?php echo $row['country']; ?></h4>
										<p><b>Address:</b> <?php echo $row['address']; ?></p>
										<div class="list-number">
											<ul>
												<li><img src="images/icon/phone.png" alt=""> <?php echo $row['mobile']; ?></li>
												<li><img src="images/icon/mail.png" alt=""> <?php echo $row['email']; ?></li>
											</ul>
										<?php if($row['mobile_verified']=='0'){ ?>
        								    <span class="home-list-pop-rat">Unverified</span>
            								<div class="hom-list-share" style="width:800px;">
            									<ul>
            									    <?php if($row['paid_status']=='1'){ ?>
                    								    <li><span class="home-list-pop-rat">Paid</span></li>
                    								<?php } ?>
            										<li><a href="claim-business.php?id=<?php echo $row['id']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Claim this Business</a> </li>
            									</ul>
            								</div>
            							<?php }?>
										<div class="list-enqu-btn">
										<ul>
    										<li><a href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
    										<li><a href="<?php echo $row['google']; ?>"><i class="fa fa-google" aria-hidden="true"></i></a> </li>
    										<li><a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
    									</ul>
										</div>
									</div>
								</div>
								</div>
									<?php } 
                    				?>
								<!--LISTINGS END-->
								
							</div>
						
						</div>
					</div>
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

	<!--SCRIPT FILES-->
	<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
		  
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
				    //type: "search"
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
<?php 
    ob_start();
    session_start();
    include("db_conn.php");
    if(!isset($_SESSION['user_id']))
    {
     header("location:admin-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Dashboard</title>
	<?php include('head_links.php'); ?>
</head>

<body>
		<?php include('admin-header.php'); ?>
			<!--== BODY INNER CONTAINER ==-->
			<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="admin.php"> Dashboard</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Manage Booking</h4>
						<div class="tz-2-main-com bot-sp-20">
							<div class="tz-2-main-1 tz-2-main-admin">
								<div class="tz-2-main-2"> <img src="images/icon/d1.png" alt=""><span>All Listings</span>
								<?php 
								    $q1="SELECT COUNT(*) AS total_listings FROM seller_login";
								    $result=mysqli_query($conn,$q1);
                                    $data=mysqli_fetch_assoc($result);
								?>
									<h2><?php echo $data['total_listings']; ?></h2> </div>
							</div>
							<div class="tz-2-main-1 tz-2-main-admin">
								<div class="tz-2-main-2"> <img src="images/icon/d4.png" alt=""><span>Users</span>
								<?php 
								    $q2="SELECT COUNT(*) AS total_users FROM user_login";
								    $result=mysqli_query($conn,$q2);
                                    $data=mysqli_fetch_assoc($result);
								?>
									<h2><?php echo $data['total_users']; ?></h2> </div>
							</div>
						</div>
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>New Listing Details</h4>
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Listing</th>
														<th>Title</th>
														<th>Phone</th>
														<th>Country</th>
														<th>City</th>
														<th>Category</th>
														<th>SubCategory</th>
														<th>Payment</th>
													</tr>
												</thead>
												<?php
                        						    $sql="SELECT * FROM seller_login ORDER BY id DESC LIMIT 5";
                        						    $result=mysqli_query($conn,$sql);
                                    				while($row = mysqli_fetch_array($result)) 
                                    				{   
                        						?>
												<tbody>
													<tr>
													    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
													    <input type="hidden" name="paid_status" value="<?php echo $row['paid_status']; ?>">
														<td><span class="list-img"><img src="images/icon/dbr1.jpg" alt=""></span> </td>
														<td><a href="#"><span class="list-enq-name"><?php echo $row['title']; ?></span><span class="list-enq-city"><?php echo $row['address']; ?>, <?php echo $row['country']; ?></span></a> </td>
														<td><?php echo $row['mobile']; ?></td>
														<td><?php echo $row['country']; ?></td>
														<td><?php echo $row['city']; ?></td>
														<td><?php echo $row['category']; ?></td>
														<td><?php echo $row['subcategory']; ?></td>
														<td><button class="site-btn" name="payment" style="border:0px;" ><span class="label label-primary"><?php if($row['paid_status']=='1') echo "PAID"; else echo "UNPAID"; ?></span></button> </td>
														
													</tr>
												</tbody>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>New User Details</h4>
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											<table class="table table-hover">
												<thead>
													<tr>
													    <th>Listing</th>
														<th>Username</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Email</th>
														<th>Phone</th>
														<th>Country</th>
													</tr>
												</thead>
												<?php
                        						    $q="SELECT * FROM user_login ORDER BY id DESC LIMIT 5";
                        						    $result=mysqli_query($conn,$q);
                                    				while($row = mysqli_fetch_array($result)) 
                                    				{   
                        						?>
												<tbody>
													<tr>
														<td><span class="list-img"><img src="images/users/1.png" alt=""></span> </td>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['firstname']; ?></td>
														<td><?php echo $row['lastname']; ?></td>
														<td><?php echo $row['email']; ?></td>
														<td><?php echo $row['mobile']; ?></td>
														<td><?php echo $row['country']; ?></td>
													</tr>
												</tbody>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>New Leads</h4>
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>User</th>
														<th>Name</th>
														<th>Phone</th>
														<th>Email</th>
														<th>Category</th>
														<th>Status</th>
														<th>View</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><span class="list-img"><img src="images/users/1.png" alt=""></span> </td>
														<td><a href="#"><span class="list-enq-name">Kimberly</span><span class="list-enq-city">Illunois, United States</span></a> </td>
														<td>+01 3214 6522</td>
														<td>chadengle@dummy.com</td>
														<td>Hotel</td>
														<td> <span class="label label-primary">Un Read</span> </td>
														<td> <span class="label label-primary">View</span> </td>
													</tr>
												</tbody>
											</table>
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
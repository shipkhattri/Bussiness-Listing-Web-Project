<?php
    ob_start();
    session_start();
    include('db_conn.php');
    if(!isset($_SESSION['user_id']))
    {
     header("location:admin-login.php");
    }
$city = "";
$category = "";
$paid="";
$subcategory="";
if(isset($_POST['select_search']))
{
    $city = $_POST["city"];
    $paid = $_POST["paid"];
    
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
if(isset($_POST["delete_listing"]))
{
	$id = $_POST["id"];
	$sql = "DELETE FROM seller_login WHERE id='$id' ";
	if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript">
			                    window.onload = function () 
			                    { alert("Deleted successfully");
			                    window.location= "https://marketing90sec.com/LISTING/admin-all-listing.php"; }
			                    </script>';
	}
}
if(isset($_POST["save_price"]))
{
	$id = $_POST["id"];
	$p = $_POST['price'];
	$sql = "UPDATE seller_login SET price='$p' WHERE id='$id' ";
	if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript">
			                    window.onload = function () 
			                    { alert("Price Updated successfully");}
			                    </script>';
	}
}
if(isset($_POST["payment"]))
{
	$id = $_POST["id"];
	$p = $_POST['paid_status'];
	if($p==0)
	    $sql = "UPDATE seller_login SET paid_status='1' WHERE id='$id' ";
	else
	    $sql = "UPDATE seller_login SET paid_status='0' WHERE id='$id' ";
	if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript">
			                    window.onload = function () 
			                    { alert("Updated successfully");
			                    window.location= "https://marketing90sec.com/LISTING/admin-all-listing.php"; }
			                    </script>';
	}
	
}

if(isset($_POST["update"]))
{
	$id = $_POST["id"];
	$p = $_POST['price'];
	$sql = "UPDATE seller_login SET price='$p' WHERE id='$id' ";
	if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript">
			                    window.onload = function () 
			                    { alert("Updated successfully");
			                    window.location= "https://marketing90sec.com/LISTING/admin-all-listing.php"; }
			                    </script>';
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>World Best Local Directory Website template</title>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<?php include('head_links.php'); ?>
</head>

<body>
    <?php include('admin-header.php'); ?>
			<!--== BODY INNER CONTAINER ==-->
			<div class="sb2-2">
				<!--== breadcrumbs ==-->
						<form class="tourz-search-form" method="POST" action="admin-all-listing.php">
							<div class="input-field" style="all: unset;">
							    	<ul>
										<li>
							<select name="city">
										<option value="" disabled selected>Select City</option>
										<?php
										$q="SELECT * FROM city";
										 $res=mysqli_query($conn,$q);
                        				while($row = mysqli_fetch_array($res)) 
                        				{
										?>
										<option value="<?php echo $row["city"]; ?>"><?php echo $row["city"]; ?></option>
										<?php } ?>
										<option value="">Clear</option>									
								</select>
									</li>
									
									</ul>
							</div>
							<div class="input-field" style="all: unset;">
							    	<ul>
										<li>
							<select name="category" id="category">
											<option value="" disabled selected>Select Category</option>
											<?php
											$sql="SELECT * FROM category";
											 $result=mysqli_query($conn,$sql);
                            				while($row = mysqli_fetch_array($result)) 
                            				{
											?>
											<option value="<?php echo $row["id"]; ?>"><?php echo $row["category"]; ?></option>
											<?php } ?>
											<option value="">Clear</option>									
									</select>
						</li>
										<li>
							        <select name="paid">
											<option value="" disabled selected>Paid Status</option>
											<option value="1">Paid</option>
											<option value="0">UnPaid</option>
											<option value="">Clear</option>
									</select>
										</li>
									</ul>
									<br><br>
									<ul>
									<li>
                						    Select Subcategory: <br>
            								<div id="sc">
            								    
            								</div>
            					
										</li>
									</ul>
							</div>
							<div class="input-field">
								<input type="submit" name="select_search" value="Filter"> 
									<input type="submit" value="Clear"> </div>
						</form>
		                <br><br><br><br>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>All Listing</h4>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Listing</th>
														<th>Title</th>
														<th>Phone</th>
														<th>City</th>
														<th>Category</th>
														<th>SubCategory</th>
														<th>Price</th>
														<th>Payment</th>
														<th>Delete</th>
													</tr>
												</thead>
												<?php
                        						    $sql="SELECT * FROM seller_login WHERE city LIKE '%$city%' AND category LIKE '%$category%' AND paid_status LIKE '%$paid%' AND subcategory LIKE '%$subcategory%' ORDER BY price DESC";
                        						    $result=mysqli_query($conn,$sql);
                                    				while($row = mysqli_fetch_array($result)) 
                                    				{   
                        						?>
												<tbody>
												    <form method="POST" action="">
													<tr>
													    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
													    <input type="hidden" name="paid_status" value="<?php echo $row['paid_status']; ?>">
														<td><span class="list-img"><img src="images/icon/dbr1.jpg" alt=""></span> </td>
														<td><a href="#"><span class="list-enq-name"><?php echo $row['title']; ?></span><span class="list-enq-city"><?php echo $row['address']; ?>, <?php echo $row['country']; ?></span></a> </td>
														<td><?php echo $row['mobile']; ?></td>
														<td><?php echo $row['city']; ?></td>
														<td><?php echo $row['category']; ?></td>
														<td><?php echo $row['subcategory']; ?></td>
														<td><input type="text" value="<?php echo $row['price']; ?>" name="price">
														    <button class="site-btn" name="save_price" style="margin:10px;">Save</button></td>
														<td><button class="site-btn" name="payment" style="border:0px;" ><span class="label label-primary"><?php if($row['paid_status']=='1') echo "PAID"; else echo "UNPAID"; ?></span></button> </td>
														
														<td><button class="site-btn" name="delete_listing" style="margin:10px;"><i class="fa fa-trash-o"></i></button> </td>
													</tr>
													</form>
												</tbody>
												<?php } ?>
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
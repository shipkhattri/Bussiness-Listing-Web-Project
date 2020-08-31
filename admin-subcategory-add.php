<?php
    ob_start();
    session_start();
    include("db_conn.php");
    if(!isset($_SESSION['user_id']))
    {
     header("location:admin-login.php");
    }
    
if(isset($_POST["submit"]))
{
    $cid = $_POST["category"];
    $subc = $_POST["subcategory"];
    $sql = "INSERT INTO `subcategory`(`category_id`, `subcategory`) VALUES ('$cid', '$subc') ";
	if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript">
			                    window.onload = function () 
			                    { alert("Subcategory added successfully");
			                    window.location= "admin-subcategory.php"; }
			                    </script>';
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>World Best Local Directory Website template</title>
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
						<li class="active-bre"><a href="#"> Add Listing SubCategory</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Add Listing SubCategory</h4>
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-mar-to-min">
									<div class="tab-inn ad-tab-inn">
										<div class="tz2-form-pay tz2-form-com">
											<form method="POST" action="" style="height:500px;">
												<div class="row">
													<div class="input-field col s12">
														<select name="category" required>
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
												</div>
												<div class="row">
													<div class="input-field col s12">
														<input type="text" class="validate" name="subcategory" required>
														<label>SubCategory Name</label>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<input type="submit" name="submit" value="ADD" class="waves-effect waves-light full-btn"> </div>
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
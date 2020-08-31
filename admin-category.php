<?php
    ob_start();
    session_start();
    include('db_conn.php');
    if(!isset($_SESSION['user_id']))
    {
     header("location:admin-login.php");
    }
    
if(isset($_POST["delete_category"]))
{
	$id = $_POST["id"];
	$sql = "DELETE FROM category WHERE id='$id' ";
	if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript">
			                    window.onload = function () 
			                    { alert("Deleted successfully");
			                    window.location= "admin-category.php"; }
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
						<li class="active-bre"><a href="#">Listing Categories</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Listing Categories</h4>
						
						<form method="POST" action="admin-category-add.php">
							<td> <button class="waves-effect waves-light full-btn" name="add_category" style="width:180px; float:right; margin-top:10px; margin-right:40px;"><i class="fa fa-plus">ADD CATEGORY</i></button> </td>
						</form>
						
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Category</th>
														<th>Edit</th>
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
												    <?php
                            						    $sql="SELECT * FROM category ORDER BY id DESC";
                            						    $result=mysqli_query($conn,$sql);
                                        				while($row = mysqli_fetch_array($result)) 
                                        				{   
                        						    ?>
													<tr>
													    
												    <form method="POST" action="admin-category-edit.php">
													    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
													    <input type="hidden" name="c" value="<?php echo $row['category']; ?>">
														<td><a href="#"><span class="list-enq-name"><?php echo $row['category']; ?></span><span class="list-enq-city"></span></a> </td>
														<td> <button class="site-btn" name="edit_category" style="margin:10px;"><i class="fa fa-edit"></i></button> </td>
													</form>
													
												    <form method="POST" action="">
													    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
														<td> <button class="site-btn" name="delete_category" style="margin:10px;"><i class="fa fa-trash-o"></i></button> </td>
													</form>
													
													</tr>
												    <?php } ?>
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
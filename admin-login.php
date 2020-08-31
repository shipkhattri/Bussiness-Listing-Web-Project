<?php
    ob_start();
    session_start();
    include("db_conn.php");
    if (isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email=='shiprakhattri1@gmail.com' AND $password=='sss')
        {
            $_SESSION['user_id']=1;
            header("location: admin.php");
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
	<title>ADMIN LOGIN</title>
	<?php include("head_links.php"); ?>
</head>

<body>
	<?php include("header.php"); ?>
	<section class="tz-login">
		<div class="tz-regi-form">
			<h4>Admin Log In</h4>
			<form class="col s12" action="" method="POST">
				<div class="row">
					<div class="input-field col s12">
						<input type="text" class="validate" name="email">
						<label>Email ID</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="password" class="validate" name="password">
						<label>Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" name="submit" value="submit" class="waves-button-input"></i> </div>
				</div>
			</form>
		</div>
	</section>
	<!--SCRIPT FILES-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
</body>

</html>
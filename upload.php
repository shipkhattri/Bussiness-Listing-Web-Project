<?php
session_start();
include('db_conn.php');

if (isset($_POST["submit_signup"]))
{
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$c_password = $_POST["c_password"];
	if($password != $c_password)
	{
		echo '<script type="text/javascript">
				window.onload = function () 
				{ alert("Password and Confirm password not matched !"); }
				</script>';
		header("location:register.php");
	}
	else{
		$sql = "INSERT INTO `seller_login`(`username`, `email`, `password`,`email_verified`, `mobile_verified`, `live_staus`) VALUES ('$username', '$email', '$password', 0,0,0)";	
		$result=mysqli_query($conn,$sql);  
		header("location:register.php");
	}
}

?>

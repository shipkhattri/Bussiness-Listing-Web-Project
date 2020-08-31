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
	$c_password = $_POST["c_password"];
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
    			//$result=mysqli_query($conn,$sql);
    		    //header("location:login.php");	
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
    			$sql = "INSERT INTO `user_login`( `username`, `email`, `password`, `mobile`) VALUES ('".$username."', '".$email."', '".$password."', '".$mobile."')";	
    			$result=mysqli_query($conn,$sql);
    			header("location:index.php");			
    		}
          }
         }
        
        }
}
?>
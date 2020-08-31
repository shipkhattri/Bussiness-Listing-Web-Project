<?php
	$conn=mysqli_connect("207.244.254.93","speakbaz_speakbazaar","Z8EbftRARKMy74#cT3*vuo23","speakbaz_listing");
	if ($conn->connect_error)
	{
	    die("Connection failed: " . $conn->connect_error);
    }
		
	$connect = new PDO("mysql:host=207.244.254.93;dbname=speakbaz_listing;charset=utf8mb4", "speakbaz_speakbazaar", "Z8EbftRARKMy74#cT3*vuo23");
?>
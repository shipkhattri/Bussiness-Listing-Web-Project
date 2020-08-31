 <?php
	include 'db_conn.php';
	$category_id=$_POST["category_id"];

	$result = mysqli_query($conn,"SELECT * FROM subcategory where category_id=$category_id");
	
?>

<?php
while($row = mysqli_fetch_array($result)) {
?>
    <input type="radio" id="<?php echo $row["id"];?>" name="subcat" value="<?php echo $row["subcategory"];?>">
    <label for="<?php echo $row["id"];?>"><?php echo $row["subcategory"];?></label><br>
<?php
}
?>
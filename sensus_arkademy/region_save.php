<?php 
include('db.php');
if (isset($_POST['region_name'])) {
	$datetime = date('Y-m-d H:i:s');
	mysqli_query($db, "INSERT INTO regions VALUES('' , '$_POST[region_name]', '$datetime')");
}
header('location:region.php');
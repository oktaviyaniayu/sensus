<?php 
include('db.php');
if (isset($_POST['person_name']) && isset($_POST['person_address']) && isset($_POST['person_income']) && isset($_POST['region'])) {
	$datetime = date('Y-m-d H:i:s');
	mysqli_query($db, "INSERT INTO person VALUES('' , '$_POST[person_name]', '$_POST[region]', '$_POST[person_address]', '$_POST[person_income]','$datetime')");
}
header('location:person.php');
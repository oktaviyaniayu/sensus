<?php 
include('db.php');
if (isset($_POST['person_name']) && isset($_POST['person_address']) && isset($_POST['person_income']) && isset($_POST['region'])) {
	$data = mysqli_query($db, "SELECT*FROM person WHERE id = '$_POST[id]'");
	if (mysqli_num_rows($data)>0){
		mysqli_query($db, "UPDATE person SET name='$_POST[person_name]', address='$_POST[person_address]', income='$_POST[person_income]', region_id='$_POST[region]' WHERE id='$_POST[id]'");
	}
}
header('location:person.php');
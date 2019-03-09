<?php 
include('db.php');
if (isset($_POST['id'])){
	$data = mysqli_query($db, "SELECT*FROM regions WHERE id = '$_POST[id]'");
	if (mysqli_num_rows($data)>0){
		mysqli_query($db, "DELETE FROM regions WHERE id='$_POST[id]'");
	}
}
header('location:region.php');
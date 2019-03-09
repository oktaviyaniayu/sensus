<?php 
session_start();
include('db.php');
$pass = md5($_POST['password']);
$cek = mysqli_query($db, "SELECT*FROM users WHERE email = '$_POST[email]' AND password = '$pass'");
if (mysqli_num_rows($cek)>0){
	$data = mysqli_fetch_array($cek);
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['id_user'] = $data['id'];
	header('location:data_daerah.php');
}else{
	header('location:login.php');
}
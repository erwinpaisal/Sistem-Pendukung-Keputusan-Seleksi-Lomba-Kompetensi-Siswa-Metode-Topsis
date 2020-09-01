<?php
session_start();
require_once '../config/config.php';

if(isset($_POST['submit'])){
	if(empty($_POST['username']) || empty($_POST['password']))	{
		exit("<script>window.alert('Masukkan username dan password anda');window.history.back();</script>");
		// echo "<script>window.alert('Masukkan username dan password anda');window.history.back();</script>";
	}
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$q=mysqli_query($conn,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
	if(mysqli_num_rows($q)==0){
		exit("<script>window.alert('Username dan password tidak cocok');window.history.back();</script>");
		// echo "<script>window.alert('Username dan password tidak cocok');window.history.back();</script>";
	}
	$h=mysqli_fetch_array($q);
	$id_admin=$h['id'];
	$level=$h['level'];
	$nama=$h['name'];

	
	$_SESSION['LOGIN_ID']=$id_admin;
	$_SESSION['level_id']=$level;
	$_SESSION['nama']=$nama;

	exit("<script>window.location='".$base_url."';</script>");
	// echo "<script>window.location='".$web_host."';</script>";
}

?>
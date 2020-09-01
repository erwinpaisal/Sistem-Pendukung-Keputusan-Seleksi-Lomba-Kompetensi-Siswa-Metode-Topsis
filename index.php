<?php
// error_reporting(0);
session_start();

require_once 'config/config.php';
require_once 'page.php';
if(isset($_SESSION['LOGIN_ID'])){
	$id_login = $_SESSION['LOGIN_ID'];
	require_once 'template.php';
}else{
//	require_once 'login.php';
	require_once 'front.php';

}


?>
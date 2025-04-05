<?php
	//Start session
//	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
//	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
//		header("location: index.php");
//		exit();
//	}

session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}
$user_session=$_SESSION['id'];

?>
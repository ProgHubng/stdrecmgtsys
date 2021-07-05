<?php 
	session_start();
	unset($_SESSION['matric_no']);
	header("location:login.php");
	exit();
 ?>
<?php
	ob_start();
	session_start();
	$username = $_SESSION['supa_username'];
	$supa_admin_name = $_SESSION['supa_admin_name'];
	if(!isset($_SESSION['supa_username'])){
		header('Location: ../login.php');
	}else{
		include "assets/header.php";
		include "assets/body.php";
		include "includes/conn.php";
		include "includes/proc_dash.php";
		include "assets/footer.php";
		
	}
?>
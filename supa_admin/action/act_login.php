<?php
	ob_start();
	session_start();
	include '../assets/header.php';	
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_hash = md5($password);
		
		include '../includes/conn.php';
		
		$sql = "SELECT * FROM org_supa_admin WHERE email = ? AND password = ?";
		$readStatement = mysqli_prepare($conn,$sql);
		if(!$readStatement){
			echo "";
		}else{
			mysqli_stmt_bind_param($readStatement,'ss',$username,$password_hash);
			mysqli_stmt_execute($readStatement);
			$result = mysqli_stmt_get_result($readStatement);
			$row = mysqli_fetch_assoc($result);
			$username_db = $row['email'];
			$password_db = $row['password'];
			if($username == $username_db && $password_hash == $password_db){
				$_SESSION['supa_username'] = $password;
				$sql = "SELECT * FROM org_supa_admin WHERE email = ?";
				$create_session = mysqli_prepare($conn,$sql);
				mysqli_stmt_bind_param($create_session,'s',$username);
				mysqli_stmt_execute($create_session);
				$result = mysqli_stmt_get_result($create_session);
				$row = mysqli_fetch_assoc($result);
				$start_session = $row['admin_name'];
				$admin_name = $_SESSION['supa_admin_name'] = $start_session;
				header('Location: ../dashboard.php');
			}else{
				$_SESSION['failed'] = "<p class='lead text-center' style='color: #ff0000;'>Username/Password combination error!</p>";
				header('Location:../login.php');
			}
		}
	}
	
?>
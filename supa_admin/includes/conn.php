<?php
	$db_server = "localhost";
	$db_name = "gpt_payroll";
	$db_user = "root";
	$db_password = "";
	
	$conn = mysqli_connect($db_server,$db_user,$db_password,$db_name);
	if(!$conn){
		echo "Error in DB connection";
	}else{
		echo "";
	}
?>
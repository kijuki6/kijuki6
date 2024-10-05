<?php
	include 'includes/conn.php';
	$sql = "SELECT * FROM org_supa_register WHERE status = 0";
	$approval = mysqli_prepare($conn,$sql);
	if(!$approval){
		echo "";
	}else{
		mysqli_stmt_execute($approval);
		$result = mysqli_stmt_get_result($approval);
		$count = 0;
		while($row = mysqli_fetch_assoc($result)){
			$count = $count + 1;
		}
		echo $count;
		mysqli_close($conn);
	}
	?>
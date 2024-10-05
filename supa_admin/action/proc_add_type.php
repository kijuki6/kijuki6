<?php
	include "../../assets/header.php";
	include "../../assets/body.php";
	include "../../include/conn.php";
	

	if(isset($_POST['submit_type'])){
		$type_org = $_POST['type_org'];
		
		include "../../include/conn.php";
		$sql = "INSERT INTO org_type(org_type)VALUES(?)";
		$insertStatement = mysqli_prepare($conn,$sql);
		if(!$insertStatement){
			echo "";
		}else{
			mysqli_stmt_bind_param($insertStatement,'s',$type_org);
			mysqli_stmt_execute($insertStatement);
			?>
			<h1 class="text-center">GREEN PINE PAYROLL</h1>
			<hr>
			<p class='text-center'>Added Successfully!</p>
			<a href="../form.php"><button class="form-control control">&#60;&#60;&#60; Back</button></a>
			<?php
			mysqli_close($conn);
			//header('Location: ../dashboard.php');
		}
	}
	include "../../assets/footer.php";
?>
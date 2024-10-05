<?php
	include "../assets/header.php";
	include "../assets/body.php";
	include "../include/conn.php";
	
	$no = 0;
	$sql = "SELECT * FROM org_register WHERE status = ?";
	$readStatement = mysqli_prepare($conn,$sql);
	if(!$readStatement){
		echo "";
	}else{
		mysqli_stmt_bind_param($readStatement,'s',$no);
		mysqli_stmt_execute($readStatement);
		$result = mysqli_stmt_get_result($readStatement);
		$count = 0;
		?>
		<h1 class="text-center">GREEN PINE PAYROLL</h1>
		<h2 class="text-center">Organisation Applications</h2>
		<hr>
		<a href="dashboard.php"><button class="form-control control">&#60;&#60;&#60; Back</button></a>
		<hr>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Organisation Name</th>
					<th>Address</th>
					<th>TPIN</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Organisation Type</th>
					<th>Status</th>
					<th>Date Applied</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($row = mysqli_fetch_assoc($result)){
					$count = $count + 1;
					$org_name = $row['org_name'];
					$org_address = $row['org_address'];
					$org_tpin = $row['tpin'];
					$org_email = $row['org_email'];
					$org_phone = $row['org_phone'];
					$org_type = $row['org_type'];
					$org_status = $row['status'];
					$date = $row['date_added'];
					?>
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo $org_name;?></td>
						<td><?php echo $org_address;?></td>
						<td><?php echo $org_tpin;?></td>
						<td><?php echo $org_email;?></td>
						<td><?php echo $org_phone;?></td>
						<td><?php echo $org_type;?></td>
						<td><?php echo $org_status;?></td>
						<td><?php echo $date;?></td>
						<td>
							<form action="" method="POST">
								<input type="hidden" name="tpin" value="<?php echo $org_tpin?>">
								<input type="hidden" name="email" value="<?php echo $org_email?>">
								<button type="submit" name="approve" class="form-control approve">Approve</button>
							</form>
						</td>
					</tr>
					<?php
				}
			?>
			</tbody>
		</table>
		<?php
			if(isset($_POST['approve'])){
				$status = 1;
				$org_tpin = $_POST['tpin'];
				$org_email = $_POST['email'];
				
				include '../include/conn.php';
				$sql = "UPDATE org_supa_register SET status = ? WHERE tpin = ?";
				$updateStatement = mysqli_prepare($conn,$sql);
				if(!$updateStatement){
					echo "";
				}else{
					mysqli_stmt_bind_param($updateStatement,'ss',$status,$org_tpin);
					mysqli_stmt_execute($updateStatement);
					
					$mailTo = $org_email;
					$headers = "From: <GPTPAYROLL.ZEDLISTINGS.COM>\r\n";
					$subject = "GPT Payroll Registration";
					$message = "Congratulations on your successful approval on the GPT Payroll Platform.\n\n 
					To Log in follow https://www.gptpayroll.zedlistings.com\n\n
					Username:".$org_email."\nPassword:".$org_tpin;
					//mail($mailTo, $subject, $message, $headers);
					
					$sql = "INSERT IGNORE INTO users(email,password,password_changed)VALUES(?,?,?)";
					$insertStatement = mysqli_prepare($conn,$sql);
					$org_tpin_hash = md5($org_tpin);
					$pass_status = 1;
					if(!$insertStatement){
						echo "";
					}else{
						mysqli_stmt_bind_param($insertStatement,'sss',$org_email,$org_tpin_hash,$pass_status);
						mysqli_stmt_execute($insertStatement);
						mysqli_close($conn);
					}					
				}
			}
	}
	include "../assets/footer.php";
?>
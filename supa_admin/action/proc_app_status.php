<div class="container-fluid">
		<div class="col-sm-3 sidebar">
			<a href="dashboard.php"><button class="side-button"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</button></a>
			<a href="app_status.php"><button class="side-button active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Application Status</button></a>
			<a href="reg_status.php"><button class="side-button"><i class="fa fa-list-ol" aria-hidden="true"></i> Registered Organisations</button></a>
			<a href="backups.php"><button class="side-button"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Backups</button></a>
			<a href="stat_settings.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Statutory Settings</button></a>
			<a href="org_type_setup.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Organisation Types Settings</button></a>
		</div>
		<div class="col-sm-9 dashboard">
			<div class="row">
				<div class="col-sm-4 small-box">
					<div class="box" style="background-color: #66FF00;">
						<h4>Organisations Registered</h4>
						<p class="info" style="font-size: 2em;">
							<?php
								include 'includes/conn.php';
								$sql = "SELECT * FROM org_supa_register WHERE status = 1";
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
						</p>
					</div>
				</div>
				<div class="col-sm-4 small-box">
					<div class="box" style="background-color: #ffbf00;">
						<h4>Pending Registrations</h4>
						<div id="registrationCount"></div>
						<p class="info" style="font-size: 2em;">
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
						</p>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<div class="big-box">
						<h4 style="font-size: 4em;">Organisation Status</h4>
						<?php
							include "../assets/header.php";
							include "../assets/body.php";
							include "../include/conn.php";
							
							$no = 0;
							$sql = "SELECT * FROM org_supa_register WHERE status = ?";
							$readStatement = mysqli_prepare($conn,$sql);
							if(!$readStatement){
								echo "";
							}else{
								mysqli_stmt_bind_param($readStatement,'s',$no);
								mysqli_stmt_execute($readStatement);
								$result = mysqli_stmt_get_result($readStatement);
								$count = 0;
								?>
								<style>
									table tr:nth-child(odd){
										background-color: #e7e7e7;
									}
									table th {
										border-bottom: 1px solid #fff;
									}
									table {
										width: 100%;
									}
								</style>
								<hr>
								<table class="status">
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
											<!--<th>Date Applied</th>-->
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
											//$date = $row['date_added'];
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
												<!--<td><?php echo $date;?></td>-->
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
											
											$mailTo = '';
											$headers = "From: <GPTPAYROLL.ZEDLISTINGS.COM>\r\n";
											$subject = "GPT Payroll Registration";
											$message = "Congratulations on your successful approval on the GPT Payroll Platform.\n\n 
											To Log in follow https://www.payroll.gptpayroll.com\n\n
											Username:".$org_email."\nPassword:".$org_tpin;
											//mail($mailTo, $subject, $message, $headers);
											
											$status = 1;
											
											$sql = "INSERT IGNORE INTO users(email,password,password_changed)VALUES(?,?,?)";
											$insertStatement = mysqli_prepare($conn,$sql);
											$trim_org_tpin = trim($org_tpin);
											$org_tpin_hash = md5($trim_org_tpin);
											if(!$insertStatement){
												echo "";
											}else{
												mysqli_stmt_bind_param($insertStatement,'ssi',$org_email,$org_tpin_hash,$status);
												mysqli_stmt_execute($insertStatement);
												mysqli_close($conn);
											}
											$sql_prep_1 = "INSERT INTO org_time_attendance(org_id)VALUES(?)";
											$new_org_insert = mysqli_prepare($trim_org_tpin);
											if(!$new_org_insert){
												echo "";
											}else{
												mysqli_stmt_bind_param($new_org_insert,'s',$username);
												mysqli_stmt_execute($new_org_insert);
												mysqli_close($conn);
											}
										}
									}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

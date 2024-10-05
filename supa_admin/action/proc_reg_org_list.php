<div class="container-fluid">
		<div class="col-sm-3 sidebar">
			<a href="dashboard.php"><button class="side-button"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</button></a>
			<a href="app_status.php"><button class="side-button"><i class="fa fa-check-square-o" aria-hidden="true"></i> Application Status</button></a>
			<a href="reg_status.php"><button class="side-button active"><i class="fa fa-list-ol" aria-hidden="true"></i> Registered Organisations</button></a>
			<a href="backups.php"><button class="side-button"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Backups</button></a>
			<a href="stat_settings.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Statutory Settings</button></a>
			<a href="org_type_setup.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Organisation Types Settings</button></a>
		</div>
		<div class="col-sm-9 dashboard">
			<div class="row">
				<div class="col-sm-4 small-box">
					<div class="box" style="background-color: #66FF00;">
						<h4>Organisations</h4>
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
					</div>
				</div>
				<div class="col-sm-4 small-box">
					<div class="box" style="background-color: #ffbf00;">
						<h4>Pending</h4>
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
			<hr>
			<div class="row">
				<div class="col-sm-12 small-boxed">
					<div class="boxed">
						<h4 style="font-size: 4em; text-align: left;">Registered Organisations</h4>
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
									<th>TPIN</th>
									<th>NAME</th>
									<th>ADDRESS</th>
									<th>EMAIL</th>
									<th>PHONE</th>
									<th>ORG TYPE</th>
								</tr>
							</thead>
							<tbody>
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
											$org_type = $row['org_type'];
											$org_phone = $row['org_phone'];
											$org_email = $row['org_email'];
											$org_name = $row['org_name'];
											$org_address = $row['org_address'];
											$org_tpin = $row['tpin'];
											?>
											<tr>
												<td><?php echo $count;?></td>
												<td><?php echo $org_tpin;?></td>
												<td><?php echo $org_name;?></td>
												<td><?php echo $org_address;?></td>
												<td><?php echo $org_email;?></td>
												<td><?php echo $org_phone;?></td>
												<td><?php echo $org_type;?></td>
											</tr>
											<?php
										}
										mysqli_close($conn);
									}
								?>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

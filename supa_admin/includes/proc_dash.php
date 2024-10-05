<div class="container-fluid">
		<div class="col-sm-3 sidebar">
			<a href="dashboard.php"><button class="side-button active"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</button></a>
			<a href="app_status.php"><button class="side-button"><i class="fa fa-check-square-o" aria-hidden="true"></i> Application Status</button></a>
			<a href="reg_status.php"><button class="side-button"><i class="fa fa-list-ol" aria-hidden="true"></i> Registered Organisations</button></a>
			<a href="backups.php"><button class="side-button"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Backups</button></a>
			<a href="stat_settings.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Statutory Settings</button></a>
			<a href="org_type_setup.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Organisation Types Settings</button></a>
		</div>
		<div class="col-sm-9 dashboard">
			<div class="row">
				<div class="col-sm-4 small-box">
					<div class="box" style="background-color: #66FF00;">
						<h4>Users Registered</h4>
						<p class="info" style="font-size: 2em;">
							<?php
								include 'includes/conn.php';
								$sql = "SELECT * FROM org_emp_management";
								$users = mysqli_prepare($conn,$sql);
								if(!$users){
									echo "";
								}else{
									mysqli_stmt_execute($users);
									$result = mysqli_stmt_get_result($users);
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
						<h4>Pending Approval</h4>
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
				<div class="col-sm-4 small-box">
					<div class="box" style="background-color: #0047ab; color: #fff;">
						<h4>Active Organisations</h4>
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
					<div class="box">
						<!--<h4>Payroll Summaries</h4>
						<p class="info">[]</p>-->
					</div>
				</div>
				<div class="col-sm-4 small-box">
					<div class="box">
						<!--<h4>Total Payroll Value</h4>
						<p class="info">[]</p>-->
					</div>
				</div>
				<div class="col-sm-4"><b></b></div>
				<div class="col-sm-4"><b></b></div>
			</div>
			<br>
			<p>** On the dashboard page, understand all <b><i>Active Organisations</i></b>, <b><i>Pending Approvals</i></b> from applying organisations &amp; the current <b><i>Registered Users</i></b> on the platform through organisation registrations.**</p>
		</div>
	</div>
</div>
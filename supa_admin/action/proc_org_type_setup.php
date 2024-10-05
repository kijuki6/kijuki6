<div class="container-fluid">

		<div class="col-sm-3 sidebar">
			<a href="dashboard.php"><button class="side-button"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</button></a>
			<a href="app_status.php"><button class="side-button"><i class="fa fa-check-square-o" aria-hidden="true"></i> Application Status</button></a>
			<a href="reg_status.php"><button class="side-button"><i class="fa fa-list-ol" aria-hidden="true"></i> Registered Organisations</button></a>
			<a href="backups.php"><button class="side-button"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Backups</button></a>
			<a href="stat_settings.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Statutory Settings</button></a>
			<a href="org_type_setup.php"><button class="side-button active"><i class="fa fa-sliders" aria-hidden="true"></i> Organisation Types Settings</button></a>
		</div>
		<div class="col-sm-9 dashboard">
		<h2 style="font-size: 4em;">Create Organisation Type</h2>
			<div class="row">
				<div class="col-sm-4 small-box">
					<div class="box" style="background-color: #56bf52;">
						<h4><b>Types Created</b></h4>
						<p class="info" style="font-size: 2em; color: #fff;">
							<?php
								include 'includes/conn.php';
								$sql = "SELECT * FROM org_supa_type";
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
									
								}
							?>
						</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-7 small-boxed">
					<div class="boxed" style="background-color: #56bf52;">
						<h4>Create Organisation Type</h4>
						<form method="POST" action="" class="org_type_form" style="background-color: #56bf52;">
							<div class="row">
								<div class="col-sm-7 form-group">
									<input type="text" name="type" class=" form-control" placeholder="Organisation Type...">
								</div>
								<div class="col-sm-5 form-group">
									<input type="text" name="type_code" class=" form-control" placeholder="Organisation Type Code...">
								</div>
								<div class="col-sm-12 form-group">
									<input type="submit" name="submit_type" class="approve form-control" value="Submit">
								</div>
							</div>
						</form>
						<?php
							if(isset($_POST['submit_type'])){
								$type = $_POST['type'];
								$type_code = $_POST['type_code'];
								
								$sql = "INSERT IGNORE INTO org_supa_type(type,type_code)VALUES(?,?)";
								$insertStatement = mysqli_prepare($conn,$sql);
								if(!$insertStatement){
									echo "";
								}else{
									mysqli_stmt_bind_param($insertStatement,'ss',$type,$type_code);
									mysqli_stmt_execute($insertStatement);
									echo "<h4>Successfully Saved!</h4>";
									mysqli_close($conn);
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

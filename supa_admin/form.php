<?php
	include "../assets/header.php";
	include "../assets/body.php";
	include "../include/conn.php";
	
	
	?>
	<style>
	.org_Type {
		margin: auto;
	}
	.org_Type th, td {
		padding: 2px;
	}
	.control {
		max-width: 300px;
		background-color: #e7e7e7;
	}
	.control:hover {
		background-color: #028a0f;
		color: #ffffff;
	}
	a:hover {
		text-decoration: none;
		font-weight: bold;
	}
	.approve {
		border: 1px solid #000000;
		background-color: #e7e7e7;
	}
	.approve:hover {
		background-color: #028a0f;
		color: #ffffff;
	}
  </style>
	
	<h1 class="text-center">GREEN PINE PAYROLL</h1>
	<h2 class="text-center">Add Organisation Type</h2>
	<hr>
	<a href="dashboard.php"><button class="form-control control">&#60;&#60;&#60; Back</button></a>
	<hr>
	<table align="center" style="width:100%; max-width: 500px;" class="org_Type">
		<form action="action/proc_add_type.php" method="POST">
			<tr>
				<td>
					<div class="form-group">
						<input type="text" class="form-control input-lg" name="type_org" placeholder="Organisation Type...">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group">
						<input type="submit" class="form-control approve control" name="submit_type" value="Add Organisation Type">
					</div>
				</td>
			</tr>
		</form>		
	</table>
	<?php
	
	include "../assets/footer.php";
?>
<?php
	ob_start();
	session_unset();
	@session_destroy();
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGIN|GPT PAYROLL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
	body {
		background-color: #ffffff;
		font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
	}
	.lead {
	    font-size: 14px;
	}
	form {
		width: 100%;
		max-width: 400px;
		margin: auto;
	}
	form input[type="submit"] {
		color: #000000;
		border: 2px solid #000000;
		width: 200px;
	}
	form input[type="email"] {
		color: #000000;
		border: 2px solid #000000;
		padding: 10px;
	}
	form input[type="text"] {
	    color: #000000;
	    border: 2px solid #000000;
	    padding: 10px;
	}
	form input[type="password"] {
		color: #000000;
	    border: 2px solid #000000;
	    padding: 10px;
	}
	form input[type="submit"]:hover {
	    background-color: #028a0f;
	    color: #000000;
	    border: 2px solid #000000;
		font-weight: bold;
	}
	form input[type="email"]:hover {
	    color: #000000;
	    border: 2px solid #000000;
	}
	form input[type="password"]:hover {
	    color: #000000;
	    border: 2px solid #000000;
	}
  </style>
</head>
<body>
	<div class="container-fluid">
		<br>
		<h1 class="text-center">Green Pine Payroll System</h1>
		<br>
		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-6" style="border-right: 2px solid #000000; background-color: #e3e3e3;">
					<br>
					<form method="POST" action="action/act_login.php">
						<br>
						<h2 class="text-center">Super Admin|Login Here</h2>
						<hr>
						<br>
						<div class="form-group">
							<input type="text" class="form-control input-lg" placeholder="Email..." name="username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control input-lg" placeholder="Password..." name="password" required>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control input-lg" name="submit" value="Login">
						</div>
					</form>
					<?php
						echo "<br>";
						echo @$_SESSION['failed'];
					?>
					
				</div>
				<div class="col-sm-6" style="border-top: 2px solid #000000;">
					<br>
					<br>
					<img src="logo/gpt_logo_n.jpg" style="width: 100%; max-width: 500px;"/>
					<br>
					<br>
					<br>
                    <p class="lead text-center">Green Pine Technologies Limited<br>+260 969 596 109 / +260 976 200 813<br>
                    <i>info@zedlistings.com</i></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	session_unset();
?>
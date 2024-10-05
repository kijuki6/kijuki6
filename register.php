<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>REGISTER|GPT PAYROLL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
	body {
		background-color: #ffffff;
		font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
	}
	.lead {
	    font-size: 14px;
	}
	h1 {
		text-align: center;
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
	form input[type="tel"] {
		color: #000000;
		border: 2px solid #000000;
		padding: 10px;
	}
	form input[type="text"] {
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
	form input[type="tel"]:hover {
	    color: #000000;
	    border: 2px solid #000000;
	}
  </style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<h1>Register on Green Pine Payroll</h1>
			<hr>
			<br>
			<br>
			<div class="row">
				<div class="col-sm-6" style="border-right: 2px solid #000000; background-color: #e3e3e3;">
					<br>
					<br>
					<form method="POST" action="actions/act_register.php" id="registrationForm">
						<p class="text-center"><b>Register on our Payroll System</b></p>
						<?php
							if(!empty($_SESSION['exists'])){
								echo $_SESSION['exists'];
							}else{
								echo "";
							}
						?>
						<div class="form-group">
							<label for="name">Organisation Name</label>
							<input type="text" class="form-control" id="name" name="org_name" placeholder="Organisation Name..." required>
						</div>
						<div class="form-group">
							<label for="address">Organisation Address</label>
							<input type="text" class="form-control" id="address" name="org_address" placeholder="Organisation Address..." required>
						</div>
						<div class="form-group">
							<label for="tax">Organisation Tax Number</label>
							<input type="text" class="form-control" id="tax" name="org_tpin" placeholder="TPIN..." required>
						</div>
						<div class="form-group">
							<label for="email">Organisation Email</label>
							<input type="email" class="form-control" id="email" name="org_email" placeholder="Organisation Email..." required>
						</div>
						<div class="form-group">
							<label for="phone">Organisation Phone</label>
							<input type="tel" class="form-control" id="phone" name="org_phone" placeholder="Organisation Phone..." required>
						</div>
						<div class="form-group">
							<label for="type">Organisation Type</label>
							<select class="form-control" id="type" name="org_type" required>
								<option value="">-- Select Organisation Type --</option>
								<?php
									include 'include/conn.php';
									$sql = "SELECT * FROM org_supa_type";
									$readStatement = mysqli_prepare($conn,$sql);
									if($readStatement){
										mysqli_stmt_execute($readStatement);
										$result = mysqli_stmt_get_result($readStatement);
										$count = 0;
										while($row = mysqli_fetch_assoc($result)){
											$count++;
											$org_type = $row['type'];
								?>
											<option value="<?php echo $org_type;?>"><?php echo $count.". ".$org_type;?></option>
								<?php
										}
										mysqli_close($conn);
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="currency">Organisation Currency</label>
							<select class="form-control" name="currency" id="currency" required>
								<option value="">-- Select Currency --</option>
								<option value="AUD">Australian Dollar</option>
								<option value="BWP">Botswanan Pula</option>
								<option value="EUR">Euro</option>
								<option value="GBP">Great British Pound</option>
								<option value="MWK">Malawian Kwacha</option>
								<option value="NAD">Namibian Dollar</option>
								<option value="USD">United Stated Dollar</option>
								<option value="ZAR">South African Rand</option>
								<option value="ZMW">Zambian Kwacha</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control" name="reg_submit" value="Register">
						</div>
					</form>
					
<script>
    // JavaScript validation
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        // Fetch form fields
        var name = document.getElementById("name").value.trim();
        var address = document.getElementById("address").value.trim();
        var tax = document.getElementById("tax").value.trim();
        var email = document.getElementById("email").value.trim();
        var phone = document.getElementById("phone").value.trim();
        var type = document.getElementById("type").value.trim();
        
        // Regular expressions for validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var phoneRegex = /^\d{10}$/;
        
        // Validation checks
        if (name === "" || address === "" || tax === "" || email === "" || phone === "" || type === "") {
            alert("All fields are required!");
            event.preventDefault();
            return;
        }
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address!");
            event.preventDefault();
            return;
        }
        if (!phoneRegex.test(phone)) {
            alert("Please enter a valid phone number (10 digits)!");
            event.preventDefault();
            return;
        }
        // Additional validation checks can be added
        
        // If all validations pass, the form will be submitted
    });
</script>

					<br>
					<p class="text-center">Already have an account? <a href="login.php">Login</a></p>
					<br>
				</div>
				<div class="col-sm-6" style="border-top: 2px solid #000000;">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<p class="text-center"><img src="logo/gpt_logo_n.jpg" style="width: 100%; max-width: 500px;"/></p>
					<br>
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
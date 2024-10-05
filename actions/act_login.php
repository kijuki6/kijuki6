<?php
	ob_start();
	session_start();
	include '../assets/header.php';	

	if(isset($_POST['submit'])){
		echo $username = trim($_POST['username']);
		$password = trim($_POST['password']);
		echo $password_hash = md5($password); // Note: MD5 is not recommended for hashing passwords

		include '../include/conn.php';

		// First SQL Query to verify user credentials
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		$readStatement = mysqli_prepare($conn, $sql);
		if(!$readStatement){
			echo "Failed to prepare statement.";
		}else{
			mysqli_stmt_bind_param($readStatement, 'ss', $username, $password_hash);
			mysqli_stmt_execute($readStatement);
			$result = mysqli_stmt_get_result($readStatement);
			$row = mysqli_fetch_assoc($result);
			$db_user = $row['email'];
			$db_pass = $row['password'];

			if($username == $db_user && $password_hash == $db_pass){
				$_SESSION['username'] = $row['email'];

				// Second SQL Query to check organisation status
				$status = [1, 2];
				$placeholders = implode(',', array_fill(0, count($status), '?'));
				$sql = "SELECT * FROM org_supa_register WHERE org_email = ? AND status IN ($placeholders)";
				$create_session = mysqli_prepare($conn, $sql);
				if(!$create_session){
					echo "Failed to prepare statement.";
				}else{
					// Dynamically binding parameters
					$typeStr = 's' . str_repeat('i', count($status)); // 's' for string, 'i' for each integer in $status
					$params = array_merge([$typeStr, $username], $status);

					call_user_func_array(
					    function($stmt, ...$params) {
					        mysqli_stmt_bind_param($stmt, ...$params);
					    }, 
					    array_merge([$create_session], $params)
					);

					mysqli_stmt_execute($create_session);
					$result = mysqli_stmt_get_result($create_session);
					$row = mysqli_fetch_assoc($result);

					if($row){
						$_SESSION['organisation_name'] = $row['org_name'];
						$_SESSION['organisation_email'] = $row['org_email'];
						$_SESSION['tpin'] = $row['tpin'];

						$org_name = $row['org_name'];
						$tpin = $row['tpin'];

						// Get client IP address
						$ip_address = $_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR']);
						
						// Get user location using ipinfo.io API
						$location = "Unknown";
						$api_url = "https://ipinfo.io/{$ip_address}/json";
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $api_url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$response = curl_exec($ch);
						curl_close($ch);
						if ($response) {
							$data = json_decode($response);
							if (isset($data->city) && isset($data->region) && isset($data->country)) {
								$location = "{$data->city}, {$data->region}, {$data->country}";
							}
						}

						// Log login success
						$log_dir = "../logs/login_success/".$org_name."_".$tpin."/";
						if (!file_exists($log_dir)) {
							mkdir($log_dir, 0777, true);
						}
						$log_file = $log_dir . "login.txt";

						// Check if the log file is empty and add column headings
						if (!file_exists($log_file) || filesize($log_file) === 0) {
							file_put_contents($log_file, sprintf("%-20s %-30s %-30s %-15s %-30s\n", "Date Time", "Organisation Name", "Organisation Email", "IP Address", "Location"), FILE_APPEND);
						}

						$file = fopen($log_file, "a");
						$t = time();
						$date = date("Y-m-d H:i:s", $t);
						fwrite($file, sprintf("%-20s %-30s %-30s %-15s %-30s\n", $date, $org_name, $row['org_email'], $ip_address, $location));
						fclose($file);

						header('Location: ../admin/dashboard.php');
						exit();
					} else {
						echo "No matching organization found.";
					}
				}
			}else{
				// Log failed login attempt
				log_failed_login($username);
				$_SESSION['failed'] = "<p class='lead text-center' style='color: #ff0000;'>Username/Password combination error!</p>";
				header('Location: ../login.php');
				exit();
			}
			mysqli_stmt_close($readStatement);
		}
		mysqli_close($conn);
	}

	function log_failed_login($username){
		$ip_address = $_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR']);
		
		// Get user location using ipinfo.io API
		$location = "Unknown";
		$api_url = "https://ipinfo.io/{$ip_address}/json";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		if ($response) {
			$data = json_decode($response);
			if (isset($data->city) && isset($data->region) && isset($data->country)) {
				$location = "{$data->city}, {$data->region}, {$data->country}";
			}
		}

		// Log failed login attempt
		$log_dir = "../logs/login_fails/";
		if (!file_exists($log_dir)) {
			mkdir($log_dir, 0777, true);
		}
		$log_file = $log_dir . "failed_login.txt";

		// Check if the log file is empty and add column headings
		if (!file_exists($log_file) || filesize($log_file) === 0) {
			file_put_contents($log_file, sprintf("%-20s %-30s %-15s %-30s\n", "Date Time", "Username", "IP Address", "Location"), FILE_APPEND);
		}

		$file = fopen($log_file, "a");
		$t = time();
		$date = date("Y-m-d H:i:s", $t);
		fwrite($file, sprintf("%-20s %-30s %-15s %-30s\n", $date, $username, $ip_address, $location));
		fclose($file);
	}
?>

<?php
include '../assets/header.php';
include '../include/conn.php';

if (isset($_POST['reg_submit'])){
    // Sanitize inputs
    $org_name = mysqli_real_escape_string($conn, $_POST['org_name']);
    $org_address = mysqli_real_escape_string($conn, $_POST['org_address']);
    $org_tpin = mysqli_real_escape_string($conn, $_POST['org_tpin']);
    $org_email = filter_var($_POST['org_email'], FILTER_SANITIZE_EMAIL);
    $org_phone = mysqli_real_escape_string($conn, $_POST['org_phone']);
    $org_type = mysqli_real_escape_string($conn, $_POST['org_type']);
    $status = 0;
	$currency = mysqli_real_escape_string($conn, $_POST['currency']);

    // Check if TPIN or email already exists
    $existingOrg = checkExistingOrganization($org_tpin, $org_email);
    if($existingOrg){
        if($existingOrg['tpin'] == $org_tpin){
            $_SESSION['exists'] = "<p style='text-align: center; color: #ff0000;'>***TPIN already exists, please verify before trying again.***</p>";
            header('Location: ../register.php');
            exit();
        }
        if($existingOrg['org_email'] == $org_email) {
            $_SESSION['exists'] = "<p style='text-align: center; color: #ff0000;'>***Email Address already exists, please verify before trying again.***</p>";
            header('Location: ../register.php');
            exit();
        }
    }
	
	

    // Generate organization ID
    $org_id = md5($org_tpin);

    // Insert organization registration
    insertOrganizationRegistration($org_id,$org_name,$org_address,$org_tpin,$org_email,$org_phone,$org_type,$status,$currency);
	echo "<h4 class='text-center'>Successfully Registered! Please wait for approval email.</h4>";
	header('Location:../register.php');
    // Additional logic for sending email, creating folders, etc.
	$mailTo = 'info@zedlistings.com';
	$headers = "From: GPPS PAYROLLS\r\n";
	$subject = "Payroll Registration";
	$message = "1. Organisation Name \n".$org_name."\n2. Address: \n".$org_address.
				"\n3. Organisation TPIN\n".$org_tpin."\n4. Orgnanisation Email\n".$org_email.
				"\n5. Organisation Phone No.\n".$org_phone."\n6. Organisation Type\n".$org_type;
				
	//mail($mailTo,$subject,$message,$headers);
	//supa_mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin);
	@mkdir("../admin/logs/login_fails/".$org_name."_".$org_tpin);
	@mkdir("../admin/logs/login_success/".$org_name."_".$org_tpin);
	@mkdir("../admin/logs/employee_management/".$org_name."_".$org_tpin);
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin);
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin."/payroll_summary");
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin."/employee_data");
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin."/payslips");
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin."/payslips/payslips_collate");
	@mkdir("../admin/documents/backups/organisations/".$org_name."_".$org_tpin);
	@mkdir("../admin/documents/backups/organisations/".$org_name."_".$org_tpin."/payroll_summary");
	@mkdir("../admin/documents/backups/organisations/".$org_name."_".$org_tpin."/employee_data");
	@mkdir("../admin/documents/backups/organisations/".$org_name."_".$org_tpin."/payslips");
	@mkdir("../admin/documents/backups/organisations/".$org_name."_".$org_tpin."/payslips/payslips_collate");
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin."/payslips");
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin."/payslips/year");
	@mkdir("../admin/documents/organisations/".$org_name."_".$org_tpin."/payslips/year/month");
		
	
}


?>

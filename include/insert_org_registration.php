<?php
// Function to insert organization registration
function insertOrganizationRegistration($org_id,$org_name,$org_address,$org_tpin,$org_email,$org_phone,$org_type,$status,$currency){
    global $conn;
    $sql = "INSERT IGNORE INTO org_supa_register(org_id,org_name,org_address,tpin,org_email,org_phone,org_type,status,currency)VALUES(?,?,?,?,?,?,?,?,?)";
    $insertStatement = mysqli_prepare($conn, $sql);
    if(!$insertStatement){
        die("Error preparing statement: ".mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($insertStatement,'sssssssss',$org_id,$org_name,$org_address,$org_tpin,$org_email,$org_phone,$org_type,$status,$currency);
    if(!mysqli_stmt_execute($insertStatement)){
        die("Error executing statement: ".mysqli_error($conn));
    }
    mysqli_stmt_close($insertStatement);
}

// Function to check if TPIN or email already exists
function checkExistingOrganization($org_tpin,$org_email) {
    global $conn;
    $sql = "SELECT * FROM org_supa_register WHERE tpin = ? OR org_email = ?";
    $check = mysqli_prepare($conn, $sql);
    if(!$check){
        die("Error preparing statement: ".mysqli_error($conn));
    }

    mysqli_stmt_bind_param($check,'ss',$org_tpin,$org_email);
    mysqli_stmt_execute($check);
    $result = mysqli_stmt_get_result($check);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($check);

    return $row;
}
?>
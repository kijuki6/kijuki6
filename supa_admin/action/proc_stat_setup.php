<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Pine Payroll System | Super Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function showPopup(title, content) {
            var popupHtml = '<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel">' +
                            '<div class="modal-dialog" role="document">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span></button>' +
                            '<h4 class="modal-title" id="popupModalLabel">' + title + '</h4>' +
                            '</div>' +
                            '<div class="modal-body">' + content + '</div>' +
                            '<div class="modal-footer">' +
                            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

            $('body').append(popupHtml);
            $('#popupModal').modal('show');
            $('#popupModal').on('hidden.bs.modal', function () {
                $(this).remove();
            });
        }

        function showNHIMAPopup() {
            var content = '<form method="POST" action="">' +
                          '<div class="form-group">' +
                          '<label for="nhima">NHIMA % Deduction</label>' +
                          '<input type="text" class="form-control" id="nhima" name="nhima" placeholder="% Deduction">' +
                          '</div>' +
                          '<button type="submit" class="btn btn-primary" name="nhima_submit">Submit</button>' +
                          '</form>';
            showPopup('NHIMA Setup', content);
        }

        function showNAPSAPopup() {
            var content = '<form method="POST" action="">' +
                          '<div class="form-group">' +
                          '<label for="napsa">NAPSA % Deduction</label>' +
                          '<input type="text" class="form-control" id="napsa" name="napsa" placeholder="% Deduction">' +
                          '</div>' +
                          '<button type="submit" class="btn btn-primary" name="napsa_submit">Submit</button>' +
                          '</form>';
            showPopup('NAPSA Setup', content);
        }

        function showPAYEPopup() {
            var content = '<form method="POST" action="">' +
                          '<div class="form-group">' +
                          '<label for="band_1">PAYE Band 1 % Deduction</label>' +
                          '<input type="text" class="form-control" id="band_1" name="band_1" placeholder="% Deduction Band 1">' +
                          '</div>' +
                          '<div class="form-group">' +
                          '<label for="range_1">PAYE Band 1 Range</label>' +
                          '<input type="text" class="form-control" id="range_1" name="range_1" placeholder="Value Range 1">' +
                          '</div>' +
                          '<div class="form-group">' +
                          '<label for="band_2">PAYE Band 2 % Deduction</label>' +
                          '<input type="text" class="form-control" id="band_2" name="band_2" placeholder="% Deduction Band 2">' +
                          '</div>' +
                          '<div class="form-group">' +
                          '<label for="range_2">PAYE Band 2 Range</label>' +
                          '<input type="text" class="form-control" id="range_2" name="range_2" placeholder="Value Range 2">' +
                          '</div>' +
                          '<div class="form-group">' +
                          '<label for="band_3">PAYE Band 3 % Deduction</label>' +
                          '<input type="text" class="form-control" id="band_3" name="band_3" placeholder="% Deduction Band 3">' +
                          '</div>' +
                          '<div class="form-group">' +
                          '<label for="range_3">PAYE Band 3 Range</label>' +
                          '<input type="text" class="form-control" id="range_3" name="range_3" placeholder="Value Range 3">' +
                          '</div>' +
                          '<button type="submit" class="btn btn-primary" name="zra_submit">Submit</button>' +
                          '</form>';
            showPopup('PAYE Setup', content);
        }
    </script>
    <style>
        .modal-body {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <div class="col-sm-3 sidebar">
            <a href="dashboard.php"><button class="side-button"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</button></a>
            <a href="app_status.php"><button class="side-button"><i class="fa fa-check-square-o" aria-hidden="true"></i> Application Status</button></a>
            <a href="reg_status.php"><button class="side-button"><i class="fa fa-list-ol" aria-hidden="true"></i> Registered Organisations</button></a>
            <a href="backups.php"><button class="side-button"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Backups</button></a>
            <a href="stat_settings.php"><button class="side-button active collapsible" data-toggle="collapse"><i class="fa fa-sliders" aria-hidden="true"></i> Statutory Settings</button></a>
            <a href="org_type_setup.php"><button class="side-button"><i class="fa fa-sliders" aria-hidden="true"></i> Organisation Types Settings</button></a>
        </div>
        <div class="col-sm-9 dashboard">
            <h2 style="font-size: 4em;">Create Statutory Deductions</h2>
            <div class="row">
                <div class="col-sm-4 small-box">
                    <div class="box" style="background-color: #56bf52;">
                        <h4 style="font-size: 3em;">NHIMA</h4>
                    </div>
                    <form method="POST" action="">
                        <button name="nhima" type="button" onclick="showNHIMAPopup()" class="form-control stat_buttons approved">NHIMA Setup</button>
                    </form>
                </div>
                <div class="col-sm-4 small-box">
                    <div class="box" style="background-color: #ffd700;">
                        <h4 style="font-size: 3em;">NAPSA</h4>
                    </div>
                    <form method="POST" action="">
                        <button name="napsa" type="button" onclick="showNAPSAPopup()" class="form-control stat_buttons approved">NAPSA Setup</button>
                    </form>
                </div>
                <div class="col-sm-4 small-box">
                    <div class="box" style="background-color: #1338be;">
                        <h4 style="font-size: 3em; color: #fff;">ZRA PAYE</h4>
                    </div>
                    <form method="POST" action="">
                        <button name="paye" type="button" onclick="showPAYEPopup()" class="form-control stat_buttons approved">PAYE Setup</button>
                    </form>
                </div>
            </div>
            <br>
            <hr class="separator2">
            <br>
            <?php
                if(isset($_POST['nhima_submit'])){
                    $region = "ZAMBIA";
                    $nhima = $_POST['nhima'];
                    $sql = "UPDATE org_supa_statutory SET health = ? WHERE region = ?";
                    $updateHealth = mysqli_prepare($conn,$sql);
                    if(!$updateHealth){
                        echo "";
                    }else{
                        mysqli_stmt_bind_param($updateHealth,'ss',$nhima,$region);
                        mysqli_stmt_execute($updateHealth);
                        echo "<h4>Health Updated Successfully!</h4>";
                        mysqli_close($conn);
                    }
                }
                if(isset($_POST['napsa_submit'])){
                    $region = "ZAMBIA";
                    $napsa = $_POST['napsa'];
                    $sql = "UPDATE org_supa_statutory SET pension = ? WHERE region = ?";
                    $updatePension = mysqli_prepare($conn,$sql);
                    if(!$updatePension){
                        echo "";
                    }else{
                        mysqli_stmt_bind_param($updatePension,'ss',$napsa,$region);
                        mysqli_stmt_execute($updatePension);
                        echo "<h4>Pension Updated Successfully!</h4>";
                        mysqli_close($conn);
                    }
                }
                if(isset($_POST['zra_submit'])){
                    $region = "ZAMBIA";
                    $band_1 = $_POST['band_1'];
                    $range_1 = $_POST['range_1'];
                    $band_2 = $_POST['band_2'];
                    $range_2 = $_POST['range_2'];
                    $band_3 = $_POST['band_3'];
                    $range_3 = $_POST['range_3'];
                    $sql = "UPDATE org_supa_tax SET band_1 = ?, range_1_start = ?, band_2 = ?, range_2_start = ?, band_3 = ?, range_3_start = ? WHERE region = ?";
                    $updateTaxBand = mysqli_prepare($conn,$sql);
                    if(!$updateTaxBand){
                        echo "";
                    }else{
                        mysqli_stmt_bind_param($updateTaxBand,'sssssss',$band_1,$range_1,$band_2,$range_2,$band_3,$range_3,$region);
                        mysqli_stmt_execute($updateTaxBand);
                        echo "<h4>Tax Bands Updated Successfully!</h4>";
                        mysqli_close($conn);
                    }
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>

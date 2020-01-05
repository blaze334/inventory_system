<?php
include_once "../config/conn.php";
include_once "../config/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSU | View Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<script src="../js/jquery-2.1.1.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
    <link rel="shortcut icon" href="../img/icon.ico">
    <style type="text/css">
        .channel h4{
            font-weight: 600;
        }
        .channel span{
            display: block;
        }
        .channel span.reach{
            font-weight: bolder;
            color: #006400;
        }
        td, th{
            padding: 5px;
            vertical-align: top;
        }
    </style>
</head>
<body>
	<?php include "header.php";?>
	<div style="position:relative;top: -100px; overflow: hidden;" class="well">
        <div class="col-sm-offset-3 col-sm-6">
            <?php
                $sel2 = mysqli_query($conn,"SELECT s.*, d.name department FROM staff s LEFT JOIN department d ON s.dept_id=d.id WHERE staff_no='$username'");
                $fet2 = @mysqli_fetch_array($sel2);
                $first_name = htmlspecialchars_decode(@$fet2['first_name']);
                $other_names = htmlspecialchars_decode(@$fet2['other_names']);
                $dob = htmlspecialchars_decode(@$fet2['dob']);
                $gender = htmlspecialchars_decode(@$fet2['gender']);
                $phone = htmlspecialchars_decode(@$fet2['phone']);
                $email = htmlspecialchars_decode(@$fet2['email']);
                $state = htmlspecialchars_decode(@$fet2['state']);
                $lga = htmlspecialchars_decode(@$fet2['lga']);
                $address = htmlspecialchars_decode(@$fet2['address']);
                $staff_no = htmlspecialchars_decode(@$fet2['staff_no']);
                $department = htmlspecialchars_decode(@$fet2['department']);
                $passport = htmlspecialchars_decode(@$fet2['passport']);
                $src = "../img/passport/".$passport;

                echo '<div style="width: 100%; background: #FFF; border-radius: 7px;font-family: arial; padding: 20px;">
                    <div style="overflow: hidden;text-align: center; border-bottom: 3px solid #AAA; padding-bottom: 20px;">
                        <img src="'.$src.'" style="width:120px; border-radius: 70px; border: 2px solid #006400; background: #555; padding: 3px;">
                    </div>
                    <table style="width: 100%;background: #EEE;">
                        <tr>
                            <th>Staff Number:</th>
                            <td>'.$staff_no.'</td>
                        </tr>
                        <tr>
                            <th>First Name:</th>
                            <td>'.$first_name.'</td>
                        </tr>
                        <tr>
                            <th>Other Names:</th>
                            <td>'.$other_names.'</td>
                        </tr>
                        <tr>
                            <th>Date of Birth:</th>
                            <td>'.$dob.'</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>'.$gender.'</td>
                        </tr>
                        <tr>
                            <th>Phone Number:</th>
                            <td>'.$phone.'</td>
                        </tr>
                        <tr>
                            <th>E-mail Address:</th>
                            <td>'.$email.'</td>
                        </tr>
                        <tr>
                            <th>State:</th>
                            <td>'.$state.'</td>
                        </tr>
                        <tr>
                            <th>LGA:</th>
                            <td>'.$lga.'</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>'.$address.'</td>
                        </tr>
                        <tr>
                            <th>Department:</th>
                            <td>'.$department.'</td>
                        </tr>
                    </table> 
                </div>';
            ?>                        
		</div>
	</div>
	<?php include "../footer.php";?>
</body>
</html>
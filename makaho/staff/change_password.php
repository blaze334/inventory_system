<?php
include_once "../config/conn.php";
include_once "../config/functions.php";
$username = @$_SESSION['clearance_username'];
$errors = [];
if(isset($_POST['submit'])) {
    $pass = validate($_POST['pass']);
    $npass = validate($_POST['npass']);
    $cpass = validate($_POST['cpass']);
    if($npass != $cpass){
    	$msg = '<div class="alert alert-danger msg">Password did not match</div>';
    }
    else{
        $opass = md5($pass);
        $select = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$opass'") or die(mysqli_error($conn));        
        $num = mysqli_num_rows($select);
        if($num <= 0){
            $msg = '<div class="alert alert-danger msg">Invalid Password</div>';
        }
        else{
            $new_pass = md5($npass);
            
            $query = mysqli_query($conn, "UPDATE user SET password = '$new_pass' WHERE username = '$username'") or die(mysqli_error($conn));

            $msg = '<div class="alert alert-success msg">Password Updated Successfully</div>';
        }
    }
    $pass = $_POST['pass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSU | Update Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<script src="../js/jquery-2.1.1.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</head>
<body>
	<?php include "header.php";?>
	<div style="min-height: 344px;padding-top: -40px;">
		<div class="col-sm-offset-3 col-sm-6 well">
			<div class="alert alert-info" style="text-align: center;font-weight:bold;">Fill the details below to update your password</div>
			<?=@$msg;?>
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
	                <label class="col-sm-4 control-label">Old Password:</label>
	                <div class="form-group col-sm-8">
	                    <input name="pass" value="<?=@$pass?>" required type="password" class="form-control" placeholder="Old Password" maxlength="30"/>
	                </div>
	            </div>

	            <div class="form-group">
	                <label class="col-sm-4 control-label">New Password:</label>
	                <div class="form-group col-sm-8">
	                    <input name="npass" value="<?=@$npass?>" required type="password" class="form-control" placeholder="New Password" maxlength="30"/>
	                </div>
	            </div>
	            
	            <div class="form-group">
	                <label class="col-sm-4 control-label">Confirm Password:</label>
	                <div class="form-group col-sm-8">
	                    <input name="cpass" value="<?=@$cpass?>" required type="password" class="form-control" placeholder="Confirm Password" maxlength="30"/>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-8 pull-right">
	                    <button type="submit" name="submit" class="btn btn-submit col-sm-12"> Update Password </button>
	                </div>
                </div>
            </form>    
        </div>
	</div>
	<?php include "../footer.php";?>
</body>
</html>
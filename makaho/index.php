<?php
include "config/conn.php";
include "config/functions.php";

if(isset($_POST['submit'])){
    $db_username = validate($_POST['username']);
    $db_password = md5(validate($_POST['password']));
    $select = mysqli_query($conn, "SELECT * FROM user WHERE username='$db_username' AND password='$db_password'");
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_array($select);
        if($fetch['user_cat'] == 'admin') {
            $_SESSION['clearance_username'] = $fetch['username'];
            $_SESSION['clearance_user_cat'] = 'admin';                
            echo "<script>window.location = 'admin/';</script>";
        }elseif($fetch['user_cat'] == 'staff') {
            $_SESSION['clearance_username'] = $fetch['username'];
            $_SESSION['clearance_user_cat'] = 'staff';                
            echo "<script>window.location = 'staff/';</script>";
        }
    } else {
        $msg = '<div class="alert alert-danger msg">Invalid USERNAME or PASSWORD</div>';
    }   
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSU | Mailing System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
    <link rel="shortcut icon" href="img/icon.ico">
</head>
<body>
    <?php include "header.php";?>
    <div style="min-height: 348px;position: relative; top: -40px;">
		<div class="col-sm-offset-4 col-sm-4 well">
            <h2 class="text-center danger"> LOGIN</h2>
            <?php echo @$msg; ?>
            <form method="POST">
                <label>Username</label>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon bcolor"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="username" value="<?=@$_POST['username']?>" required type="text" class="form-control"/>
                    </div>
                </div>

                <label>Password</label>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon bcolor"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="password" value="<?=@$_POST['password']?>" required type="password" class="form-control"/>
                    </div>                
                </div>

                <div>
                    <p></p>
                    <button type="submit" name="submit" class="btn btn-submit col-sm-12"><i class="fa fa-sign-in"></i> Login</button>
                    <div class="register">
                        <a href="register.php">Not a member? Register</a>
                    </div>
                </div>
            </form>
        </div>
	</div>
<?php include "footer.php";?>
</body>
</html>
<?php
    $username = "";
    if(!isset($_SESSION['clearance_user_cat']) || $_SESSION['clearance_user_cat'] != 'staff'){
        echo "<script>window.location = '../index.php';</script>";
    }
    $username = $_SESSION['clearance_username'];
    $query = mysqli_query($conn, "SELECT clearance_id FROM clearance WHERE student_id=(SELECT id FROM student WHERE adm_no='$username')");
    $fetch = @mysqli_fetch_array($query);
    $clearance_id = @$fetch['clearance_id'];
?>
<div style="width: 100%; overflow: hidden; background: #000; height: 120px;" class="top-black"></div>
<div class="col-sm-offset-1 col-sm-10">
    <header style="position: relative; top: -120px;">
        <div class="header">
            <div class="logo-img">
                <img src="../img/logo.png" width="90" height="85" alt="NYSC Logo">
            </div>
            <div class="soft-name">
                <div class="top">SOKOTO STATE UNIVERSITY, SOKOTO</div>
                <div class="bottom">STAFF MAILING SYSTEM</div>
            </div>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>                     
                <li><a href="staff_profile.php">View Profile</a></li>
				<li><a href="message2.php">Group Chat</a></li>
                                <li><a href="staff.php">Send Message</a></li>
				 <li><a href="private_message.php">Sent Messages</a></li>
               
            </ul>
            <ul class="nav navbar-right">
                <li><a class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?=@$username?><i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a href="../logout.php">Log-out</a></li>
                    </ul>
                </li>
            </ul>       
        </nav>
    </header>
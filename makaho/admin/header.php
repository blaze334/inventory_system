<?php
    $username = "";
    if(!isset($_SESSION['clearance_user_cat']) || $_SESSION['clearance_user_cat'] != 'admin'){
        echo "<script>window.location = '../index.php';</script>";
    }
    $username = $_SESSION['clearance_username'];
?>
<div style="width: 100%; overflow: hidden; background: #000; height: 120px;"></div>
<div class="col-sm-offset-1 col-sm-10">
    <header style="position: relative; top: -120px;">
        <div class="header">
            <div class="logo-img">
                <img src="../img/logo.png" width="90" height="85" alt="NYSC Logo">
            </div>
            <div class="soft-name">
                <div class="top">SOKOTO STATE UNIVERSITY, SOKOTO</div>
                <div class="bottom">Staff MAILING SYSTEM</div>
            </div>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <ul class="nav navbar-nav">
              <li><a href="index.php" style="color:#FFF;"><b><span class="glyphicon glyphicon-home"></span> HOME</b></a> </li>     
<li><a href="add.php" style="color:#FF;"> <b> <span class="glyphicon glyphicon-user"> </span>ADD DEPAERTMENT</b></a></li>            
                <li><a href="staff.php" style="color:#FF;"> <b> <span class="glyphicon glyphicon-user"> </span>STAFF</b></a></li>
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
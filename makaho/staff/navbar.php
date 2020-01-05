<?php
    if(!isset($_SESSION['interaction_cat_id']) || $_SESSION['interaction_cat_id'] != "3"){
        echo "<script>window.location='../index.php';</script>";
    }
    $username = $_SESSION['interaction_username'];

    $view = "%#".$username."#%";
    $sel1 = mysqli_query($conn, "SELECT * FROM message WHERE (reciever='$username' OR sender='$username') AND transmission = 'unicast' AND view NOT LIKE '$view'") or die(mysqli_error($conn));
    $unicast = mysqli_num_rows($sel1);
    if($unicast == 0)
        $unicast = "";

    
    if($broadcast == 0)
        $broadcast = "";
?>
<nav class="navbar navbar-default" role="navigation">
    <ul class="nav navbar-nav">
        <li><a href="index.php" style="color:#FFF;"><b><span class="glyphicon glyphicon-home"></span> HOME</b></a> </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;"><i class="glyphicon glyphicon-book"></i> Course Registration
                <span class="caret"></span>&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
            
        </li>
        <li><a href="forum.php" style="color:#FFF;"><span class="glyphicon glyphicon-comment"></span> Forums <span class="badge"><?=$broadcast?></span></a></li>
        <li><a href="private_message.php" style="color:#FFF;"><span class="glyphicon glyphicon-send"></span> Messages <span class="badge"><?=$unicast?></span></a></li>                
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;"><i class="glyphicon glyphicon-user"></i> <?=$username?>
                <span class="caret"></span>&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
            <ul class="dropdown-menu" style="background-color:#444;">
                <li><a href="change_pass.php" >Change Password</a> </li>
                <li><a href="../logout.php">Logout</a> </li>
            </ul>
        </li>

    </ul>
</nav>
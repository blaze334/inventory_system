<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Mailing System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="../css/style.css">
    


    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/iCheck/icheck.min.js"></script>

    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/myScript.js"></script>

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <style type="text/css">
        .color-red{
            color:#006400 !important;
        }
        .color-blue{
            color:#006400;
            background-color:#FFF;
        }
        .bcolor-red{
            color:#FFF;
            background-color:#006400 !important;
        }
        .bcolor-blue{
            color:#FFF;
            background-color:#006400;
        }
        .bcolor-green{
            color:#FFF;
            background-color:#055318;
        }
        .bg-side{
            color:#FFF;
            background-color:#006400;
            text-align: left;
            font-weight: bolder;
        }
        .btn-sm.pull-right{
            color:#FFF !important;
            position: relative;
            top:-4px;
        }
        .btn-sm.pull-right:hover{
            color:#006400 !important;
        }
        .y{
            background-color:#FFA000 !important;            
        }
        .g{
            background-color:#055318 !important;            
        }
        .hover-y{
            background-color:#FFA000 !important;
            color:#FFF;
        }
        .hover-g{
            background-color:#055318 !important;
            color:#FFF;           
        }
        .hover-r{
            background-color:#FF0000 !important;
            color:#FFF;           
        }

        .hover-y:hover{
            background-color:#FFA000 !important;
            color:#999;
        }
        .hover-r:hover{
            background-color:#FF0000 !important;
            color:#999;
        }
        .hover-g:hover{
            background-color:#055318 !important;
            color:#999;           
        }
        .show-on-hover a:link {
            background-color:#00235C !important;
            color:#FFF !important;
        }
        .show-on-hover a:visited {
            background-color:#00235C !important;
            color: #FFF !important;
        }
        .show-on-hover a:hover {
            background-color:#333 !important;
            color:#FFF !important;
        }
        .show-on-hover a:active {
            background-color:#333 !important;            
            color: #FFF !important;
        } 


        .tab .show-on-hover{
            display: none;
        }
        .tab:hover .show-on-hover{
            display: inline-block;
        }

        .delete a:link {
            background-color:#7E0000 !important;
            color:#FFF !important;
        }
        .delete a:visited {
            background-color:#7E0000 !important;
            color: #FFF !important;
        }
        .delete a:hover {
            background-color:#333 !important;
            color:#FFF !important;
        }
        .delete a:active {
            background-color:#333 !important;            
            color: #FFF !important;
        }     

        .green a:link {
            background-color:#055318 !important;
            color:#FFF !important;
        }
        .green a:visited {
            background-color:#055318 !important;
            color: #FFF !important;
        }
        .green a:hover {
            background-color:#333 !important;
            color:#FFF !important;
        }
        .green a:active {
            background-color:#333 !important;            
            color: #FFF !important;
        }     

        .list-group-item-text{
            font-size: 14px !important;
        }
        .head{
            font-size: 16px !important;
        }

        .bg-side a:link {
            color:#FFF !important;
        }

        .bg-side a:visited {
            color:#FFF !important;
        }

        .bg-side a:hover {
            color:#006400 !important;
        }

        .bg-side a:active {
            color:#006400 !important;
        }

        /** MESSAGE STYLE**/
        .main{
            margin: auto;
            overflow: hidden;
        }

        /* FILE */
        .file{
            border-radius: 4px;
            padding: 5px;
            margin-top: 5px;  
            position: relative; 
            width: 400px;

        }

        /** content **/
        .message{
            width: 300px;
            float: left;
            padding-left: 10px;
            text-align: left !important;
        }

        /** title **/
        .title{
            font-weight: bold;
            font-size: 14px;
        }
        .file-footer{
            font-style: italic;
            font-size: 12px;
            vertical-align: bottom;
        }
        .sms{
            margin-bottom: 5px;
        }

        /** icon **/
        .icon{
            width: 40px;
            height: 60px;
            color: #444;
            text-align: center;
            font-size: 13px;
            line-height: 22px;
            position: relative;
            border-radius: 4px 14px 4px 4px;
            padding-top: 20px;
            float:left;
        }
        .icon:after{
            content: '';
            width: 0px;
            height: 0px;
            border-right: blue 10px solid;
            border-top: transparent 14px solid;
            border-right: transparent 0px solid;
            border-bottom: transparent 0px solid;
            position: absolute;
            left: 100%;
            margin-left: -14px;
            margin-top: -20px;
        }
        .icon span{
            font-weight: bold;
            color: #FFF;
            padding: 5px;
            border-radius: 5px;
        }

        .left-arrow:after{
            content: ' ';
            width: 0px;
            height: 0px;
            border-right-style: solid;
            border-right-width: 10px;
            border-left: transparent 10px solid !important;
            border-top: transparent 10px solid;
            border-bottom: transparent 10px solid;
            position: absolute;
            
        }
        .right-arrow:after{
            content: ' ';
            width: 0px;
            height: 0px;
            border-right: transparent 10px solid !important;
            border-left-style: solid;
            border-left-width: 10px;
            border-top: transparent 10px solid;
            border-bottom: transparent 10px solid;
            position: absolute;
            margin-top: -10px;
        }

        /* MESSAGE COLOR */
        /** blue **/
        .blue{
            border: blue 1px solid;    
        }
        .blue:after{
            border-right-color: blue;
            border-left-color: blue;
        }
        .blue .icon{
            border: blue 1px solid;
        }
        .blue .icon:after{
            border-left: blue 14px solid;
        }
        .blue .icon span{
            background-color: blue;    
        }

        .blue .title{
            color: blue;
        }
        /** red **/
        .red{
            border: red 1px solid;    
        }
        .red:after{
            border-right-color: red;
            border-left-color: red;
        }
        .red .icon{
            border: red 1px solid;
        }
        .red .icon:after{
            border-left: red 14px solid;
        }
        .red .icon span{
            background-color: red;    
        }
        .red .title{
            color: red;
        }
        /** green **/
        .green-f{
            border: green 1px solid;    
        }
        .green-f:after{
            border-right-color: green;
            border-left-color: green;
        }
        .green-f .icon{
            border: green 1px solid;
        }
        .green-f .icon:after{
            border-left: green 14px solid;
        }
        .green-f .icon span{
            background-color: green;    
        }
        .green-f .title{
            color: green;
        }
        /** maroon **/
        .maroon{
            border: maroon 1px solid;    
        }
        .maroon:after{
            border-right-color: maroon;
            border-left-color: maroon;
        }
        .maroon .icon{
            border: maroon 1px solid;
        }
        .maroon .icon:after{
            border-left: maroon 14px solid;
        }
        .maroon .icon span{
            background-color: maroon;    
        }
        .maroon .title{
            color: maroon;
        }
        /** yellow **/
        .yellow{
            border: #FFB400 1px solid;    
        }
        .yellow:after{
            border-right-color: #FFB400;
            border-left-color: #FFB400;
        }
        .yellow .icon{
            border: #FFB400 1px solid;
        }
        .yellow .icon:after{
            border-left: #FFB400 14px solid;
        }
        .yellow .icon span{
            background-color: #FFB400;    
        }
        .yellow .title{
            color: #FFB400;
        }
        /** navy **/
        .navy{
            border: navy 1px solid;    
        }
        .navy:after{
            border-right-color: navy;
            border-left-color: navy;}
        .navy .icon{
            border: navy 1px solid;
        }
        .navy .icon:after{
            border-left: navy 14px solid;
        }
        .navy .icon span{
            background-color: navy;    
        }
        .navy .title{
            color: navy;
        }
        /** olive **/
        .olive{
            border: olive 1px solid;    
        }
        .olive:after{
            border-right-color: olive;
            border-left-color: olive;
        }
        .olive .icon{
            border: olive 1px solid;
        }
        .olive .icon:after{
            border-left: olive 14px solid;
        }
        .olive .icon span{
            background-color: olive;    
        }
        .olive .title{
            color: olive;
        }
        /** orangered **/
        .orangered{
            border: orangered 1px solid;    
        }
        .orangered:after{
            border-right-color: orangered;
            border-left-color: orangered;
        }
        .orangered .icon{
            border: orangered 1px solid;
        }
        .orangered .icon:after{
            border-left: orangered 14px solid;
        }
        .orangered .icon span{
            background-color: orangered;    
        }
        .orangered .title{
            color: orangered;
        }
        /** purple **/
        .purple{
            border: purple 1px solid;    
        }
        .purple:after{
            border-right-color: purple;
            border-left-color: purple;
        }
        .purple .icon{
            border: purple 1px solid;
        }
        .purple .icon:after{
            border-left: purple 14px solid;
        }
        .purple .icon span{
            background-color: purple;    
        }
        .purple .title{
            color: purple;
        }
        /** seagreen **/
        .seagreen{
            border: seagreen 1px solid;    
        }
        .seagreen:after{
            border-right-color: seagreen;
            border-left-color: seagreen;
        }
        .seagreen .icon{
            border: seagreen 1px solid;
        }
        .seagreen .icon:after{
            border-left: seagreen 14px solid;
        }
        .seagreen .icon span{
            background-color: seagreen;    
        }
        .seagreen .title{
            color: seagreen;
        }
        /** brown **/
        .brown{
            border: brown 1px solid;    
        }
        .brown:after{
            border-right-color: brown;
            border-left-color: brown;
        }
        .brown .icon{
            border: brown 1px solid;
        }
        .brown .icon:after{
            border-left: brown 14px solid;
        }
        .brown .icon span{
            background-color: brown;    
        }
        .brown .title{
            color: brown;
        }
        .text-area{
             position: fixed;
             bottom: -15px;
             background-color:transparent;
        }
        .message-form{
           
        }

        /* CHAT */
        .chat{
            list-style-type: none;
            background-color: #006400;
            border-bottom: #999 2px solid; 
            text-align: left;
            color:#FFF !important;
            margin:0 0 -10px 0;            
        }
        .chat:hover{
            background-color: #666;
        }
        .chat-container{
            width: 100%;
            margin: auto;
            overflow: hidden;

        }
        .chat-image{
            width:20%;
            float:left;
        }
        .chat-image img{
            border-radius: 25px;
        }
        .chat-name{
            width: 60%;
            float:left;
            margin-top: 5px;              
        }
        .chat-name h4{
            margin: 0;
            padding: 0;            
        }
        .chat-message{
            width: 20%;
            height: 100%;
            float:left;  
            text-align: center;
            margin-top: 13px;          
        }
        .chat-message span{
            background-color: #005800;
            font-size: 20px;
        }
        nav .badge{
            background-color: #006400;
            border: #FFF 1px solid;
        }

        /*HEADER*/
.header{
    padding: 3px;
    display: block;
    width: 100% !important;
    overflow: hidden;
    text-align: center;
    color: #006400;
}
.logo-img, .soft-name{
    display: inline-block;
    vertical-align: middle;
    position: relative;
    padding-right: 50px;
}
.soft-name .top{
    font-size: 30px;
    font-family: verdana, sans-serif;
    padding-top: 7px;
    font-weight: 600;
}
.soft-name .bottom{
    font-size: 20px;
    font-family:verdana, sans-serif;
    color: #000;
    font-weight: 600;
}
/*END OF HEADER*/
.navbar{
    background: linear-gradient(#333, #000, #333);
    border-radius: 0px;
    margin-bottom: 0px;
    font-weight: bold;
    padding-right: 15px; 
    border: none;
}
ul.nav li{
    font-weight: bold!important;    
}
.nav a:link,.nav a:visited,.nav a{
    color:#FFF!important;    
}
.nav a:hover,.nav a:active{
    background-color: #006400!important;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}
.nav .active{
    background-color: #FF6400!important;
    color:#FFF!important;    
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}
.navbar-right{
    padding: 0px!important;
}
.dropdown-menu li{
    font-weight: bold;   
}
.dropdown-menu a:link,.dropdown-menu a:visited{
    color:#006400!important;    
}
.dropdown-menu a:hover,.dropdown-menu a:active{
    color: #FFF!important;
    background-color: #006400!important;
}
</style>
</head>
<body style="background-color:#BBB;">
<?php
include_once "../config/conn.php";
include_once "../config/functions.php";
include "header.php";
$index = -1;
$page = 1;
  $username = $_SESSION['clearance_username'];

    $view = "%#".$username."#%";
    $sel1 = mysqli_query($conn, "SELECT * FROM message WHERE (reciever='$username' OR sender='$username') AND transmission = 'unicast' AND view NOT LIKE '$view'") or die(mysqli_error($conn));
    $unicast = mysqli_num_rows($sel1);
    if($unicast == 0)
        $unicast = "";

    $select = mysqli_query($conn, "SELECT * FROM staff WHERE staff_no = '$username'") or die(mysqli_error($conn));
    $broadcast = 0;
    while($fetch = mysqli_fetch_array($select)) {
        $br = $fetch['staff_no'];
        $sel2 = mysqli_query($conn, "SELECT * FROM message WHERE reciever='$br' AND transmission = 'broadcast' AND view NOT LIKE '$view'") or die(mysqli_error($conn));
        $broadcast += mysqli_num_rows($sel2);            
    }
    if($broadcast == 0)
        $broadcast = "";
	?>
<div>
    <section style="background-color:#DDD; text-align:center; padding: 20px 0px;overflow: hidden;"><br><br>
        <div class="panel col-sm-offset-2 col-sm-8" style="background-color:#FFF;"><br/>
            <div class="panel-heading bcolor-blue" style="color:#fff !important;"><i class="glyphicon glyphicon-comment"></i><b> Chats with Staff</b></div>
            <div class="panel-body">
                <div class="well col-sm-12" style="padding-top: 8px;">                    

                    <?php


                        $select = mysqli_query($conn, "SELECT * FROM message WHERE (sender = '$username' OR reciever = '$username') AND transmission = 'unicast' ORDER BY `time` DESC") or die(mysqli_error($conn));        
                        $num = mysqli_num_rows($select);

                        if($num == 0){
                            echo '<div class="alert alert-danger" style="text-align: center; padding: 10px;">
                            No conversion yet
                        </div>';        
                        }
                        else {
                            $already = "|";
                            while($fetch = mysqli_fetch_array($select)) {
                                $sender = $fetch['sender'];
                                $reciever = $fetch['reciever'];
                                $date = date("jS F, Y",$fetch['time']);
                                $time = date("h:i:s A",$fetch['time']);

                                if($sender == $username){
                                    $sel = mysqli_query($conn, "SELECT * FROM staff WHERE id= '$reciever'") or die(mysqli_error($conn));
                                    $user = $reciever;
                                }
                                else{
                                    $sel = mysqli_query($conn, "SELECT * FROM staff WHERE staff_no = '$sender'") or die(mysqli_error($conn));
                                    $user = $sender;
                                }

                                $search = "|".$user."|";
                                
                                if(str_replace($search, "!@#$%^&*()", $already) == $already){
                                    $fet = mysqli_fetch_array($sel);
                                    $passport = $fet['passport'];
                                    $id = $fet['staff_no'];

                                    $view = "%#".$username."#%";
                                    $sel2 = mysqli_query($conn, "SELECT * FROM message WHERE ((reciever='$username' AND sender='$id') OR (sender='$username' AND reciever='$id')) AND view NOT LIKE '$view'") or die(mysqli_error($conn));
                                    $unread = mysqli_num_rows($sel2);
                                    if($unread == 0){
                                        $unread = "";
                                    }
                                    
                                    echo '<ul>
                                            <li class="chat"><a href="private_message1.php?id='.$id.'">
                                                <div class="chat-container">
                                                    <div class="chat-image">
                                                      <img src="../img/passport/'.$passport.'" width="50" height="50">
                                                    </div>
                                                    <div class="chat-name" style="color:white;">
                                                        <h4>'.$user.'</h4>
                                                        <span>'.$date.'</span><span style="float: right;">'.$time.'</span>
                                                    </div>
                                                    <div class="chat-message">
                                                        <span class="badge badge-success">'.$unread.'</span>
                                                    </div>
                                                </div></a>
                                            </li>                        
                                        </ul>';   

                                    $already .= $user."|";    
                                }                     
                            }
                        }            
                    ?>
                    </table> 
                </div>
            </div>
        </div>            
    </section>
</div>
</body>
</html>
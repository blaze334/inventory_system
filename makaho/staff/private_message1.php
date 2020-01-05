<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Interaction System</title>
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
        $br  = $fetch['staff_no'];
        $sel2 = mysqli_query($conn, "SELECT * FROM message WHERE reciever='$br' AND transmission = 'broadcast' AND view NOT LIKE '$view'") or die(mysqli_error($conn));
        $broadcast += mysqli_num_rows($sel2);            
    }
    if($broadcast == 0)
        $broadcast = "";
if(!isset($_GET['id']) && !isset($_GET['download'])){
    echo "<script>window.location='index.php'</script>";
}
else{
    $user = $_GET['id']; 
    //UPDATE VIEW
    $view = "%#".$username."#%";
    $sel1 = mysqli_query($conn, "SELECT * FROM message WHERE reciever = '$username' AND view NOT LIKE '$view'") or die(mysqli_error($conn)); 
    $num1 = mysqli_num_rows($sel1);
    if($num1 > 0){
        while($fet1 = mysqli_fetch_array($sel1)){
            $id = @$fet1['id'];
            $new_view = $fet1['view'].$username."#";
            $update = mysqli_query($conn, "UPDATE message SET view='$new_view' WHERE id = '$id'") or die(mysqli_error($conn));
        }
    }    
}


if(isset($_POST['send-text']) && str_replace(" ", "", $_POST['text']) != ""){

    $content = $_POST['text'];
    $sender = $username;
    $reciever = $user;
    $type = "text";
    $time = time() - 3600;

    //echo "<script>alert('Hello')</script>";
    $view = "#".$username."#";
    $insert = mysqli_query($conn, "INSERT INTO message(content, sender, reciever, type, view, transmission, `time`) VALUES('$content', '$sender', '$reciever', '$type', '$view', 'unicast', '$time')");
    if($insert){ 
        echo "<script>alert('Message Sent')</script>";   
    }
}

$upload='../file/';
if(isset($_POST['send-file']) && str_replace(" ", "", $_FILES["file"]["name"]) != ""){

    //FILE
    $time = time() - 3600;
    $ext = strtolower(pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
    if($ext == "mp4"){
        $time = "VID-".$time;
    }
    elseif($ext == "mp3"){
        $time = "AUD-".$time;
    }
    elseif($ext == "pdf"){
        $time = "PDF-".$time;
    }
    elseif($ext == "docx" || $ext == "doc"){
        $time = "DOC-".$time;
    }
    elseif($ext == "txt"){
        $time = "TXT-".$time;
    }
    elseif($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif"){
        $time = "IMG-".$time;
    }
    else{
        $time = strtoupper($ext).$time;
    }

    if($ext!="mp4" && $ext!="mp3" && $ext!="pdf" && $ext!="docx" && $ext!="doc" && $ext!="txt" && $ext!="jpg" && $ext!="png" && $ext!="jpeg" && $ext!="gif"){
        echo "<script>alert('Only VIDEO, AUDIO, IMAGE, PDF, DOCX or TXT file are allowed to be sent')</script>";      
    }
    else{

        $file=$upload.$time.".".$ext;
        $tmpname=$_FILES['file']['tmp_name'];
        //END
        $result=move_uploaded_file($tmpname, $file);
        if(!get_magic_quotes_gpc()){
            $file=addslashes($file);
        }
        $file = basename($file);

        $sender = $username;
        $reciever = $user;
        $type = "file";
        $time = time() - 3600;

        $view = "#".$username."#";
        $insert = mysqli_query($conn, "INSERT INTO message(content, sender, reciever, type, view, transmission, `time`) VALUES('$file', '$sender', '$reciever', '$type', '$view', 'unicast', '$time')");
        if($insert){ 
            echo "<script>alert('Message Sent')</script>";   
        }
    }
}

//DOWNLOAD
if(isset($_GET['download']) && $_GET['download'] != ""){
    $download = $_GET['download'];
    $path = "../file/".$download;
    header('content-Disposition:attachment; filename:'.$path);
    header('content-type:application/octent-strem');
    header('content-length='.filesize($path));
    readfile($path);
}

?>
<div>
    <section style="background-color:#DDD; text-align:center; padding: 20px 0px;overflow: hidden;"><br><br>
        <div class="panel col-sm-offset-2 col-sm-8" style="background-color:#FFF;"><br/>
            <div class="panel-heading bcolor-blue" style="color:#fff !important;"><i class="glyphicon glyphicon-comment"></i><b> Message from <?=$user?></b></div>
            <div class="panel-body">
                <div class="well col-sm-12" style="padding-top: 8px; overflow: hidden;">
                    <?php
                        $select = mysqli_query($conn, "SELECT * FROM message WHERE (reciever='$username' AND sender='$user') OR (sender='$username' AND reciever='$user')") or die(mysqli_error($conn));        
                        $num = mysqli_num_rows($select);

                        if($num == 0){
                            echo '<div class="alert alert-danger" style="text-align: center; padding: 10px; margin-top:10px;">
                            No conversation yet
                        </div>';        
                        }
                        else {                            
                            while($fetch = mysqli_fetch_array($select)) {
                                $sender = $fetch['sender'];
                                $type = $fetch['type'];
                                $content = $fetch['content'];
                                $date = date("d/m/Y",$fetch['time']);
                                $time = date("h:i:s A",$fetch['time']);

                                $sel1 = mysqli_query($conn, "SELECT * FROM staff WHERE staff_no='$sender'") or die(mysqli_error($conn));        
                                $num1 = mysqli_num_rows($sel1);

                                if($user == $sender){
                                    $class = "left-arrow maroon";
                                    $name = $sender;
                                }
                                else{
                                    $class = "right-arrow col-sm-offset-3 navy";
                                    $name = "Me";
                                }
                                
                                
                                if($type == "file"){
                                    $ext = pathinfo(basename($content), PATHINFO_EXTENSION);
                                    echo '<div class="file '.$class.'">
                                        <div class="main">                        
                                            <div class="icon">
                                                <span>'.$ext.'</span>
                                            </div>
                                            <div class="message">
                                                <div class="title">'.$name.'</div>
                                                <div class="sms">
                                                <a href=download.php?id='.$content.'>'.$content.'</a>
                                                </div>
                                                <div class="file-footer">
                                                    <span>'.$date.'</span><span style="float: right;">'.$time.'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';                                    
                                }
                                else{
                                    echo '<div class="file '.$class.'">
                                        <div class="main">                        
                                            <div class="message">
                                                <div class="title">'.$name.'</div>
                                                
                                                <div class="sms">
                                                '.$content.'
                                                </div>
                                                <div class="file-footer">
                                                    <span>'.$date.'</span><span style="float: right;">'.$time.'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';                                    
                                }
                            }
                        }            
                    ?> 
                                       
                </div>
            </div>
            <div style="height: 40px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div> 
    </section>
</div>
<div class="text-area container" style="padding: 0px 10px;">
    <div class="message-form col-sm-offset-2 col-sm-8" style="position: relative;left:-11px;">
        <form class="form-horizontal" role="form" method="post" enctype="Multipart/form-data">                            
            <div class="form-group" style="border-bottom: #FFF 10px solid; margin-bottom: 0px;">                                
                <div class="input-group">                                
                    <textarea class="form-control" placeholder="Type your message" name="text" required="required"></textarea>
                    <div class="input-group-addon" style="padding: 0px !important; background-color: green; border-radius: 3px;">
                        <button class="btn btn-success" type="submit" name="send-text"><span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="post" enctype="Multipart/form-data">
            <div class="form-group" style="margin-top: 0px;">
                <div class="input-group">                                
                    <input type='file' class='form-control' name='file' required="required" placeholder="Attach a file" style="height: 38px;" />
                    <div class="input-group-addon" style="padding: 0px !important;">
                        <button class="btn btn-success" style="margin: 0px;" type="submit" name="send-file"><span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>                
            </div>                                    
        </form>                        
    </div>
</div>

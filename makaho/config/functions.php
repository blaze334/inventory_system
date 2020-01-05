<?php

function validate($data){
    global $conn;
    $data = htmlspecialchars($data);
    $data = trim(stripslashes($data));
    $data = mysqli_escape_string($conn, trim($data));
    $data = strip_tags($data);
    return $data;
}
function get_channels($recever_id, $student_dept_id){
    global $conn;
    $channels = [];
    $sel = mysqli_query($conn, "SELECT d.role, d.dept_id, d.faculty_id, dt.name department, f.name faculty, dt.faculty_id dept_faculty_id FROM dignitary d LEFT JOIN department dt ON d.dept_id=dt.id LEFT JOIN faculty f ON d.faculty_id=f.id WHERE d.id='$recever_id'");
    if(mysqli_num_rows($sel) == 0){

    }else{
        $fet = mysqli_fetch_array($sel);
        $role = @$fet['role'];
        $dept_id = @$fet['dept_id'];
        $faculty_id = @$fet['faculty_id'];
        $department = @$fet['department'];
        $faculty = @$fet['faculty'];
        $dept_faculty_id = @$fet['dept_faculty_id'];
        //STUDENT DEPARTMENT AND FACULTY
        $sel2 = mysqli_query($conn, "SELECT d.id, d.faculty_id, d.name department, f.name faculty FROM department d LEFT JOIN faculty f ON d.faculty_id=f.id WHERE d.id='$student_dept_id'");
        $fet2 = mysqli_fetch_array($sel2);
        $student_dept = @$fet2['department'];
        $student_faculty = @$fet2['faculty'];   
        $student_faculty_id = @$fet2['faculty_id'];   
        //END OF STUDENT DEPARTMENT AND FACULTY
        if($dept_id != ""){
            if($dept_id == $student_dept_id){
                $channels[] = "Head of Department (".$department.")";
            }elseif($dept_faculty_id == $student_faculty_id){
                $channels[] = "Head of Department (".$student_dept.")";
                $channels[] = "Head of Department (".$department.")";
            }else{                
                $channels[] = "Head of Department (".$student_dept.")";
                $channels[] = "Dean of Faculty (".$student_faculty.")";

                $sel3 = mysqli_query($conn, "SELECT * FROM faculty WHERE id='$dept_faculty_id'");
                $fet3 = mysqli_fetch_array($sel3);
                $faculty = @$fet3['name'];
                $channels[] = "Dean of Faculty (".$faculty.")";
                $channels[] = "Head of Department (".$department.")";
            }
        }elseif($faculty_id != ""){
            if($faculty_id == $student_faculty_id){
                $channels[] = "Head of Department (".$student_dept.")";
                $channels[] = "Dean of Faculty (".$student_faculty.")";
            }else{                
                $channels[] = "Head of Department (".$student_dept.")";
                $channels[] = "Dean of Faculty (".$student_faculty.")";
                $channels[] = "Dean of Faculty (".$faculty.")";
            }
        }elseif($role == "Officer of Student Affairs"){
            $channels[] = "Officer of Student Affairs";
        }elseif($role == "Dean of Student Affairs"){
            $channels[] = "Officer of Student Affairs";
            $channels[] = "Dean of Student Affairs";
        }elseif($role == "Registrar"){
            $channels[] = "Officer of Student Affairs";
            $channels[] = "Dean of Student Affairs";
            $channels[] = "Registrar";
        }elseif($role == "Vice Chancellor"){
            $channels[] = "Head of Department (".$student_dept.")";
            $channels[] = "Dean of Faculty (".$student_faculty.")";
            $channels[] = "Vice Chancellor";
        }
    }
    return $channels;
}
function get_day_name($timestamp) {

    $date = date('jS M, Y', $timestamp);

    if($date == date('jS M, Y')) {
      $date = 'Today';
    } 
    else if($date == date('jS M, Y', time() - (24 * 60 * 60))) {
      $date = 'Yesterday';
    }
    return $date;
}
function generate_pin($no){
    global $conn;
    for($i = 0; $i < $no; $i++){
        $char = array("A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $alpha = "";
        for($j = 0; $j < 2; $j++){
            $alpha .= $char[mt_rand(0,23)];
        }
        $pin = $alpha.mt_rand(100000, 999999);
        $serial = mt_rand(10000000, 99999999);

        $select = mysqli_query($conn, "SELECT * FROM registration_pin WHERE pin = '$pin' && `serial_no` = '$serial'") or die(mysqli_error($conn));
        $num = mysqli_num_rows($select);

        if($num != 0){
            $i--;
        }
        else {
            $insert = mysqli_query($conn, "INSERT INTO registration_pin(pin, serial_no, status) VALUES('$pin', '$serial', 'AVAILABLE')") or die(mysqli_error($conn));
        }
    }
}
function get_acronym($str){
    $words = preg_split("/[\/\s,_-]+/", $str);
    $acronym = "";
    foreach ($words as $w) {
      $acronym .= $w[0];
    }
    return strtoupper(preg_replace("/[^A-Za-z0-9]/", '', preg_replace('/\s*\([^)]*\)?/', '',$acronym)));
}
//RESIZE IMAGE
function createFixSizeImage( $path, $file_name, $new_width, $new_height ) 
{

    $complete = $path.$file_name;
    $image_info   = getimagesize( $complete );
    $image_width  = $image_info[0];
    $image_height = $image_info[1];
    $image_type   = $image_info[2];
    
    $info = pathinfo($complete);
    $basename = $info['filename'];
    $new_name = $basename.".jpg";
    if ( strtolower($info['extension']) == 'jpeg' || strtolower($info['extension']) == 'jpg' ) {
        $img = imagecreatefromjpeg( $complete );
        $width = imagesx( $img );
        $height = imagesy( $img );

        $tmp_img = imagecreatetruecolor( $new_width, $new_height );

        imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
        if(file_exists($complete)){
            unlink($complete);
        }
        imagejpeg( $tmp_img, $path . $new_name, 100 );
        imagedestroy($img);
        imagedestroy($tmp_img);
    }elseif ( strtolower($info['extension']) == 'png' ) {

        $img = imagecreatefrompng( $complete );

        $width = imagesx( $img );
        $height = imagesy( $img );

        $tmp_img = imagecreatetruecolor( $new_width, $new_height );

        imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

        if(file_exists($complete)){
            unlink($complete);
        }
        imagejpeg( $tmp_img, $path . $new_name, 100 );
        imagedestroy($img);
        imagedestroy($tmp_img);
    }elseif ( strtolower($info['extension']) == 'gif' ) {
        $img = imagecreatefromgif( $complete );

        $width = imagesx( $img );
        $height = imagesy( $img );
        
        $tmp_img = imagecreatetruecolor( $new_width, $new_height );

        imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

        if(file_exists($complete)){
            unlink($complete);
        }
        imagejpeg( $tmp_img, $path . $new_name, 100 );
        imagedestroy($img);
        imagedestroy($tmp_img);
    }
    return $new_name;
}
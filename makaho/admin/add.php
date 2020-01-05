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
    </head>
	<body>
<?php
include_once "../config/conn.php";
include_once "../config/functions.php";
 include "header.php";

$name = "";
$faculty_id = "";


if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $faculty_id = $_POST['faculty_id'];
   
        
        $check="SELECT * FROM department where name='$name' and faculty_id='$faculty_id'";

        $result=mysqli_query($conn, $check);
        
        $count=mysqli_num_rows($result);

        if($count >0){

             echo "<script>alert('Record Already Exist');</script>";
        } else{

            $insert = mysqli_query($conn, "INSERT INTO department(name, faculty_id) VALUES('$name', '$faculty_id')") or die(mysqli_error($conn));

        if ($insert) {
            echo "<script>alert('Department added Successfully');</script>";

        }        
        }

        
    }

?>
<div>
    <section style="background-color:#DDD; text-align:center; padding: 20px 0px; overflow: hidden;"><br><br>     
        <div class="panel col-sm-offset-3 col-sm-6" style="background-color:#FFF;"><br/>
                  <div class="panel-heading bcolor-blue" style="color:#fff !important;"><i class="glyphicon glyphicon-plus"></i><b> Add Department</b></div>
                  <div class="panel-body">
                    <div class="alert" style="text-align:justify; color:black;">
                        <div class="alert" style="color:#000; background-color:#CCC;">
                            <p style="text-align: center; padding: 10px;">
                                Enter the department name and the faculty id.
                            </p>
                        </div>
                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <input type="text"  class="form-control" id="area" placeholder="Department Name" name="name" maxlength="20"  required="required">
                                </div>                    
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Course Title" name="faculty_id" maxlength="1" required="required" >
                                </div>                    
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <input name='submit' type="submit" class="btn bcolor-blue col-sm-12" value="Add Department">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel bcolor-red">
            </div>
    </section>
</div>

	<?php include "../footer.php";?>
</body>
</html>
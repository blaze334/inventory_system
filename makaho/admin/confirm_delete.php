<?php
include_once "../config/conn.php";
include_once "../config/functions.php";

if(!isset($_GET['id']) || $_SERVER['HTTP_REFERER']==''){
    echo "<script>window.location='index.php'</script>";
}
else{
	$id = $_GET['id'];
	
	
	    $delete = mysqli_query($conn, "DELETE FROM staff WHERE id = '$id'") or die(mysqli_error($conn));
	    $delete1 = mysqli_query($conn, "DELETE FROM user WHERE username = '$id'") or die(mysqli_error($conn));
	    if($delete && $delete1){
	    echo '<script type="text/javascript">
	    	alert("Staff Deleted Successfully");
		    window.location="staff.php";	
		 </script>';
	}}

?>

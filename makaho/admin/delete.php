<?php
include_once "../config/conn.php";
include_once "../config/functions.php";
$index = -1;
$page = 1;
if(!isset($_GET['id']) || $_SERVER['HTTP_REFERER']==''){
    echo "<script>window.location='index.php'</script>";
}
else{
	$value = $_GET['id'];
	

	    echo '<script type="text/javascript">
		var r = confirm("Are you Sure You want to Delete this record'.$value.'");
		if (r == true) {
		     window.location="confirm_delete.php?id='.$value.'";
		 } else {
		     window.location="index.php";
		 } 
		 </script>';
}
?>

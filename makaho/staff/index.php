<?php
include_once "../config/conn.php";
//var_dump(phpversion());
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSU | Staff Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
    <link rel="shortcut icon" href="../img/icon.ico">
</head>
<body>
	<?php include "header.php";?>
	<section id="showcase">
		<div id="mycarousel" class="carousel slide" date-ride="carousel" data-interval="900">
		    <ol class="carousel-indicators">
		        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
		        <li data-target="#mycarousel" data-slide-to="1"></li>
		        <li data-target="#mycarousel" data-slide-to="2"></li>
		        <li data-target="#mycarousel" data-slide-to="3"></li>
		        <li data-target="#mycarousel" data-slide-to="4"></li>
		    </ol>
		    <div class="carousel-inner" style="position:relative; top: -100px;" >
		        <div class="item active" style="height:500px;">
		            <img src="../img/img1.jpg" style="width:100%;height: 500px;">
		        </div>
		        <div class="item" style="height:500px;">
		            <img src="../img/img2.jpg" style="width:100%;height: 500px;">
		        </div>
		        <div class="item" style="height:500px;">
		            <img src="../img/img3.jpg" style="width:100%;height: 500px;">
		        </div>
		        <div class="item" style="height:500px;">
		            <img src="../img/img4.jpg" style="width:100%;height: 500px;">
		        </div>
		        <div class="item" style="height:500px;">
		            <img src="../img/img5.jpg" style="width:100%;height: 500px;">
		        </div>
		    </div>

		    <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
		        <span class="glyphicon glyphicon-chevron-left"></span>
		    </a>
		    <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
		        <span class="glyphicon glyphicon-chevron-right"></span>
		    </a>
		</div>
	</section>

	<script type="text/javascript">
      $(document).ready(function () {
          $('.carousel').carousel({
              interval: 2500
          });

          $('.carousel').carousel('cycle');
      });
  	</script>
	<?php include "../footer.php";?>
</body>
</html>
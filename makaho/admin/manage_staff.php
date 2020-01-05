<?php
include_once "../config/conn.php";
include_once "../config/functions.php";
$index = -1;
$page = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSU | Manage Staff</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<script src="../js/jquery-2.1.1.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
    <link rel="shortcut icon" href="../img/icon.ico">    
</head>
<body>
	<?php include "header.php";?>
	<div style="position:relative; top: -100px;">
		<div class="col-sm-12 well">
            <?php
                $query = mysqli_query($conn, "SELECT s.*,dt.name department,f.name faculty FROM staff s LEFT JOIN department dt ON dt.id=s.dept_id LEFT JOIN faculty f ON f.id=s.faculty_id ORDER BY s.role");
                $search = "";
                if(isset($_POST['search_btn'])){
                    $search = validate($_POST['search']);
                    if(strtolower($search) == "male"){
                        $value = $search;
                    }else{
                        $value = "%".$search."%";
                    }
                    $query = mysqli_query($conn, "SELECT s.*,dt.name department,f.name faculty FROM staff s LEFT JOIN department dt ON dt.id=s.dept_id LEFT JOIN faculty f ON f.id=s.faculty_id WHERE s.name LIKE '$value' || s.gender LIKE '$value' || s.phone LIKE '$value' || s.email LIKE '$value' || s.username LIKE '$value' || s.role LIKE '$value' || dt.name LIKE '$value' || f.name LIKE '$value' ORDER BY s.role");
                }
                $fetch = mysqli_fetch_all($query, MYSQLI_ASSOC); 
                $num = mysqli_num_rows($query);            
                $page_records = 20;

                echo '<form class="form-horizontal" role="form" method="post" enctype="Multipart/form-data">
                        <div class="form-group col-sm-4">                                
                            <input type="text" value="'.$search.'" class="form-control" placeholder="Search" name="search" maxlength="30" style="border-top-right-radius:0px; border-bottom-right-radius:0px;">
                        </div>
                        <div class="form-group col-sm-3">
                            <button type="submit" name="search_btn" class="btn btn-submit" style="border-top-left-radius:0px; border-bottom-left-radius:0px;">Search</button>                    
                        </div>
                        <div class="alert alert-info pull-right">
                            <b>No. of Record(s): '.$num.'</b>
                        </div>
                    </form><br>';                                          
                if($num == 0){
                    echo '<br><div class="msg alert alert-danger">No Record found</div>';
                }
                else{   
                    echo'<div id="records_area"></div><div id="pagination_area"></div>';
                }                    
            ?>
		</div>
	</div>
	<?php include "../footer.php";?>
<script type="text/javascript">
    //LIST
    pagination(parseInt("<?php echo $page;?>"));
    function pagination(id){
        if(parseInt("<?php echo $num?>") > 0){
            var page_records = parseInt("<?php echo $page_records;?>");
            var fetch = <?php echo json_encode($fetch); ?>;
            var index = parseInt("<?php echo $index;?>");
            var records_area = document.getElementById("records_area");
            records_area.innerHTML = "";
            var begin = (id - 1) * page_records;
            var end = id * page_records;
            var append_records = '<div class="alert alert-info msg">Below is the list of registered staff</div><table class="table table-striped table-bordered inline-edit">' +
                '<tr>' +
                    '<th>#</th>' +
                    '<th>Name</th>' +
                    '<th>Gender</th>' +
                    '<th>Phone</th>' +
                    '<th>E-mail</th>' +
                    '<th>Username</th>' +
                    '<th>Role</th>' +
                    '<th style="width:40px !important;">Operation</th>' +
                '</tr>';
            for(var i = begin; i < end; i++){
                if(i >= fetch.length){
                    break;
                }
                var sno = i + 1;
                var staff_id = fetch[i]['id'];                        
                var name = html_entity_decode(fetch[i]['name']);
                var gender = html_entity_decode(fetch[i]['gender']);
                var phone = html_entity_decode(fetch[i]['phone']);
                var email = html_entity_decode(fetch[i]['email']);
                var username = html_entity_decode(fetch[i]['username']);
                var role = html_entity_decode(fetch[i]['role']);
                var department = html_entity_decode(fetch[i]['department']);
                var faculty = html_entity_decode(fetch[i]['faculty']);
                if(role == "Head of Department"){
                    role += " (" + department + ")";
                }else if(role == "Dean of Faculty"){
                    role += " (" + faculty + ")";
                }
                
                append_records += '<tr>'+
                '<td>'+sno+'</td>'+
                '<td>'+name+'</td>'+
                '<td>'+gender+'</td>'+
                '<td>'+phone+'</td>'+
                '<td>'+email+'</td>'+
                '<td>'+username+'</td>'+
                '<td>'+role+'</td>'+
                '<td>'+
                    '<a href="edit_staff.php?id='+staff_id+'"><button class="btn btn-xs btn-submit col-sm-12" type="button">Edit</i>'+
                    '</button></a>'+
                '</td>'+
                '</tr>';
            }
            append_records += "</table>";
            records_area.innerHTML = append_records;
            
            //PAGES
            var area = document.getElementById('pagination_area');
            area.innerHTML = "";
            var pages = 0;
            if(fetch.length > 0){
                var pages = Math.ceil(fetch.length / page_records);
            }
            if(pages > 1){
                var current_page = id;
                var prev = id - 1;
                var next = id + 1;
                var append_string = '<div class="paging">';
                var start = 2;
                var last = pages - 1;
                var elipsis = "";
                var inner = 9;
                if(pages < 11){
                    inner = pages - 2;
                }
                var middle = Math.floor(inner/2) + 2;        
                var active  = ' class="active"';
                if(current_page != 1){
                    append_string += '<a onclick="pagination('+prev+')">&laquo;</a>';
                    active = "";
                }
                append_string += '<a onclick="pagination(1)"' + active + '>1</a>';
                if(current_page > middle && pages > 11){
                    start = current_page - 3;
                    append_string += '<a class="elipsis">...</a>';
                    inner--;
                }
                if(current_page + 4 < last && pages > 11){
                    elipsis = '<a class="elipsis">...</a>';
                    inner--;
                }
                if(current_page + 4 > last){
                    start -= current_page + 4 - last;
                }
                if(start < 2){
                    start = 2;
                }
                var val = 0;
                for(var i = 0; i < inner; i++){
                    active = "";
                    val = start + i;
                    if(val == current_page){
                        active  = ' class="active"';
                    }
                    append_string += '<a onclick="pagination('+val+')"' + active + '>'+val+'</a>';
                }
                append_string += elipsis;
                active = "";
                if(pages == current_page){
                    active  = ' class="active"';
                }
                if(pages > 1){
                    append_string += '<a onclick="pagination('+pages+')"' + active + '>'+pages+'</a>';
                }
                if(current_page != pages){
                    append_string += '<a onclick="pagination('+next+')">&raquo;</a>'
                }
                area.innerHTML = append_string;
            }
        }               
    }
$('#select_all').click(function(event) { 
    var state = this.checked;  
    $(':checkbox').each(function() {
        this.checked = state;                        
    });
});
$(':checkbox').click(function(event) {
    if(this.checked == false){
        document.getElementById("select_all").checked = false;
    }                        
});
</script>
</body>
</html>
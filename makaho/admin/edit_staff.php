<?php
include_once "../config/conn.php";
include_once "../config/functions.php";
if(isset($_GET['id']) && preg_match("/^[0-9A-Za-z]+$/", $_GET['id'])){
    $staff_id = validate($_GET['id']);
}else{
    echo '<script>window.location="manage_dignitaries.php";</script>';
}
$errors = [];
if(isset($_POST['submit'])){
    $first_name = validate($_POST['first_name']);
    $other_names = validate($_POST['other_names']);
    $gender = validate($_POST['gender']);
    $dob = validate($_POST['dob']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $state = validate($_POST['state']);
    $lga = validate($_POST['lga']);
    $address = validate($_POST['address']);
    $pass_ext = strtolower(pathinfo(basename(@$_FILES["passport"]["name"]), PATHINFO_EXTENSION));
    $staff_no = validate($_POST['staff_no']);
    $dept_id = validate($_POST['dept_id']);
    
    if(!preg_match("/^.{1,30}$/", $first_name)){
        $errors[] = "First Name is required and should not be more than 30 characters";
    }
    if(!preg_match("/^.{1,60}$/", $other_names)){
        $errors[] = "Other Names is required and should not be more than 60 characters";
    }
    if($gender != "Male" && $gender != "Female"){
        $errors[] = "Please Select Gender";
    }
    if($dob == ""){
        $errors[] = "Please Select Date of Birth";
    }
    if(!preg_match("/^0(7|8|9)(0|1)[0-9]{8}$/", $phone)){
        $errors[] = "Invalid Phone Number format";
    }
    if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/", $email)){
        $errors[] = "Invalid Email Address";
    }
    if($state == ""){
        $errors[] = "Please Select State";
    }
    if($lga == ""){
        $errors[] = "Please Select LGA";
    }
    if(!preg_match("/^.{1,200}$/", $address)){
        $errors[] = "Address is required and should not be more than 200 characters";
    }
    if(!($pass_ext == "jpg" || $pass_ext == "png" || $pass_ext == "jpeg" || $pass_ext == "gif" || $pass_ext == "" || $pass_ext == NULL)){
        $errors[] = "Passport must be in either jpg, png, jpeg or gif format";
    }    
    if(!preg_match("/^.{1,20}$/", $staff_no)){
        $errors[] = "Staff Number is required and should not be more than 20 characters";
    }
    if($dept_id == ""){
        $errors[] = "Please Select Department";
    }
    
    if(count($errors) == 0){
        $select = mysqli_query($conn, "SELECT id FROM staff WHERE staff_no='$staff_no' AND id != '$staff_id'");
        if (mysqli_num_rows($select) > 0) {
            $msg = '<div class="alert alert-danger msg">Staff already exist with similar Staff Number.</div>';
        }else{
            //PASSPORT          
            if($pass_ext != ""){
                $image_name = str_replace("/", "-", $staff_no);
                $file="../img/passport/".$image_name.".".$pass_ext;
                if(file_exists($file)){
                    unlink($file);
                }
                $tmpname=$_FILES['passport']['tmp_name'];
                $result=move_uploaded_file($tmpname, $file);
                if(!get_magic_quotes_gpc()){
                    $file=addslashes($file);
                }
                $passport = basename($file);
                $passport = createFixSizeImage("../img/passport/", $passport, 200, 250);
            }else{
                $sel = mysqli_query($conn, "SELECT passport FROM staff WHERE id='$staff_id'");
                $fet = mysqli_fetch_array($sel);
                $passport = $fet['passport'];
            }
            $sel = mysqli_query($conn, "SELECT staff_no FROM staff WHERE id='$staff_id'");
            $fet = mysqli_fetch_array($sel);
            $old_staff = $fet['staff_no'];
            //END OF PASSPORT
            $insert = mysqli_query($conn, "UPDATE `staff` SET `first_name`='$first_name',`other_names`='$other_names',`gender`='$gender',`dob`='$dob',`phone`='$phone',`email`='$email',`state`='$state',`lga`='$lga',`address`='$address',`passport`='$passport',`staff_no`='$staff_no',`dept_id`='$dept_id' WHERE id='$staff_id'");
            $insert2 = mysqli_query($conn, "UPDATE `user` SET `username`='$staff_no' WHERE username='$old_staff'");
            if($insert){
                $msg = '<div class="alert alert-success msg">Staff details updated successfully.</div>';
            }
        }      
    }
    $src = "../img/passport/".@$passport;
}else{
    $sel2 = mysqli_query($conn,"SELECT * FROM staff WHERE id='$staff_id'");
    $fet2 = mysqli_fetch_array($sel2);
    $_POST['first_name'] = htmlspecialchars_decode(@$fet2['first_name']);
    $_POST['other_names'] = htmlspecialchars_decode(@$fet2['other_names']);
    $_POST['gender'] = htmlspecialchars_decode(@$fet2['gender']);
    $_POST['dob'] = htmlspecialchars_decode(@$fet2['dob']);
    $_POST['phone'] = htmlspecialchars_decode(@$fet2['phone']);
    $_POST['email'] = htmlspecialchars_decode(@$fet2['email']);
    $_POST['state'] = htmlspecialchars_decode(@$fet2['state']);
    $_POST['lga'] = htmlspecialchars_decode(@$fet2['lga']);
    $_POST['address'] = htmlspecialchars_decode(@$fet2['address']);
    $_POST['staff_no'] = htmlspecialchars_decode(@$fet2['staff_no']);
    $_POST['dept_id'] = htmlspecialchars_decode(@$fet2['dept_id']);
    
    $passport = htmlspecialchars_decode(@$fet2['passport']);
    $src = "../img/passport/".$passport;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSU | Edit Staff</title>
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
            if(count(@$errors) > 0){
                echo "<div class='alert alert-danger' style='padding:10px;'>
                <b>Encountered error".((count($errors)==1)?"":"s").":</b><br>";
                echo "<ol type='1'>";
                foreach($errors as $e){
                    echo "<li> ".$e."</li>";
                }
                echo "</ol></div>";                            
            }echo @$msg; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="legend">Personal Details</div>
                <div class="form-row">          
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">First Name:</label>
                        <div class="col-sm-8">
                            <input name="first_name" value="<?=@$_POST['first_name']?>" required type="text" class="form-control" placeholder="First Name" maxlength="30"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">Other Names:</label>
                        <div class="col-sm-8">
                            <input name="other_names" value="<?=@$_POST['other_names']?>" required type="text" class="form-control" placeholder="Other Names" maxlength="60"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">          
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">Gender:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <?php
                                    $genders = array("Male","Female");
                                    foreach($genders as $value){
                                        echo "<option value='".$value."' ";
                                        if(@$_POST['gender'] == $value)echo 'selected="selected" ';
                                        echo ">".$value."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">Date of Birth:</label>
                        <div class="col-sm-8">
                            <input name="dob" value="<?=@$_POST['dob']?>" required type="date" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">          
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">Phone Number:</label>
                        <div class="col-sm-8">
                            <input name="phone" value="<?=@$_POST['phone']?>" required type="text" class="form-control" placeholder="Phone Number" onkeypress="return isNumber(event)" maxlength="11"/>
                        </div>
                    </div>          
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">E-mail Address:</label>
                        <div class="col-sm-8">
                            <input name="email" value="<?=@$_POST['email']?>" required type="text" class="form-control" placeholder="E-mail Address" maxlength="60"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-row">
                            <label class="col-sm-4 control-label">State of Origin:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="state" id='state' required="required" onchange="select_local(this.id, 'lga')">
                                    <option value="" selected="selected" disabled="disabled">Select State</option>
                                    <?php
                                    $states = array("FCT Abuja","Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta","Ebonyi","Edo","Ekiti","Enugu","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara");
                                    foreach($states as $value){
                                        echo "<option value='".$value."' ";
                                        if(@$_POST['state'] == $value)echo 'selected="selected" ';
                                        echo ">".$value."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-sm-4 control-label">LGA of Origin:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="lga" id="lga" required="required">
                                    <option value="" selected="selected" disabled="disabled">Select LGA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-sm-4 control-label">Residential Address:</label>
                            <div class="col-sm-8">
                                <input name="address" value="<?=@$_POST['address']?>" required type="text" class="form-control" placeholder="Residential Address" maxlength="200"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">Passport:</label>
                        <div class="col-sm-8">
                            <div style="width: 100px;height: 150px;">
                                <div style="width:100px; height:125px;border:2px solid #555; text-align: center;">
                                    <img src="<?=@$src."?".uniqid()?>" style="width: 100%;height: 100%;" id="preview" alt="Passport"/>
                                </div>
                                <?php 
                                    if(file_exists(@$src)) echo '<input type="file" name="passport" id="passport" class="inputPassport"/>';
                                    else echo '<input type="file" name="passport" id="passport" class="inputPassport" required/>';
                                ?>
                                <label class="btn btn-xs btn-submit" for="passport" style="width: 100%;">Browse</label>
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="legend">Educational Details</div>
                <div class="form-row">          
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">Staff Number:</label>
                        <div class="col-sm-8">
                            <input name="staff_no" value="<?=@$_POST['staff_no']?>" required type="text" class="form-control" placeholder="Staff Number" maxlength="20"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label">Department:</label>
                        <div class="col-sm-8" id="inst_div">
                            <select class="form-control" name="dept_id" id="dept_id" required>
                                <option value="" selected disabled>Select Department</option>
                                <?php
                                    $sel = mysqli_query($conn, "SELECT * FROM department ORDER BY name");
                                    while($fet = mysqli_fetch_array($sel)){
                                        $id = $fet['id'];
                                        $name = htmlspecialchars_decode($fet['name']);
                                        echo "<option value='".$id."' ";
                                        if($id == @$_POST['dept_id'])echo 'selected ';
                                        echo ">".$name."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-sm-12">
                    <div class="col-sm-2 pull-right">
                        <button type="submit" name="submit" class="btn btn-submit col-sm-12"> Update</button>
                    </div>
                </div>
            </form> 
        </div>
	</div>
	<?php include "../footer.php";?>
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('#passport').change(function() {
  readURL(this);
});
select_local('state', 'lga', "<?php echo @$_POST['lga'];?>");

//STATE AND LOCAL GOVERNMENT
function select_local(state_id, local_id, lga) {
    var country = document.getElementById(state_id).value;

    var local = document.getElementById(local_id);

    var state_list = ["FCT Abuja","Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta","Ebonyi","Edo","Ekiti","Enugu","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara"];
    var local_list = [["Abaji","Bwari","Gwagwalada","Kuje","Kwali","Municipal Area Council"],
        ["Aba North","Aba South","Arochukwu","Bende","Ikwuano","Isiala Ngwa North","Isiala Ngwa South","Isuikwuato","Obi Ngwa","Ohafia","Osisioma","Ugwunagbo","Ukwa East","Ukwa West","Umuahia North","Umuahia South","Umu Nneochi"],
        ["Demsa","Fufure","Ganye","Gayuk","Gombi","Grie","Hong","Jada","Lamurde","Madagali","Maiha","Mayo Belwa","Michika","Mubi North","Mubi South","Numan","Shelleng","Song","Toungo","Yola North","Yola South"],
        ["Abak","Eastern Obolo","Eket","Esit Eket","Essien Udim","Etim Ekpo","Etinan","Ibeno","Ibesikpo Asutan","Ibiono-Ibom","Ika","Ikono","Ikot Abasi","Ikot Ekpene","Ini","Itu","Mbo","Mkpat-Enin","Nsit-Atai","Nsit-Ibom","Nsit-Ubium","Obot Akara","Okobo","Onna","Oron","Oruk Anam","Udung-Uko","Ukanafun","Uruan","Urue-Offong/Oruko","Uyo"],
        ["Aguata","Anambra East","Anambra West","Anaocha","Awka North","Awka South","Ayamelum","Dunukofia","Ekwusigo","Idemili North","Idemili South","Ihiala","Njikoka","Nnewi North","Nnewi South","Ogbaru","Onitsha North","Onitsha South","Orumba North","Orumba South","Oyi"],
        ["Alkaleri","Bauchi","Bogoro","Damban","Darazo","Dass","Gamawa","Ganjuwa","Giade","Itas/Gadau","Jama'are","Katagum","Kirfi","Misau","Ningi","Shira","Tafawa Balewa","Toro","Warji","Zaki"],
        ["Brass","Ekeremor","Kolokuma/Opakuma","Nembe","Ogbia","Sagbama","Southern Ijaw","Yenagoa"],
        ["Agatu","Apa","Ado","Buruku","Gboko","Guma","Gwer East","Gwer West","Katsina-Ala","Konshisha","Kwande","Logo","Makurdi","Obi","Ogbadibo","Ohimini","Oju","Okpokwu","Oturkpo","Tarka","Ukum","Ushongo","Vandeikya"],
        ["Abadam","Askira/Uba","Bama","Bayo","Biu","Chibok","Damboa","Dikwa","Gubio","Guzamala","Gwoza","Hawul","Jere","Kaga","Kala/Balge","Konduga","Kukawa","Kwaya Kusar","Mafa","Magumeri","Maiduguri","Marte","Mobbar","Monguno","Ngala","Nganzai","Shani"],
        ["Abi","Akamkpa","Akpabuyo","Bakassi","Bekwarra","Biase","Boki","Calabar Municipal","Calabar South","Etung","Ikom","Obanliku","Obubra","Obudu","Odukpani","Ogoja","Yakuur","Yala"],
        ["Aniocha North","Aniocha South","Bomadi","Burutu","Ethiope East","Ethiope West","Ika North East","Ika South","Isoko North","Isoko South","Ndokwa East","Ndokwa West","Okpe","Oshimili North","Oshimili South","Patani","Sapele","Udu","Ughelli North","Ughelli South","Ukwuani","Uvwie","Warri North","Warri South","Warri South West"],
        ["Abakaliki","Afikpo North","Afikpo South (Edda)","Ebonyi","Ezza North","Ezza South","Ikwo","Ishielu","Ivo","Izzi","Ohaozara","Ohaukwu","Onicha"],
        ["Akoko-Edo","Egor","Esan Central","Esan North-East","Esan South-East","Esan West","Etsako Central","Etsako East","Etsako West","Igueben","Ikpoba Okha","Orhionmwon","Oredo","Ovia North-East","Ovia South-West","Owan East","Owan West","Uhunmwonde"],
        ["Ado Ekiti","Efon","Ekiti East","Ekiti South-West","Ekiti West","Emure","Gbonyin","Ido Osi","Ijero","Ikere","Ikole","Ilejemeje","Irepodun/Ifelodun","Ise/Orun","Moba","Oye"],
        ["Aninri","Awgu","Enugu East","Enugu North","Enugu South","Ezeagu","Igbo Etiti","Igbo Eze North","Igbo Eze South","Isi Uzo","Nkanu East","Nkanu West","Nsukka","Oji River","Udenu","Udi","Uzo Uwani"],
        ["Akko","Balanga","Billiri","Dukku","Funakaye","Gombe","Kaltungo","Kwami","Nafada","Shongom","Yamaltu/Deba"],
        ["Aboh Mbaise","Ahiazu Mbaise","Ehime Mbano","Ezinihitte","Ideato North","Ideato South","Ihitte/Uboma","Ikeduru","Isiala Mbano","Isu","Mbaitoli","Ngor Okpala","Njaba","Nkwerre","Nwangele","Obowo","Oguta","Ohaji/Egbema","Okigwe","Orlu","Orsu","Oru East","Oru West","Owerri Municipal","Owerri North","Owerri West","Unuimo"],
        ["Auyo","Babura","Biriniwa","Birnin Kudu","Buji","Dutse","Gagarawa","Garki","Gumel","Guri","Gwaram","Gwiwa","Hadejia","Jahun","Kafin Hausa","Kazaure","Kiri Kasama","Kiyawa","Kaugama","Maigatari","Malam Madori","Miga","Ringim","Roni","Sule Tankarkar","Taura","Yankwashi"],
        ["Birnin Gwari","Chikun","Giwa","Igabi","Ikara","Jaba","Jema'a","Kachia","Kaduna North","Kaduna South","Kagarko","Kajuru","Kaura","Kauru","Kubau","Kudan","Lere","Makarfi","Sabon Gari","Sanga","Soba","Zangon Kataf","Zaria"],
        ["Ajingi","Albasu","Bagwai","Bebeji","Bichi","Bunkure","Dala","Dambatta","Dawakin Kudu","Dawakin Tofa","Doguwa","Fagge","Gabasawa","Garko","Garun Mallam","Gaya","Gezawa","Gwale","Gwarzo","Kabo","Kano Municipal","Karaye","Kibiya","Kiru","Kumbotso","Kunchi","Kura","Madobi","Makoda","Minjibir","Nasarawa","Rano","Rimin Gado","Rogo","Shanono","Sumaila","Takai","Tarauni","Tofa","Tsanyawa","Tudun Wada","Ungogo","Warawa","Wudil"],
        ["Bakori","Batagarawa","Batsari","Baure","Bindawa","Charanchi","Dandume","Danja","Dan Musa","Daura","Dutsi","Dutsin Ma","Faskari","Funtua","Ingawa","Jibia","Kafur","Kaita","Kankara","Kankia","Katsina","Kurfi","Kusada","Mai'Adua","Malumfashi","Mani","Mashi","Matazu","Musawa","Rimi","Sabuwa","Safana","Sandamu","Zango"],
        ["Aleiro","Arewa Dandi","Argungu","Augie","Bagudo","Birnin Kebbi","Bunza","Dandi","Fakai","Gwandu","Jega","Kalgo","Koko/Besse","Maiyama","Ngaski","Sakaba","Shanga","Suru","Wasagu/Danko","Yauri","Zuru"],
        ["Adavi","Ajaokuta","Ankpa","Bassa","Dekina","Ibaji","Idah","Igalamela Odolu","Ijumu","Kabba/Bunu","Kogi","Lokoja","Mopa Muro","Ofu","Ogori/Magongo","Okehi","Okene","Olamaboro","Omala","Yagba East","Yagba West"],
        ["Asa","Baruten","Edu","Ekiti","Ifelodun","Ilorin East","Ilorin South","Ilorin West","Irepodun","Isin","Kaiama","Moro","Offa","Oke Ero","Oyun","Pategi"],
        ["Agege","Ajeromi-Ifelodun","Alimosho","Amuwo-Odofin","Apapa","Badagry","Epe","Eti Osa","Ibeju-Lekki","Ifako-Ijaiye","Ikeja","Ikorodu","Kosofe","Lagos Island","Lagos Mainland","Mushin","Ojo","Oshodi-Isolo","Shomolu","Surulere"],
        ["Akwanga","Awe","Doma","Karu","Keana","Keffi","Kokona","Lafia","Nasarawa","Nasarawa Egon","Obi","Toto","Wamba"],
        ["Agaie","Agwara","Bida","Borgu","Bosso","Chanchaga","Edati","Gbako","Gurara","Katcha","Kontagora","Lapai","Lavun","Magama","Mariga","Mashegu","Mokwa","Moya","Paikoro","Rafi","Rijau","Shiroro","Suleja","Tafa","Wushishi"],
        ["Abeokuta North","Abeokuta South","Ado-Odo/Ota","Egbado North","Egbado South","Ewekoro","Ifo","Ijebu East","Ijebu North","Ijebu North East","Ijebu Ode","Ikenne","Imeko Afon","Ipokia","Obafemi Owode","Odeda","Odogbolu","Ogun Waterside","Remo North","Shagamu"],
        ["Akoko North-East","Akoko North-West","Akoko South-West","Akoko South-East","Akure North","Akure South","Ese Odo","Idanre","Ifedore","Ilaje","Ile Oluji/Okeigbo","Irele","Odigbo","Okitipupa","Ondo East","Ondo West","Ose","Owo"],
        ["Atakunmosa East","Atakunmosa West","Aiyedaade","Aiyedire","Boluwaduro","Boripe","Ede North","Ede South","Ife Central","Ife East","Ife North","Ife South","Egbedore","Ejigbo","Ifedayo","Ifelodun","Ila","Ilesa East","Ilesa West","Irepodun","Irewole","Isokan","Iwo","Obokun","Odo Otin","Ola Oluwa","Olorunda","Oriade","Orolu","Osogbo"],
        ["Afijio","Akinyele","Atiba","Atisbo","Egbeda","Ibadan North","Ibadan North-East","Ibadan North-West","Ibadan South-East","Ibadan South-West","Ibarapa Central","Ibarapa East","Ibarapa North","Ido","Irepo","Iseyin","Itesiwaju","Iwajowa","Kajola","Lagelu","Ogbomosho North","Ogbomosho South","Ogo Oluwa","Olorunsogo","Oluyole","Ona Ara","Orelope","Ori Ire","Oyo","Oyo East","Saki East","Saki West","Surulere"],
        ["Bokkos","Barkin Ladi","Bassa","Jos East","Jos North","Jos South","Kanam","Kanke","Langtang South","Langtang North","Mangu","Mikang","Pankshin","Qua'an Pan","Riyom","Shendam","Wase"]
        ,["Abua/Odual","Ahoada East","Ahoada West","Akuku-Toru","Andoni","Asari-Toru","Bonny","Degema","Eleme","Emuoha","Etche","Gokana","Ikwerre","Khana","Obio/Akpor","Ogba/Egbema/Ndoni","Ndoni","Ogu/Bolo","Okrika","Omuma","Opobo/Nkoro","Oyigbo","Port Harcourt","Tai"],
        ["Binji","Bodinga","Dange Shuni","Gada","Goronyo","Gudu","Gwadabawa","Illela","Isa","Kebbe","Kware","Rabah","Sabon Birni","Shagari","Silame","Sokoto North","Sokoto South","Tambuwal","Tangaza","Tureta","Wamako","Wurno","Yabo"],
        ["Ardo Kola","Bali","Donga","Gashaka","Gassol","Ibi","Jalingo","Karim Lamido","Kumi","Lau","Sardauna","Takum","Ussa","Wukari","Yorro","Zing"],
        ["Bade","Bursari","Damaturu","Fika","Fune","Geidam","Gujba","Gulani","Jakusko","Karasuwa","Machina","Nangere","Nguru","Potiskum","Tarmuwa","Yunusari","Yusufari"],
        ["Anka","Bakura","Birnin Magaji/Kiyaw","Bukkuyum","Bungudu","Gummi","Gusau","Kaura Namoda","Maradun","Maru","Shinkafi","Talata Mafara","Chafe","Zurmi"]
    ];

    var state_index = state_list.indexOf(country);
    local.innerHTML = "";

    var elem = document.createElement("option");
    var att = document.createAttribute("value");
    att.value = "";
    elem.setAttributeNode(att);

    att = document.createAttribute("selected");
    att.value = "selected";
    elem.setAttributeNode(att);

    att = document.createAttribute("disabled");
    att.value = "disabled";
    elem.setAttributeNode(att);

    elem.innerHTML ="Select LGA";
    local.appendChild(elem);

    for(var i = 0; i < local_list[state_index].length; i++){
        var elem = document.createElement("option");
        var att = document.createAttribute("value");
        att.value = local_list[state_index][i];
        elem.setAttributeNode(att);
        if(lga == local_list[state_index][i]){
            var att2 = document.createAttribute("selected");
            att2.value = "selected";
            elem.setAttributeNode(att2);
        }
        elem.innerHTML = local_list[state_index][i];
        local.appendChild(elem);
    }
}
</script>
</body>
</html>
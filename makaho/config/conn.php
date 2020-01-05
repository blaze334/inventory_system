<?php
    @session_start();
    
    DEFINE('DBSERVER', 'localhost');
    DEFINE('DBUSER', 'root');
    DEFINE('DBPW', '');
    DEFINE('DBNAME', 'mailing');
    
    $conn = mysqli_connect(DBSERVER, DBUSER, DBPW, DBNAME);

    if(!$conn){
        die("Could not connect to server");
    }    
?>
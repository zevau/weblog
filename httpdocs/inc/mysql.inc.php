<?php
    $dbuser = "root";
    $dbpass = "dbroot";
    $dbname = "abx427_prg";
    $dbhost = "localhost";

    $db = new mysqli($dbhost,$dbuser,$dbpass);
    $db->select_db($dbname);

    if (isset($db->connect_error)){
        echo $db->connect_error;
    }
    session_start();
?>

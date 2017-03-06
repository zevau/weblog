<?php
    $dbuser = "abx427";
    $dbpass = "abx427";
    $dbname = "abx427_prg";
    $dbhost = "pstud0.mt.haw-hamburg.de";

    $db = new mysqli($dbhost,$dbuser,$dbpass);
    $db->select_db($dbname);

    if (isset($db->connect_error)){
        echo $db->connect_error;
    }
    session_start();
?>

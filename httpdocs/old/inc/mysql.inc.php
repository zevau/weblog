
<?php
    $dbuser = "root";
    $dbpass = "dbroot";
    $dbname = "abx427_prg";
    $dbhost = "localhost";

    $db = new mysqli($dbhost,$dbuser,$dbpass, $dbname);
    if ($db->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $db->connect_error);
    }
    $dbq = new DBQuery($db);
    session_start();
?>

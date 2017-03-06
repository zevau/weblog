<?php
// content.inc.php

if (isset($_GET["view"])){
	$view = $_GET["view"];
	switch ($view){
		case "blog":
			require_once './view/blog.view.php';
			break;
		case "write":
			require_once './view/write.view.php';
			break;
    case "profile":
        require_once './view/profile.view.php';
        break;
    case "login":
        require_once './view/login.view.php';
        break;
		default:
			require_once './view/default.view.php' ;
	}
} else {
	require_once './view/default.view.php';
}

?>

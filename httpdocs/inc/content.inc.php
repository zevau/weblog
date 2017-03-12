<?php
// content.inc.php

if (isset($_GET["view"])){
	$view = $_GET["view"];
	switch ($view){
		case "search":
			require_once './view/search.view.php';
			break;
        case "draft":
            require_once './view/draft.view.php';
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

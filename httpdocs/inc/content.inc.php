<?php 
// content.inc.php

if (isset($_GET["view"])){
	$view = $_GET["view"];
	switch ($view){
		case "add":
			require_once './view/add.view.php';
			break;
		case "checkout":
			require_once './view/checkout.view.php';
			break;
        case "cart":
            require_once './view/cart.view.php';
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
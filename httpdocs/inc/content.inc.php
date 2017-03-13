<?php
// content.inc.php
if (isset($_SESSION["loggedIn"])){
	?>
<div id="logged-in-as">Logged in as <a href='?view=profile&user=
	<?php
		echo $_SESSION["username"];
	?>
'>
	<?php
		echo $_SESSION["username"];
	?>
</a></div>
	<?php
}
if (isset($_GET["view"])){
	$view = $_GET["view"];
	switch ($view){
		case "blog":
			require_once './view/blog.view.php';
			break;
		case "search":
			require_once './view/search.view.php';
			break;
    case "draft":
      require_once './view/draft.view.php';
      break;
  	case "login":
      require_once './view/login.view.php';
      break;
		case "register":
			require_once './view/register.view.php';
			break;
		case "profile":
			require_once './view/profile.view.php';
			break;
		default:
			require_once './view/default.view.php' ;
	}
} else {
	require_once './view/default.view.php';
}

?>

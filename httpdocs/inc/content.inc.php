<?php
// content.inc.php
if (isset($_POST["delete-post"])){
	if ($db->validateAuthor($_POST["post-id"], $_SESSION["username"]) || $_SESSION["username"] == "admin" ){
		$postID = $_POST["post-id"];
		$db->deletePost($postID);
		setNotification("Post #" . $postID . " has been deleted.");
		header('Location: /?view='.$_GET["view"]);
	}
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
			require_once './view/blog.view.php' ;
	}
} else {
	require_once './view/blog.view.php';
}

?>

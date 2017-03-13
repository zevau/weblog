<?php
$username = $_GET["user"];
$pagetitle .= " - User profile of " . $username;
if(isset($username) && $db->usernameExists($username)){
  echo "Latest posts from " . $username;
  drawPosts($db->getUserPosts($username));
} else {
  header('Location: /');
}

?>

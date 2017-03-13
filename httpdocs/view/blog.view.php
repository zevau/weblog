<?php

$pagetitle .= " - Latest Posts";
$pageHeadline = "The latest posts: ";
// default.view.php
/**if (!isset($_SESSION["user"]["id"])) {
*    header('Location: /?view=login');
*  }
*/
  drawPosts($db->getLatestPosts());
?>
<div class = "container">
</div>

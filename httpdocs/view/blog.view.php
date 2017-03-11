<?php
// default.view.php
/**if (!isset($_SESSION["user"]["id"])) {
*    header('Location: /?view=login');
*  }
*/
  drawPosts($dbq->getLatestPosts());
?>
<div class = "container">
default
</div>

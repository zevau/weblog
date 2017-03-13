<?php
$pagetitle = "weblog";
require_once'./inc/DB.php';
require_once'./inc/functions.inc.php';
$db = new DB();
require_once'./inc/head.inc.php';
require_once'./inc/nav.inc.php';
require_once'./inc/notify.inc.php';
require_once'./inc/content.inc.php';
require_once'./inc/footer.inc.php';
?>

<title>
  <?php  echo "$pagetitle"; ?>
</title>

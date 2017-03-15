<?php
//shows error messages and clears afterwards
if (isset($_SESSION["error"])){
  ?>
<div class="error-msg">
  <p>Error:
  <?php
  echo $_SESSION["error"];
  ?>
  </p>
</div>
  <?php
  unsetError();
}
//shows notification and clears afterwards
if (isset($_SESSION["notification"])){
  ?>
<div class="notification-msg">
  <p>Message:
  <?php
  echo $_SESSION["notification"];
  ?>
  </p>
</div>
  <?php
  unsetNotification();
}
?>

<?php
//shows error messages
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
//shows notification
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
//shows username, that is logged in
if (isset($_SESSION["loggedIn"])){
?>
<div id="logged-in-as">
  <p>Logged in as
    <a href='?view=profile&user=<?php echo $_SESSION["username"];?>'>
	   <?php
	   echo $_SESSION["username"];
	   ?>
    </a>
  </p>
</div>
	<?php
  }
?>

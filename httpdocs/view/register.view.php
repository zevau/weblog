
<?php

$pagetitle .= " - Register";
    // register.view.php
    $errorMsg = "";
  if (isset($_POST["register"])){
      if (!$db->usernameExists($_POST["username"])){
        if($_POST["password"] == $_POST["password_repeat"]){
          $username = $db->real_escape_string($_POST["username"]);
          $password = $_POST["password"];
          $password = md5($password);
          $db->register($username, $password);
          header('Location: /?view=login');
        }
        else {
          $errorMsg .= "Entered passwords were not equal! Please enter again. ";
        }
      }
      else {
        $errorMsg .= "Username '" . $_POST["username"] . "' does already exist! Please select a different one.";
      }
      ?>
    <div class ="error-msg">
      <?php
        echo $errorMsg;
      ?>
    </div>
      <?php
  }
?>

<div class="container">
  <div id="register">
      <form class="register-form" action="" method="post">
          <input type="username" name="username" placeholder="username" required>
          <input type="password" name="password" placeholder="password" required>
          <input type="password" name="password_repeat" placeholder="repeat password" required>
          <input type="submit" name="register" value="register">
      </form>
  </div>
</div>

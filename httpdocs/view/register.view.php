
<?php

$pagetitle .= " - Register";
    // register.view.php
  if (isset($_POST["register"])){
      $regex = "/^\w{1,35}$/";
      // Checks if username is already taken
      if ($db->usernameExists($_POST["username"])){
        setError("Username '" . $_POST["username"] . "' does already exist! Please select a different one.");
        //checks for wrong input
      } elseif(!preg_match($regex, $_POST["username"])) {
        setError("Illegal Character: Only alphanumeric characters and underscores are allowed for usernames.");
        //checks for wrong password repetition
      } elseif(!($_POST["password"] == $_POST["password_repeat"])){
        setError("Entered passwords were not equal! Please enter again.");
      }
      //registeres new account and redirects to login.view
      if (!isset($_SESSION["error"])){
        $username = $db->real_escape_string($_POST["username"]);
        $password = $_POST["password"];
        $password = md5($password);
        $db->register($username, $password);
        setNotification("Successfully registered. You can log in now.");
        header('Location: /?view=login');
      } else {
        header('Location: /?view=register');
      }
  }
?>
<!-- Register-Form -->
<div class="container">
  <p>Register a new account:</p>
  <div id="register">
      <form class="register-form" action="" method="post">
          <input type="username" name="username" placeholder="username" maxlength="32" required >
          <input type="password" name="password" placeholder="password" maxlength="32" required>
          <input type="password" name="password_repeat" placeholder="repeat password" maxlength="32" required>
          <input class="button" type="submit" name="register" value="register">
      </form>
  </div>
</div>

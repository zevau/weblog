
<?php

$pagetitle .= " - Register";
    // register.view.php
  if (isset($_POST["register"])){
      if ($db->usernameExists($_POST["username"])){
        setError("Username '" . $_POST["username"] . "' does already exist! Please select a different one.");
      } elseif(!strcmp("^\w{1,35}$", $_POST["username"])) {
        setError("Illegal Character: Only alphanumeric characters and underscores are allowed for usernames.");
      } elseif(!$_POST["password"] == $_POST["password_repeat"]){
        setError("Entered passwords were not equal! Please enter again.");
      }
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

<div class="container">
  <div id="register">
      <form class="register-form" action="" method="post">
          <input type="username" name="username" placeholder="username" maxlength="32" required >
          <input type="password" name="password" placeholder="password" maxlength="32" required>
          <input type="password" name="password_repeat" placeholder="repeat password" maxlength="32" required>
          <input type="submit" name="register" value="register">
      </form>
  </div>
</div>

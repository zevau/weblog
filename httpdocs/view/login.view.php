
<?php
    // login.view.php

//Logout
$pagetitle .= " - Login";
if(isset($_GET["action"]) && $_GET["action"] == "logout"){
    session_destroy();
    header('Location: /');
}
//Login
if (isset($_POST["login"])){
    $username = $db->real_escape_string($_POST["username"]);
    $password = $_POST["password"];
    $password = md5($password);
    if ($db->login($username, $password)){
      setNotification("Successfully logged in! Welcome " . $username . "!");
      header('Location: /');
    } else {
      setError("You have entered either a wrong username or password. Please try again.");
      header('Location: /?view=login');
    }
}
?>
<!-- login-form -->
<div class="container">
  <p>Log in to your account:
  <div id="login">
      <form class="login-form" action="" method="post">
          <input type="username" name="username" placeholder="username">
          <input type="password" name="password" placeholder="password">
          <input class="button" type="submit" name="login" value="login">
      </form>
  </div>
</div>

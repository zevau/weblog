
<?php
    // login.view.php

$pagetitle .= " - Login";
if(isset($_GET["action"]) && $_GET["action"] == "logout"){
    session_destroy();
    header('Location: /');
}
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

<div class="container">
  <div id="login">
      <form class="login-form" action="" method="post">
          <input type="username" name="username" placeholder="username">
          <input type="password" name="password" placeholder="password">
          <input type="submit" name="login" value="login">
      </form>
  </div>
</div>

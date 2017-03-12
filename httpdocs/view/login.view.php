
<?php
    // login.view.php

if(isset($_GET["action"]) && $_GET["action"] == "logout"){
    session_destroy();
    header('Location: /');
}
if (isset($_POST["login"])){
    $username = $db->real_escape_string($_POST["username"]);
    $password = $_POST["password"];
    $password = md5($password);
    $db->login($username, $password);
}
?>

<div class="container">
  <div id="login">
      <form class="login-form" action="" method="post">
          <input type="username" name="username" placeholder="username">
          <input type="password" name="password" placeholder="password">
          <input type="submit" name="login" value="anmelden">
      </form>
  </div>
</div>

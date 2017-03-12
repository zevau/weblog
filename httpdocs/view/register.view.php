
<?php
    // register.view.php
if (isset($_POST["register"])){
    if($_POST["password"] == $_POST["password_repeat"]){
      $username = $db->real_escape_string($_POST["username"]);
      $password = $_POST["password"];
      $password = md5($password);
      $db->register($username, $password);
      header('Location: /?view=login');
    }
    else {
      echo "entered passwords are not equal!";
    }

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

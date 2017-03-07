
<?php
    // login.view.php

if(isset($_GET["action"]) && $_GET["action"] == "logout"){
    session_destroy();
    header('Location: /');
}
if (isset($_POST["login"])){
    $username = $db->real_escape_string($_POST["username"]);
    $pass = $_POST["password"];
    $password = md5($password);
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);
    if ($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $_SESSION["username"] = $username;
        $_SESSION["loggedIn"] = true;
        header('Location: /');
    }
}
?>
<div id="blog">
  <div class="post">
      <?php
      $result = $db->query("SELECT * FROM post ORDER BY post_date DESC LIMIT 10");
      while($row = $result->fetch_assoc()) {

        echo "<div class=\"post-title\">". $row["TITLE"] ."</div>";
        echo "<div class=\"post-content\">". $row["CONTENT"] ."</div>";
        echo "<div class=\"post-info\">". $row["USERNAME"] ."</div>";
      }
      ?>
  </div>
</div>

    <div class="container">
      <div id="login">
        <form class="form-horizontal" action="" method="post">
            <input class="form-control" type="username" name="username" placeholder="username">
            <input class="form-control" type="password" name="password" placeholder="password">
            <input class="form-control" type="submit" name="login" value="anmelden">

        </form>
      </div>
</div>

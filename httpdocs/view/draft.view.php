<?php

$pagetitle .= " - Write something";
//redirects to login if user isn't
if(!$_SESSION["loggedIn"]){
  setNotification("Please log in first!");
  header('Location: /?view=login');
}
//cleans the input and publishes
if (isset($_POST["publish"])){
  $title = $db->real_escape_string($_POST["title"]);
  $title = htmlspecialchars($title);
  $text = $db->real_escape_string($_POST["text"]);
  $text = htmlspecialchars($text);
  $author = $_SESSION["username"];
  $db->newPost($title, $text, $author);
  setNotification("Your posting has been published!");
  header('Location: /?view=blog');
}
?>

<div class="container">
  <p>Write something:</p>
  <div id="draft">
    <form class="draft-form" action="" method="post">
      <table>
        <tr>
          <td>
            <input type="text" size="40" name="title" placeholder="Title" maxlength="50" required>
          </td>
        </tr>
        <tr>
          <td>
            <textarea cols="40" rows="20" name="text" placeholder="Enter Text ..." maxlength="1000" required></textarea>
          </td>
        </tr>
        <tr>
          <td>
            <input class="button" type="submit" name="publish" value="publish">
          </td>
        </tr>
      </form>
  </div>

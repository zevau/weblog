<?php
if(!$_SESSION["loggedIn"]){
  header('Location: /?view=login');
}
if (isset($_POST["publish"])){
  $title = $db->real_escape_string($_POST["title"]);
  $text = $db->real_escape_string($_POST["text"]);
  $author = $_SESSION["username"];
  echo $title . $text . $author;
  $db->newPost($title, $text, $author);
}
?>

<div class="container">
  <div id="draft">
    <form class="draft-form" action="" method="post">
        <input type="text" size="40" name="title" placeholder="Title">
        <textarea cols="40" rows="20" name="text" placeholder="Enter Text ..."></textarea>
        <input type="submit" name="publish" value="publish">

    </form>
  </div>

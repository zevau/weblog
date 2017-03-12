<?php
if (isset($_POST["search"])){
  echo "döt";
  if (empty($_POST["search-box"]) && empty($_POST["author-box"])){
    echo "missing input";
  } else {

      echo "döt";
    $string = $db->real_escape_string($_POST["search-box"]);
    $author = $db->real_escape_string($_POST["author-box"]);
    
    $titleonly = isset($_POST["title-only"]);
    $direction = "DESC";
    if (isset($_POST["oldest-first"])){
      $direction = "ASC";
    }
    echo $string . $titleonly. $author .$direction;
    $result = $db->search($string, $titleonly, $author, $direction);
    drawPosts($result);
  }
}
?>
<div class="container">
  <div id="search">
    <table>
      <form class="search-form" action="" method="post">
          <tr><td><label id="search-label" for="search-box" >SUCHE</label></td></tr>
          <tr><td><input type="text" name="search-box" placeholder="..."></td></tr>
          <tr><td><input type="checkbox" name="title-only" >nur Titel durchsuchen</td></tr>
          <tr><td><label id="author-label" for="author-box" >AUTOR</label></td></tr>
          <tr><td><input type="text" name="author-box" placeholder="alle Nutzer"></td></tr>
          <tr><td><input type="checkbox" name="oldest-first" >älteste Beiträge zuerst</td></tr>
          <tr><td><input type="submit" name="search" value="suche"></td></tr>
      </form>
    </table>
  </div>
</div>

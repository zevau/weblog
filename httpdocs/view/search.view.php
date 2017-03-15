<div class="container">
  <p>Search for anything:</p>
  <!-- search form-->
  <div id="search">
    <table>
      <form class="search-form" action="" method="post">
          <tr><td><label id="search-label" for="search-box" >SEARCH</label></td></tr>
          <tr><td><input type="text" name="search-box" placeholder="..."></td></tr>
          <tr><td><input class="checkbox" type="checkbox" name="title-only" >only titles</td></tr>
          <tr><td><label id="author-label" for="author-box" >AUTHOR</label></td></tr>
          <tr><td><input type="text" name="author-box" placeholder="alle Nutzer"></td></tr>
          <tr><td><input class="checkbox" type="checkbox" name="oldest-first" >oldest posts first</td></tr>
          <tr><td><input class="button" type="submit" name="search" value="search"></td></tr>
      </form>
    </table>
  </div>
</div>

<?php

$pagetitle .= " - Search";
//search for strings, check the input
if (isset($_POST["search"])){
  if (empty($_POST["search-box"]) && empty($_POST["author-box"])){
    echo "missing input";
  } else {
    $string = $db->real_escape_string($_POST["search-box"]);
    $author = $db->real_escape_string($_POST["author-box"]);

    $titleonly = isset($_POST["title-only"]);
    $direction = "DESC";
    if (isset($_POST["oldest-first"])){
      $direction = "ASC";
    }
    echo "<h1>Results:</h1>";
    $pagetitle .= "results";
    $result = $db->search($string, $titleonly, $author, $direction);
    drawPosts($result);
  }
}
?>

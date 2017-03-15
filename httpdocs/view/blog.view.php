<div class = "container">
  <p>Latest posts:</p>
<?php
$pagetitle .= " - Latest Posts";
$rangeIncrement = 5;
//loads another 5 posts.
if (isset($_POST["load-more"])){
  $range = $_POST["range"] + $rangeIncrement;
} else {
  $range = $rangeIncrement;
}
//draw the latest posts on the front page and check if there is more.
drawPosts($db->getLatestPosts(0, $range));
if ($db->getTotalPostCount() > $range){
?>
<div class="button-row">
  <form method="post">
    <input class="button" type="submit" name="load-more" value="Load more ...">
    <input type="hidden" name="range" value=<?php echo $range ?>>
  </form>
</div>
</div>
<?php
} ?>

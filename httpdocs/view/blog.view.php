<div class = "container">
<?php
$pagetitle .= " - Latest Posts";
$rangeIncrement = 5;
if (isset($_POST["load-more"])){
  $range = $_POST["range"] + $rangeIncrement;
} else {
  $range = $rangeIncrement;
}
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

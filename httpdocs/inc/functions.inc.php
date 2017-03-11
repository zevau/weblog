<?php function drawPosts($dataset)
{
  while($row = $dataset->fetch_array()){
?>
<div class="post-container">
  <div class="post-title">
    Title:
    <?php
    echo $row["TITLE"]; ?>
  </div>
  <div class="post-content">
    Content:
    <?php
    echo $row["CONTENT"];?>
  </div>
  <div class="post-info">
    Info:
    <?php
    echo $row["POST_ID"];
    echo $row["USERNAME"];
    echo $row["POST_DATE"];
    ?>
  </div>
</div>
<?php }}?>

<?php function drawPosts($dataset)
{
?>
<div class="post-container">
  <div class="post-title">
    <?php
    echo $dataset["TITLE"]; ?>
  </div>
  <div class="post-content">
    <?php
    echo $dataset["CONTENT"];?>
  </div>
  <div class="post-info">
    <?php
    echo $dataset["POST_ID"];
    echo $dataset["USERNAME"];
    echo $dataset["POST_DATE"];
    ?>
  </div>
</div>
<?php }?>

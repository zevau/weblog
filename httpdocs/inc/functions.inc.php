<?php function drawPosts($dataset)
{
  while($row = $dataset->fetch_array()){
?>
<div class="post-container">
  <table class="post-table">
    <tr class="post-title">
      <td>
        <?php
          echo $row["TITLE"];
        ?>
      </td>
    </tr>
    <tr class="post-content">
      <td>
        <?php
          echo $row["CONTENT"];
        ?>
      </td>
    </tr>
    <tr class="post-info">
      <table class="info-table">
        <tr>
          <td class="post-info-id">
            <?php
              echo $row["POST_ID"];
            ?>
          </td>
          <td class="post-info-author">
            <?php
              echo $row["USERNAME"];
            ?>
          </td>
          <td class="post-info-timestamp">
            <?php
              echo $row["POST_DATE"];
            ?>
          </td>
        </tr>
      </table>
    </tr>
  </table>
</div>
<?php }}?>

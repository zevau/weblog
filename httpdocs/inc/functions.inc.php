<?php
/**
*Puts a post from db into html-table
*@param dataset sql-dataset containing all columns from db-table "post"
*/
function drawPosts($dataset)
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
          <td class="post-info">#
            <?php
              echo $row["POST_ID"];
            ?>
          </td>
          <td class="post-info">Author:
            <a href='?view=profile&user=<?php echo $row["USERNAME"];?>'>
            <?php
              echo $row["USERNAME"];
            ?>
            </a>
          </td>
          <td class="post-info">
            <?php
              echo $row["POST_DATE"];
            ?>
          </td>
          <?php if(($_SESSION["username"] == $row["USERNAME"]) || ($_SESSION["username"] == "admin")){?>
          <td class="post-info">
            <form class="delete-post" method="post">
              <input type="hidden" name="post-id" value="<?php echo $row["POST_ID"];?>">
              <input class="delete-button" type="submit" name="delete-post" value="X">
            </form>
          </td>
          <?php } ?>
        </tr>
      </table>
    </tr>
  </table>
</div>
<?php }}
/**
*functions for (un)setting errors and notifications
*
*/
function setError($msg){
  $_SESSION["error"] = $msg;
}
function unsetError(){
  unset($_SESSION["error"]);
}
function setNotification($msg){
  $_SESSION["notification"] = $msg;
}
function unsetNotification(){
  unset($_SESSION["notification"]);
}
?>

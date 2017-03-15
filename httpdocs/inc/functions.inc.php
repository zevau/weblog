<?php
/**
*Puts a post from db into html-table
*@param dataset sql-dataset containing all columns from db-table "post"
*/
function drawPosts($data)
{
  $rows = $data->num_rows;
  while($row = $data->fetch_array()){
?>
<div class="post-container">
  <table class="post-table">
    <tr class="post-title">
      <td><p>
        <?php
          echo $row["TITLE"];
        ?>
      </td></p>
    </tr>
    <tr class="post-content">
      <td><p>
        <?php
          echo $row["CONTENT"];
        ?>
      </td></p>
    </tr>
    <tr class="post-info">
      <td>
      <table class="info-table">
        <tr>
          <td class="post-info-id">#
            <?php
              echo $row["POST_ID"];
            ?>
          </td>
          <td class="post-info-author">Author:
            <a href='?view=profile&user=<?php echo $row["USERNAME"];?>'>
            <?php
              echo $row["USERNAME"];
            ?>
            </a>
          </td>
          <td class="post-info-timestamp">
            <?php
              echo $row["POST_DATE"];
            ?>
          </td>
          <?php
if(isset($_SESSION["username"])){
          if(($_SESSION["username"] == $row["USERNAME"]) || ($_SESSION["username"] == "admin")){?>
          <td class="post-info-delete">
            <form class="delete-post" method="post">
              <input type="hidden" name="post-id" value="<?php echo $row["POST_ID"];?>">
              <input class="delete-button button" type="submit" name="delete-post" value="X">
            </form>
          </td>
          <?php }} ?>
        </tr>
      </table>
    </td>
    </tr>
  </table>
</div>
<?php }
return $rows;
}
/**
*functions for (un)setting errors and notifications
*@param String $msg message
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

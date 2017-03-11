<?php
class DB {

  public static $database = null;
  private static $dbuser = "root";
  private static $dbpass = "dbroot";
  private static $dbname = "abx427_prg";
  private static $dbhost = "localhost";

  function __construct() {
    $database = new mysqli($dbhost,$dbuser,$dbpass, $dbname);
    if ($database->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $database->connect_error);
    }
    session_start();

  }
  /**
  *@param int $range number of posts to retrieve
  *
  */
  public function getLatestPosts($start = 0, $range = 10) {
    $sql = "SELECT * FROM post ORDER BY post_date DESC LIMIT '$start', '$range'";
    $result = $db->query($sql);
    return $result;
  }
  public function searchByUsername($string, $direction = "DESC"){
    $sql = "SELECT * FROM post WHERE username LIKE '$string' ORDER BY post_date '$direction'";
    $result = $db->query($sql);
    return $result;
  }
  public function newPost($title, $text, $author){
    $sql = "INSERT INTO post (title, content, username) VALUES ($title, $text, $author)";
    $db->query($sql);
  }
  public function deletePost($id){

  }


}
?>

<?php
class DB {

  public static $database = null;

  function __construct() {

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "dbroot";
    $dbname = "abx427_prg";

    self::$database = new mysqli($dbhost,$dbuser,$dbpass, $dbname);
    if (self::$database->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $database->connect_error);
    }
    session_start();

  }
  /**
  *@param int $range number of posts to retrieve
  *
  */
  public function getLatestPosts($start = 0, $range = 10) {
    $sql = "SELECT * FROM post ORDER BY post_date DESC LIMIT $start, $range";
    $result = self::$database->query($sql);
    return $result;
  }
  public function getUserPosts($username) {
    $sql = "SELECT * FROM post WHERE USERNAME = '$username' ORDER BY post_date DESC";
    $result = self::$database->query($sql);
    return $result;
  }
  public function newPost($title, $text, $author){
    $sql = "INSERT INTO post (TITLE, CONTENT, USERNAME) VALUES ('$title', '$text', '$author')";
    self::$database->query($sql);
  }
  public function deletePost($id){
    $sql = "DELETE FROM post WHERE POST_ID = '$id'";
    self::$database->query($sql);
  }
  public function real_escape_string($string){
    $result = self::$database->real_escape_string($string);
    return $result;
  }
  public function login($username, $password){
    $sql = "SELECT * FROM user WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $result = self::$database->query($sql);
    if ($result->num_rows > 0){
      $user = $result->fetch_assoc();
      $_SESSION["username"] = $username;
      $_SESSION["loggedIn"] = true;
      header('Location: /');
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
  public function register($username, $password){
    $sql = "INSERT INTO user (USERNAME, PASSWORD) VALUES ('$username', '$password')";
    self::$database->query($sql);
  }
  public function search($string, $titleonly, $author, $direction){
    $sql = "SELECT * FROM post";
    if (!empty($string)){
      $sql .= " WHERE (TITLE LIKE '%$string%'";
      if(!$titleonly){
        $sql .= " OR CONTENT LIKE '%$string%'";
      }
      if (!empty($author)){
        $sql .=") AND USERNAME = '$author'";
      }
      else {
        $sql .=")";
      }
    }
    else {
      $sql .= " WHERE USERNAME = '$author'";
    }
    $sql .=" ORDER BY post_date $direction";
    $result = self::$database->query($sql);
    return $result;
  }
  /**
  *@return FALSE if username does not exist in database, TRUE if exists
  */
  public function usernameExists($username){
    $sql = "SELECT * FROM user WHERE USERNAME = '$username'";
    $result = self::$database->query($sql);
    if ($result->num_rows > 0){
      $result = TRUE;
    } else {
      $result = FALSE;
    }
    return $result;
  }
}
?>

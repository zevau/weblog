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
  public function searchByUsername($string, $direction = "DESC"){
    $sql = "SELECT * FROM post WHERE username LIKE '$string' ORDER BY post_date '$direction'";
    $result = self::$database->query($sql);
    return $result;
  }
  public function newPost($title, $text, $author){
    $sql = "INSERT INTO post (TITLE, CONTENT, USERNAME) VALUES ('$title', '$text', '$author')";
    self::$database->query($sql);
  }
  public function deletePost($id){

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
    }
  }
  public function searchPost($string, $titleonly = false, $direction = "DESC"){
    $sql = "SELECT * FROM post WHERE TITLE LIKE %'$string'%";
    if(!titleonly){
      $sql .= " OR CONTENT LIKE %'$string'%";
    }
    $sql .=" ORDER BY post_date '$direction'";
    $result = self::$database->query($sql);
    return $result;
  }
  public function searchPostByAuthor($string, $titleonly = false, $author, $direction = "DESC"){
    $sql = "SELECT * FROM post WHERE TITLE LIKE %'$string'%";
    if(!titleonly){
      $sql .= " OR CONTENT LIKE %'$string'%";
    }
    $sql .=" AND USERNAME = '$author' ORDER BY post_date '$direction'";
    $result = self::$database->query($sql);
    return $result;
  }
  public function searchByAuthor($author, $direction = "DESC"){
    $sql = "SELECT * FROM post WHERE username LIKE '$author' ORDER BY post_date '$direction'";
    $result = self::$database->query($sql);
    return $result;
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
    echo $sql;
    $result = self::$database->query($sql);
    return $result;
  }
}
?>

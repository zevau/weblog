<?php
class DB {
  /**
  *contains all database-queries
  */

  public static $database = null;
  
  function __construct() {

    require_once './inc/mysql.inc.php';

    self::$database = new mysqli($dbhost,$dbuser,$dbpass, $dbname);
    if (self::$database->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $database->connect_error);
    }
    session_start();

  }
  /**
  *retrieves the number of all posts in db
  *@return int number of all posts in db
  */
  public function getTotalPostCount(){
    $sql = "SELECT COUNT(*) AS amount FROM post";
    $result = self::$database->query($sql);
    $result = $result->fetch_array();
    $result = $result["amount"];
    return $result;
  }
  /**
  *retrieves a number of posts from $start to $range
  *@param int $range number of posts to retrieve
  *@param int $start starting index
  *@return sql-result-table
  */
  public function getLatestPosts($start, $range) {
    $sql = "SELECT * FROM post ORDER BY post_date DESC LIMIT $start, $range";
    $result = self::$database->query($sql);
    return $result;
  }/**
  *retrieves all posts of a user
  *@param String $username name of the user to search for
  *@return sql-result-table
  */
  public function getUserPosts($username) {
    $sql = "SELECT * FROM post WHERE USERNAME = '$username' ORDER BY post_date DESC";
    $result = self::$database->query($sql);
    return $result;
  }
  /**
  *writes a new post into the database
  *@param String $title post-title
  *@param String $text post-content
  *@param String $author username of the author
  */
  public function newPost($title, $text, $author){
    $sql = "INSERT INTO post (TITLE, CONTENT, USERNAME) VALUES ('$title', '$text', '$author')";
    self::$database->query($sql);
  }
  /**
  *deletes a post from database
  *@param int $id POST_ID of the posting
  */
  public function deletePost($id){
    $sql = "DELETE FROM post WHERE POST_ID = '$id'";
    self::$database->query($sql);
  }
  /**
  *cleans a string from sql-injection
  *@param String $string String to clean
  */
  public function real_escape_string($string){
    $result = self::$database->real_escape_string($string);
    return $result;
  }
  /**
  *checks if username and password input is valid and logs in the user
  *@param String $username
  *@param String $password
  */
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

  /**
  *registers a new user in database
  *@param String $username
  *@param String $password
  */
  public function register($username, $password){
    $sql = "INSERT INTO user (USERNAME, PASSWORD) VALUES ('$username', '$password')";
    self::$database->query($sql);
  }
  /**
  *searches for strings in posts and/or authors
  *@param String $string string to search for
  *@param bool $titleonly if checked, only titles will be searched
  *@param String $author author of a post
  *@param String $direction ASC or DESC, newest or oldest post first.
  *@return sql-result-table
  */
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
  *checks if a username is already taken
  *@param String $username
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
  /**
  *validates if a user is the author of a certain posts
  *@param int id POST_ID of post
  *@param String author username
  */
  public function validateAuthor($id, $author){
    $sql = "SELECT * FROM post WHERE USERNAME = '$author' AND POST_ID = '$id'";
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

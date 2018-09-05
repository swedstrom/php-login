<?php
require_once("DBController.php");
$db_handle = new DBController();

if(!empty($_POST["username"])) {
  $query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}

if(!empty($_POST["email"])) {
  $query = "SELECT email FROM users WHERE email='" . $_POST["email"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'> *Email is Not Available.</span>";
   }else{
      echo "<span class='status-available'> Email is Available.</span>";
  }
}
?>

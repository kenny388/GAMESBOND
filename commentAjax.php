<?php
require_once 'private/db_credentials.php';
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


    if($_POST['act'] == 'comment'){
    	$user_comment = $_POST['user_comment'];
    	$game_id = $_POST['game_id'];
      $user_id = $_POST['user_id'];

      $db->query("UPDATE rating SET user_comment = '$user_comment' WHERE game_id= '$game_id' AND user_id = '$user_id' ");
      echo "Your review has been submitted successfully! Thank you for reviewing the game!";
    }
$db->close();

?>

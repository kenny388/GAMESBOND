<?php
if (isset($_POST['game_id'])) {
  $game_id = $_POST['game_id'];
} else {
  $game_id = "";
}

if (isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];
} else {
  $user_id = "";
}

$checkQuery = "SELECT * from User_Watchlists WHERE user_id = '{$user_id}' AND game_id = '{$game_id}'";
$insertQuery = "INSERT INTO User_Watchlists (user_id, game_id) VALUES ('$user_id', '$game_id')";

// $updateQuery = "UPDATE User_Watchlists SET time_stamp = CURRENT_TIMESTAMP() WHERE user_id = '{$user_id}' AND game_id = '{$game_id}'";


//Get credentials
include 'private/db_credentials_products.php';

$connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
if(mysqli_connect_errno()) {
  echo '<br>';
  die("Database connection failed: " .
       mysqli_connect_error() .
       " (" . mysqli_connect_errno() . ")"
  );
}

  $checkResult = @mysqli_query($connection, $checkQuery);

if (!$checkResult) {
    // echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
    die("Database query failed.");

  } else {
    $row_count = $checkResult->num_rows;
    while($row = $checkResult->fetch_assoc()) {
    }
      if ($row_count > 0) {
        //There is already a record that is registered
        // echo 'record Exist';
        $existed = true;
      } else {
        //No record exist
        // echo 'record non-existing';
        $existed = false;
        //Free $result from memory at the end
        mysqli_free_result($checkResult);
      }
  }

    if ($existed == false) {
    //Execute Insert Query and get $result
      $insertResult = @mysqli_query($connection, $insertQuery);

      //If executing query failed, print and stop the page
    if (!$insertResult) {
      die("Database query failed.");
    } else {
      echo 'inserted';
    }
  } else {
  	echo "Inserttedddd";
  }

?>

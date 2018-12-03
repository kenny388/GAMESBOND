<?php
include 'private/db_credentials_products.php';

$connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$query = "SELECT count(*) FROM User_Watchlists WHERE user_id = '{$_SESSION['email']}' AND game_id = '{$gameCode}'";

// Test if connection succeeded
if(mysqli_connect_errno()) {
  echo '<br>';
  die("Database connection failed: " .
       mysqli_connect_error() .
       " (" . mysqli_connect_errno() . ")"
  );
}

  $checkResult = @mysqli_query($connection, $query);

if (!$checkResult) {
    die("Database query failed.");
}

while($row = $checkResult->fetch_assoc()) {
  //There is result
  if ($row['count(*)'] > 0) {
    $watchListExist = 't';
  } else {
    $watchListExist = 'f';
  }
}

?>

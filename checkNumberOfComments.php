<?php
include 'private/db_credentials_products.php';

$tempConnection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$query = "SELECT count(*) FROM rating WHERE game_id = '{$row['game_id']}'";

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

while($row2 = $checkResult->fetch_assoc()) {
  //There is result
  $numOfComment = $row2['count(*)'];
}

$tempConnection->close();
$checkResult->free_result();

?>

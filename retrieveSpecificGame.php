<?php

//Check if there is GET variable "gameCode" if not, redirect back to homepage
if (!isset($_GET['gameCode'])) {
  header('Location: showmodels.php');
  exit();
} else {
  $gameCode = $_GET['gameCode'];
}

//If submission exist and no error
  $query = "SELECT * FROM games WHERE FIELD1 = {$gameCode}";

//Get credentials
include 'private/db_credentials_products.php';

// Suppress if connection failed
$connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
if(mysqli_connect_errno()) {
  echo '<br>';
  die("Database connection failed: " .
       mysqli_connect_error() .
       " (" . mysqli_connect_errno() . ")"
  );
}
//Else it wouldn't run any of the code below

//Execute Query and get $result
  $result = @mysqli_query($connection, $query);

  //If executing query failed, print and stop the page
  if (!$result) {
    die("Database query failed.");
  } else {

    // echo '<div class="GamesContainer">';

    //Each Loop of fetching data
  while ($row = @mysqli_fetch_assoc($result)) {

    // echo '<div class="gameEntry">';
    // echo '<div class="gameImages" style="background-image:url(' . $row["images"] . ')"></div>';
    // echo '<div class="gameNames">' . $row["title"] . '</div>';
    // echo '<div class="gameGenre">' . $row["genre"] . '</div>';
    // echo '</div>';
    // echo 'gameDiscovered';
    $retrievedName = $row['title'];
    $retrievedImage = $row['images'];
    $retrievedGenre = $row['genre'];
    $retrievedPlatform = $row['platform'];
    $retrievedIgnScore = $row['score'];
    $retrievedYear = $row['release_year'];
    $retrievedMonth = $row['release_month'];
    $retrievedDay = $row['release_day'];

    // echo
    // $retrievedName .
    // $retrievedImage .
    // $retrievedGenre .
    // $retrievedPlatform .
    // $retrievedIgnScore .
    // $retrievedYear .
    // $retrievedMonth .
    // $retrievedDay;

  }

  // echo '</div>';
  }

  //Free $result from memory at the end
  mysqli_free_result($result);
  // Close database connection
  mysqli_close($connection);



?>

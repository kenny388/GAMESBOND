<?php
//If submission exist and no error
  $query = 'SELECT * FROM games ORDER BY score DESC LIMIT 20';

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

    echo '<div class="GamesContainer">';

    //Each Loop of fetching data
  while ($row = @mysqli_fetch_assoc($result)) {
    echo '<div class="gameEntry">';
    echo '<a href="gameSpecific.php?gameCode=' . $row['FIELD1'] . '">';
    echo '<div class="gameImages" style="background-image:url(' . $row["images"] . ')"></div>';
    echo '</a>';
    echo '<div class="gameNames">' . $row["title"] . '</div>';
    echo '<div class="gameGenre">' . $row["genre"] . '</div>';
    echo '</div>';
  }

  echo '</div>';
  }

  //Free $result from memory at the end
  mysqli_free_result($result);
  // Close database connection
  mysqli_close($connection);



?>

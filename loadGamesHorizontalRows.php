<!-- Start of Query Statement Construction -->
<?php

//If submission exist and no error
  $query = 'SELECT * FROM covers JOIN mytable ON mytable.FIELD1 = covers.FIELD1 ORDER BY `mytable`.`score` DESC';


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
//
  //Although there wouldn't be any error theoretically, I put @ suppression here to handle exception
  $result = @mysqli_query($connection, $query);

  //If executing query failed, print and stop the page
  if (!$result) {
    die("Database query failed.");
  } else {

    echo '<div class="GamesContainer">';

    //Each Loop of fetching data
  while ($row = @mysqli_fetch_assoc($result)) {



    echo "<tr>";
    echo '<div class="gameEntry">';
    echo '<div class="gameImages" style="background-image:url(' . $row["images"] . ')"></div>';
    echo '<div class="gameNames">' . $row["title"] . '</div>';
    echo '<div class="gameGenre">' . $row["genre"] . '</div>';
    echo '</div>';
  }

  echo '</div>';
  }

?>

<?php
//If submission exist and no error
if(isset($_POST['submit']) && count($errors) == 0){
  //Free $result from memory at the end
  mysqli_free_result($result);
  // Close database connection
  mysqli_close($connection);
}
?>

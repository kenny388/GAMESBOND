<?php
if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
}

if (isset($_GET['score'])) {
  $score = $_GET['score'];
}

if (isset($_GET['chkPlatformer'])) {
  $chkPlatformer = $_GET['chkPlatformer'];
} else {
  $chkPlatformer = false;
}
if (isset($_GET['chkRPG'])) {
  $chkRPG = $_GET['chkRPG'];
} else {
  $chkRPG = false;
}
if (isset($_GET['chkSimulation'])) {
  $chkSimulation = $_GET['chkSimulation'];
} else {
  $chkSimulation = false;
}
if (isset($_GET['chkAction'])) {
  $chkAction = $_GET['chkAction'];
} else {
  $chkActioner = false;
}
if (isset($_GET['chkAdventure'])) {
  $chkAdventure = $_GET['chkAdventure'];
} else {
  $chkAdventure = false;
}
if (isset($_GET['chkShooter'])) {
  $chkShooter = $_GET['chkShooter'];
} else {
  $chkShooter = false;
}
if (isset($_GET['chkSports'])) {
  $chkSports = $_GET['chkSports'];
} else {
  $chkSports = false;
}
if (isset($_GET['chkPuzzle'])) {
  $chkPuzzle = $_GET['chkPuzzle'];
} else {
  $chkPuzzle = false;
}
if (isset($_GET['chkMusic'])) {
  $chkMusic = $_GET['chkMusic'];
} else {
  $chkMusic = false;
}
if (isset($_GET['chkRacing'])) {
  $chkRacing = $_GET['chkRacing'];
} else {
  $chkRacing = false;
}
if (isset($_GET['chkStrategy'])) {
  $chkStrategy = $_GET['chkStrategy'];
} else {
  $chkStrategy = false;
}

$chkBoxUntouched = true;

if ($chkPlatformer == "true" || $chkRPG  == "true" || $chkMusic  == "true" || $chkPuzzle  == "true" || $chkRacing  == "true" || $chkAction  == "true" || $chkSports == "true"  || $chkShooter == "true"  || $chkStrategy == "true"  || $chkSimulation == "true"  || $chkAdventure == "true" ) {
  $chkBoxUntouched = "false";
} else {
  $chkBoxUntouched = "true";
}

$searchBarUntouched = "true";
if (strlen($keyword) != 0) {
  $searchBarUntouched = "false";
}

// echo $chkPlatformer;
// echo $chkRPG;
// echo $chkSimulation;
// echo $chkAction;
// echo $chkAdventure;
// echo $chkShooter;
// echo $chkSports;
// echo $chkPuzzle;
// echo $chkMusic;
// echo $chkRacing;
// echo $chkStrategy;
//
// echo $keyword;
// echo $score;
//
//
// echo $chkBoxUntouched;
// echo $searchBarUntouched;



//If submission exist and no error
  $query = 'SELECT * FROM games';
  if ($chkBoxUntouched == "false") {
    $query .= ' WHERE';
  } else if ($searchBarUntouched == "false") {
    $query .= ' WHERE';
  } else {
    $query .= ' WHERE';
  }
  $tempQuery = "";
  if ($chkPlatformer == "true") {
    $tempQuery .= " OR genre = 'Platformer'";
  }
  if ($chkRPG == "true") {
    $tempQuery .= " OR genre = 'RPG'";
  }
  if ($chkSimulation == "true") {
    $tempQuery .= " OR genre = 'Simulation'";
  }
  if ($chkAction == "true") {
    $tempQuery .= " OR genre = 'Action'";
  }
  if ($chkAdventure == "true") {
    $tempQuery .= " OR genre = 'Adventure'";
  }
  if ($chkShooter == "true") {
    $tempQuery .= " OR genre = 'Shooter'";
  }
  if ($chkSports == "true") {
    $tempQuery .= " OR genre = 'Sports'";
  }
  if ($chkPuzzle == "true") {
    $tempQuery .= " OR genre = 'Puzzle'";
  }
  if ($chkMusic == "true") {
    $tempQuery .= " OR genre = 'Music'";
  }
  if ($chkRacing == "true") {
    $tempQuery .= " OR genre = 'Racing'";
  }
  if ($chkStrategy == "true") {
    $tempQuery .= " OR genre = 'Strategy'";
  }
  if ($chkBoxUntouched == "false") {
    $tempQuery = substr($tempQuery, 3);
    $tempQuery = '(' . $tempQuery . ')';
  }

  $query .= $tempQuery;

  if ($searchBarUntouched == "false") {
    if ($chkBoxUntouched == "true") {
      $query .= " title LIKE '%" . $keyword . "%'";
    } else {
      $query .= " AND title LIKE '%" . $keyword . "%'";
    }
  }

  if ($searchBarUntouched == "false" || $chkBoxUntouched == "false") {
    $query .= " AND score >= '$score'";
  } else {
    $query .= " score >= '$score'";
  }

  $query .= ' ORDER BY score DESC LIMIT 20';

        // echo $query;

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

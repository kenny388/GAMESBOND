<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/shareAll.css">
	<link rel="stylesheet" href="css/recommendation.css">
	<link rel="stylesheet" href="css/sideBar.css">
	<script data-require="jquery" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

	<?php
	session_start();
	include 'functions.php';
	include 'sideBar.php';
       // Error array that might get populated if there is error
	$errors = array();

			if(!isset($_SESSION['loggedIn']) && !isset($_GET['user_id'])) {
				header("Location: showmodels.php");
				exit();
			}


	?>
	<!-- SideBar content: -->



</div>
	</div>
	<!-- End of SideBar -->

	<div class="mainBar">
	<div class="container">

	<!-- Start Of Form -->
	<!-- Form that direct to itself -->


	<?php

	include 'topBar.php';

	include 'private/db_credentials.php';


	$user = @$_SESSION['email'];
	if (isset($_GET['user_id'])) {
		$user = $_GET["user_id"];
		$email = $_GET["user_id"];
	}

  $Platformer = 0;
  $RPG = 0;
  $Simulation = 0;
  $Action = 0;
  $Adventure = 0;
  $Shooter = 0;
  $Sports = 0;
  $Puzzle = 0;
  $Music = 0;
  $Racing = 0;
  $Strategy = 0;


	$query = "SELECT * FROM browse_History JOIN games ON browse_History.game_id = games.FIELD1 WHERE browse_History.user_id = '{$user}'";
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
						if(mysqli_connect_errno()) {
							$msg = "Database connection failed: ";
							$msg .= mysqli_connect_error();
							$msg .= " (" . mysqli_connect_errno() . ")";
							exit($msg);
						}

	$result = $connection->query($query);
  $count = 0;

	while ($row = @mysqli_fetch_assoc($result)) {
      $count += 1;
      if ($row['genre'] == "Platformer") {
        $Platformer += 1;
      }
      if ($row['genre'] == "RPG") {
        $RPG += 1;
      }
      if ($row['genre'] == "Simulation") {
        $Simulation += 1;
      }
      if ($row['genre'] == "Action") {
        $Action += 1;
      }
      if ($row['genre'] == "Adventure") {
        $Adventure += 1;
      }
      if ($row['genre'] == "Shooter") {
        $Shooter += 1;
      }
      if ($row['genre'] == "Sports") {
        $Sports += 1;
      }
      if ($row['genre'] == "Puzzle") {
        $Puzzle += 1;
      }
      if ($row['genre'] == "Music") {
        $Music += 1;
      }
      if ($row['genre'] == "Racing") {
        $Racing += 1;
      }
      if ($row['genre'] == "Strategy") {
        $Strategy += 1;
      }
	}

  if ($Platformer == 0 && $RPG == 0 && $Simulation == 0 && $Action == 0 && $Adventure == 0 && $Shooter == 0 && $Sports == 0 && $Puzzle == 0 && $Music == 0 && $Racing == 0 && $Strategy == 0) {
    echo "You don't have any browsing history >< <br> We will recommend you to browse other games :)";
    exit();
  }

  $PlatformerPersentage = $Platformer * 10 / $count;
  $RPGPersentage = $RPG * 10 / $count;
  $SimulationPersentage = $Simulation * 10 / $count;
  $ActionPersentage = $Action * 10 / $count;
  $AdventurePersentage = $Adventure * 10 / $count;
  $ShooterPersentage = $Shooter * 10 / $count;
  $SportsPersentage = $Sports * 10 / $count;
  $PuzzlePersentage = $Puzzle * 10 / $count;
  $MusicPersentage = $Music * 10 / $count;
  $RacingPersentage = $Racing * 10 / $count;
  $StrategyPersentage = $Strategy * 10 / $count;

  echo "Platformer: " . round($PlatformerPersentage * 10, 1) . "%<br>";
  echo "RPG: " . round($RPGPersentage * 10, 1) . "%<br>";
  echo "Simulation: " . round($SimulationPersentage * 10, 1) . "%<br>";
  echo "Action: " . round($ActionPersentage * 10, 1) . "%<br>";
  echo "Adventure: " . round($AdventurePersentage * 10, 1) . "%<br>";
  echo "Shooter: " . round($ShooterPersentage * 10, 1) . "%<br>";
  echo "Sports: " . round($SportsPersentage * 10, 1) . "%<br>";
  echo "Puzzle: " . round($PuzzlePersentage * 10, 1) . "%<br>";
  echo "Music: " . round($MusicPersentage * 10, 1) . "%<br>";
  echo "Racing: " . round($RacingPersentage * 10, 1) . "%<br>";
  echo "Strategy: " . round($StrategyPersentage * 10, 1) . "%<br>";

  $PlatformerNumber = round($PlatformerPersentage, 0, PHP_ROUND_HALF_DOWN);
  $RPGNumber = round($RPGPersentage, 0, PHP_ROUND_HALF_DOWN);
  $SimulationNumber = round($SimulationPersentage, 0, PHP_ROUND_HALF_DOWN);
  $ActionNumber = round($ActionPersentage, 0, PHP_ROUND_HALF_DOWN);
  $AdventureNumber = round($AdventurePersentage, 0, PHP_ROUND_HALF_DOWN);
  $ShooterNumber = round($ShooterPersentage, 0, PHP_ROUND_HALF_DOWN);
  $SportsNumber = round($SportsPersentage, 0, PHP_ROUND_HALF_DOWN);
  $PuzzleNumber = round($PuzzlePersentage, 0, PHP_ROUND_HALF_DOWN);
  $MusicNumber = round($MusicPersentage, 0, PHP_ROUND_HALF_DOWN);
  $RacingNumber = round($RacingPersentage, 0, PHP_ROUND_HALF_DOWN);
  $StrategyNumber = round($StrategyPersentage , 0, PHP_ROUND_HALF_DOWN);



  // echo $Platformer . "<br>";
  // echo $RPG . "<br>";
  // echo $Simulation . "<br>";
  // echo $Action . "<br>";
  // echo $Adventure . "<br>";
  // echo $Shooter . "<br>";
  // echo $Sports . "<br>";
  // echo $Puzzle . "<br>";
  // echo $Music . "<br>";
  // echo $Racing . "<br>";
  // echo $Strategy . "<br>";

	?>



			<div class="featuredTitle">
					<h3>Browse History</h3>
					<hr>
			</div>

		<div class="section">
		<div class="gameSection">
			<div class="GamesContainer">

		<?php

				// $query = "SELECT * FROM games WHERE genre = 'Platformer' LIMIT $PlatformerNumber";
				// $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
				// 				if(mysqli_connect_errno()) {
				// 					$msg = "Database connection failed: ";
				// 					$msg .= mysqli_connect_error();
				// 					$msg .= " (" . mysqli_connect_errno() . ")";
				// 					exit($msg);
				// 				}
        //
				// $result = $connection->query($query);
        //
				// while ($row = @mysqli_fetch_assoc($result)) {
				// 	echo '<div class="gameEntry">';
				// 	echo '<a href="gameSpecific.php?gameCode=' . $row['FIELD1'] . '">';
				// 	echo '<div class="gameImages" style="background-image:url(' . $row["images"] . ')"></div>';
				// 	echo '</a>';
				// 	echo '<div class="gameNames">' . $row["title"] . '</div>';
				// 	echo '<div class="gameGenre">' . $row["genre"] . '</div>';
				// 	echo '</div>';
				// }

        // prepare and bind
        $stmt = $connection->prepare("SELECT * FROM games WHERE genre = ? ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("si", $tempGenre, $tempNumber);
        $stmt->bind_result($FIELD1, $score_phrase, $title, $url, $platform, $score, $genre, $editors_choice, $release_year, $releast_month, $release_day, $images);

        // set parameters and execute
        $tempGenre = "Platformer";
        $tempNumber = $PlatformerNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }
        $tempGenre = "RPG";
        $tempNumber = $RPGNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }

        $tempGenre = "Simulation";
        $tempNumber = $SimulationNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }

        $tempGenre = "Action";
        $tempNumber = $ActionNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }

        $tempGenre = "Adventure";
        $tempNumber = $AdventureNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }

        $tempGenre = "Shooter";
        $tempNumber = $ShooterNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }
        $tempGenre = "Sports";
        $tempNumber = $SportsNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }

        $tempGenre = "Puzzle";
        $tempNumber = $PuzzleNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }
        $tempGenre = "Music";
        $tempNumber = $MusicNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }

        $tempGenre = "Racing";
        $tempNumber = $RacingNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }

        $tempGenre = "Strategy";
        $tempNumber = $StrategyNumber;
        $stmt->execute();

        while ($stmt->fetch()) {
            echo '<div class="gameEntry">';
            echo '<a href="gameSpecific.php?gameCode=' . $FIELD1 . '">';
            echo '<div class="gameImages" style="background-image:url(' . $images . ')"></div>';
            echo '</a>';
            echo '<div class="gameNames">' . $title . '</div>';
            echo '<div class="gameGenre">' . $genre . '</div>';
            echo '</div>';
        }


        $stmt->close();
        $connection->close();


			?>

		</div>
		</div>

	</div>

	</div>
</div>



	</body>
	</html>

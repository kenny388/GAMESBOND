<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/shareAll.css">
	<link rel="stylesheet" href="css/subscription.css">
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


    //Extract session email
		if(!isset($_SESSION['loggedIn'])) {
			$email = @$_SESSION['email'];
			$name = @$_SESSION["firstName"];
		}

    //Receives the GET model name
	// $receivedName = $_GET['productName'];
	// $modelName = str_replace('%20', ' ', $receivedName);
	include 'private/db_credentials.php';


	$user = @$_SESSION['email'];
	if (isset($_GET['user_id'])) {
		$user = $_GET["user_id"];
		$email = $_GET["user_id"];
	}


	$query = "SELECT * FROM users WHERE email = '{$user}'";
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
						if(mysqli_connect_errno()) {
							$msg = "Database connection failed: ";
							$msg .= mysqli_connect_error();
							$msg .= " (" . mysqli_connect_errno() . ")";
							exit($msg);
						}

	$result = $connection->query($query);

	while ($row = @mysqli_fetch_assoc($result)) {
		$userID = $row["email"];
		$userFirstName = $row["first_name"];
		$userLastName = $row["last_name"];
	}


	//Checking User Comment Number
	$query = "SELECT * FROM users JOIN rating ON users.email = rating.user_id WHERE user_id = '{$user}'";
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
						if(mysqli_connect_errno()) {
							$msg = "Database connection failed: ";
							$msg .= mysqli_connect_error();
							$msg .= " (" . mysqli_connect_errno() . ")";
							exit($msg);
						}

	$result = @$connection->query($query);

	$commentCount = 0;

	while ($row = @mysqli_fetch_assoc($result)) {
		$commentCount += 1;

	}

	?>


	<div class="featuredTitle">
			<h3>My Subscriptions</h3>
			<hr>
	</div>

		<?php
		$query = "SELECT DISTINCT * FROM User_Watchlists INNER JOIN games  INNER JOIN browse_History ON games.FIELD1 = User_Watchlists.game_id AND browse_History.game_id = User_Watchlists.game_id WHERE User_Watchlists.user_id = '{$user}' AND browse_History.user_id = '{$user}'";
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              if(mysqli_connect_errno()) {
                $msg = "Database connection failed: ";
                $msg .= mysqli_connect_error();
                $msg .= " (" . mysqli_connect_errno() . ")";
                exit($msg);
              }

		$result = $connection->query($query);



		while ($row = @mysqli_fetch_assoc($result)) {
			// $retrievedID = $row['FIELD1'];
			// $retrievedName = $row['title'];
			$userID = $row["user_id"];
      $imgURL = $row["images"];
      $gameID = $row["game_id"];
			// $commentID = $row["rating_id"];
				# code...
				echo '<div class="commentEntry">';
					echo '<div class="gamePanel">';
						// echo '<div class="userName">';
						// 	echo "<h3>" . $row['first_name'] . " " . $row['last_name'] . "</h3>";
						// echo "</div>";
						echo "<div class='profilePic'>";
							echo "<a href='gameSpecific.php?gameCode=";
              echo "$gameID'>";
              echo "<img src='$imgURL'></img></a>";
						echo '</div>';
						// echo '<div class="userName">';
						// 	echo "<h3>Rated: " . $row['user_rating'] . "</h3>";
						// echo "</div>";
					echo "</div>";
					echo "<div class='blackLine'>";
					echo "</div>";
					echo "<div class='contentPanel'>";
						// echo "<div class='timeStamp'>";
						// 	echo "<p>" . $row['time'] . "</p>";
						// // echo "</div>";
            echo "<div class='timeStamp'>";
              echo "<p>Last Checked On " . $row['time_stamp'] . "</p>";
            echo "</div>";
						echo "<div class='actualTitle'>";
							echo "<p>" . $row['title'] . "</p>";
						echo "</div>";

            include 'checkNumberOfComments.php';

						echo "<div class='actualContent'>";
							echo "<p>" . ($numOfComment - $row['comment_seen']) . " New Comment(s)</p>";
						echo "</div>";



					echo "</div>";
				echo "</div>";
		}

		if ($commentCount == 0) {
			echo "This user has not rate or comment on any game yet";
		}

		?>


			<!-- <div class="featuredTitle">
					<h3>Browse History</h3>
					<hr>
			</div>

		<div class="section">
		<div class="gameSection">
			<div class="GamesContainer"> -->

		<?php

				// $query = "SELECT * FROM browse_History INNER JOIN games ON browse_History.game_id = games.FIELD1 WHERE browse_History.user_id = '{$user}'";
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
        //
				// while ($row = @mysqli_fetch_assoc($result)) {
				// 	echo '<div class="gameEntry">';
				// 	echo '<a href="gameSpecific.php?gameCode=' . $row['FIELD1'] . '">';
				// 	echo '<div class="gameImages" style="background-image:url(' . $row["images"] . ')"></div>';
				// 	echo '</a>';
				// 	echo '<div class="gameNames">' . $row["title"] . '</div>';
				// 	echo '<div class="gameGenre">' . $row["time_stamp"] . '</div>';
				// 	echo '</div>';
				// }
        //

			?>

		</div>
		</div>

	</div>

	</div>

	<!-- Watchlist Code -->
		<!-- Watchlist: -->
		<!-- <br> -->
		<?php
		// $user_id = $_SESSION["email"];
		// $query = "SELECT * FROM User_Watchlists JOIN games on games.FIELD1 = User_Watchlists.game_id WHERE user_id = '{$user}'";
		// $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    //
		// $result = $connection -> query($query);
    //
		// while ($row = @mysqli_fetch_assoc($result)) {
		// 	$user_id = $row["user_id"];
		// 	$game_id = $row["game_id"];
		// 			// echo "game_id:";
		// 	echo '<div class="gameNames">' . $row["title"] . '</div>';
		// 	echo $user_id;
		// 	echo "<br>";
		// 	echo '<a href="gameSpecific.php?gameCode=' . $game_id . '">';
		// 	echo $game_id;
    //
		// 	echo '<div class="gameImages" style="background-image:url(' . $row["images"] . ')"></div>';
		// 	echo "<br>";
		// 	echo "</a>";
		// 	echo "<br> <br>";
    //
		// }
		?>
		<!-- End -->


</div>



	</body>
	</html>

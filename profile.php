<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/shareAll.css">
	<link rel="stylesheet" href="css/profile.css">
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

	<div class="userPanel">
		<div class="userBox">
			<div class="profileImage">
			<img src="img/KirbySquare.png"></img>
		</div>
		<div class="userName">

			</div>
		</div>
		<div class="infoBox">
						<h3><?php echo $userFirstName . " " . $userLastName; ?></h3>
						<br>
						<label>Email:</label>
						<p><?php echo $userID; ?></p>
						<br>
						<label>Number of Games Rated</label>
						<p><?php echo $commentCount; ?></p>
						<br>
		</div>
	</div>

	<div class="featuredTitle">
			<h3>Comments</h3>
			<hr>
	</div>

		<?php
		$query = "SELECT * FROM users JOIN rating JOIN games ON users.email = rating.user_id AND rating.game_id = games.FIELD1 WHERE user_id = '{$user}'";
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
			$commentID = $row["rating_id"];
				# code...
				echo '<div class="commentEntry">';
					echo '<div class="gamePanel">';
						// echo '<div class="userName">';
						// 	echo "<h3>" . $row['first_name'] . " " . $row['last_name'] . "</h3>";
						// echo "</div>";
						echo "<div class='profilePic'>";
							echo "<img src=" . $row['images'] . "></img>";
						echo "</div>";
						echo '<div class="userName">';
							echo "<h3>Rated: " . $row['user_rating'] . "</h3>";
						echo "</div>";
					echo "</div>";
					echo "<div class='blackLine'>";
					echo "</div>";
					echo "<div class='contentPanel'>";
						echo "<div class='timeStamp'>";
							echo "<p>" . $row['time'] . "</p>";
						echo "</div>";
						echo "<div class='actualTitle'>";
							echo "<p>" . $row['comment_title'] . "</p>";
						echo "</div>";
						echo "<div class='actualContent'>";
							echo "<p>" . $row['user_comment'] . "</p>";
						echo "</div>";

					echo "</div>";
				echo "</div>";
		}

		if ($commentCount == 0) {
			echo "This user has not rate or comment on any game yet";
		}

		?>



			<div class="featuredTitle">
					<h3>Browse History</h3>
					<hr>
			</div>

		<div class="section">
		<div class="gameSection">
			<div class="GamesContainer">

		<?php

				$query = "SELECT * FROM browse_History INNER JOIN games ON browse_History.game_id = games.FIELD1 WHERE browse_History.user_id = '{$user}'";
				$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
								if(mysqli_connect_errno()) {
									$msg = "Database connection failed: ";
									$msg .= mysqli_connect_error();
									$msg .= " (" . mysqli_connect_errno() . ")";
									exit($msg);
								}

				$result = $connection->query($query);


				while ($row = @mysqli_fetch_assoc($result)) {
					echo '<div class="gameEntry">';
					echo '<a href="gameSpecific.php?gameCode=' . $row['FIELD1'] . '">';
					echo '<div class="gameImages" style="background-image:url(' . $row["images"] . ')"></div>';
					echo '</a>';
					echo '<div class="gameNames">' . $row["title"] . '</div>';
					echo '<div class="gameGenre">' . $row["time_stamp"] . '</div>';
					echo '</div>';
				}


			?>

		</div>
		</div>

	</div>

	</div>
</div>



	</body>
	</html>

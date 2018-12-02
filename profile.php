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
	$email = @$_SESSION['email'];
	$name = $_SESSION["firstName"];


    //Receives the GET model name
	// $receivedName = $_GET['productName'];
	// $modelName = str_replace('%20', ' ', $receivedName);
	include 'private/db_credentials.php';

	if(isset($_SESSION['loggedIn'])) {
		$user_id = $_SESSION['email'];
			$query = "SELECT * FROM browse_History INNER JOIN games ON browse_History.game_id = games.FIELD1 WHERE user_id = '{$user_id}'";
			$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              if(mysqli_connect_errno()) {
                $msg = "Database connection failed: ";
                $msg .= mysqli_connect_error();
                $msg .= " (" . mysqli_connect_errno() . ")";
                exit($msg);
              }

			$result = $connection->query($query);


			while ($row = @mysqli_fetch_assoc($result)) {

				$retrievedID = $row['FIELD1'];
				$retrievedName = $row['title'];

				echo "<a href=gameSpecific.php?gameCode=".$retrievedID . ">" . $retrievedName . "</a>";
				echo "<br>";
				echo '<img src="' . $row["images"] . '">';
				echo "<br>";
				echo $row['genre'];
				echo "<br>";
				echo "<br>";

			}

	} else {
		echo "look at some games";
		echo "<br>";
	}
		?>

		<?php
		$user = $_SESSION["email"];
		$query = "SELECT * FROM rating WHERE user_id = '{$user}'";
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
			echo $userID;
			echo "<br>";
			echo "comments:";
			echo "<br>";
			echo $commentID;
			echo "<br>";
			echo "<br>";
		}

		?>

		name:
		<?php echo $name; ?>


		<br>
		<!-- comment_ID -->

		<br>

		<!-- games ID -->
		Games:

	</div>
</div>



	</body>
	</html>

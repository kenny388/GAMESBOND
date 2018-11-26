<?php
require_once 'private/db_credentials.php';
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


    if($_POST['act'] == 'rate'){
    	$user_rating = $_POST['user_rating'];
    	$game_id = $_POST['game_id'];
      $user_id = $_POST['user_id'];

    	// $tempResult = $db->query("SELECT * FROM star WHERE game_id= '$game_id' AND user_id = '$user_id'");
      $result = @mysqli_query($db, "SELECT * FROM rating WHERE game_id= '$game_id' AND user_id = '$user_id'");
    	while($data = mysqli_fetch_assoc($result)) {
    		$rate_db[] = $data;
    	}

    	if(@count($rate_db) == 0 ){
    		$db->query("INSERT INTO rating (user_id, game_id, user_rating)VALUES('$user_id', '$game_id', '$user_rating')");

    	}else{
    		$db->query("UPDATE rating SET user_rating = '$user_rating' WHERE game_id= '$game_id' AND user_id = '$user_id' ");
    	}

      $scoreUpdate = @mysqli_query($db, "SELECT * FROM rating WHERE game_id= '$game_id'");
      while($data2 = mysqli_fetch_assoc($scoreUpdate)) {
        $rate_db2[] = $data2;
        $sum_rates[] = $data2['user_rating'];
      }
      if(@count($rate_db2)){
        $rate_times = count($rate_db2);
        $sum_rates = array_sum($sum_rates);
        $rate_value = $sum_rates/$rate_times;
        echo $rate_value;

      } else {
        $rate_times = 0;
        $rate_value = 0;
      }
    }
$db->close();
$result->free_result();
$scoreUpdate->free_result();

?>

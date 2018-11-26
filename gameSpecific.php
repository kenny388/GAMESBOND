<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Show Models</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shareAll.css">
    <link rel="stylesheet" href="css/gameSpecific.css">
    <link rel="stylesheet" href="css/sideBar.css">
<script data-require="jquery" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  </head>
  <body>

    <div class="everything">
    <?php
    //Start the session, no need to include initialize here, because it contains another set of database credentials
    session_start();

    include 'retrieveSpecificGame.php';

    //Include functions:
    include 'functions.php';

    //Include SideBar:
    include 'sideBar.php';



    // Error array that might get populated if there is error
    $errors = array();
    ?>

    <!-- SideBar content: -->



  </div>
    </div>
    <!-- End of SideBar -->


    <!-- page content -->
    <div class="mainBar">
    <div class="container">
      <!-- <div class="row">
        <input type="text"></input>
      </div> -->

      <!-- Start Of Form -->
      <!-- Form that direct to itself -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <div class="row">
          <!-- Left Column -->
          <div class="column">

            <!-- If field exist, it would be restored back to the input -->
            <input name="modelName" placeholder="SEARCH HERE ...." value="<?php if (isset($_POST['modelName'])) {
        echo htmlspecialchars($_POST['modelName']);
    } ?>" class="mainSearchBar" type="text" size="20"/>
            <div class="secondaryNavElement">
              <a>RECOMMENDATION</a>
            </div>
              <div class="secondaryNavElement">
                              <a>ACTIVITY</a>
                </div>
                <?php
                if (isset($_SESSION['loggedIn'])) {
                echo '<div class="secondaryNavElement">';
                  echo '<a href="logOut.php">LOGOUT</a>';
                echo '</div>';
                echo '<div class="secondaryNavElement">';
                  echo '<a href="#">Hi, ';
                  echo $_SESSION['firstName'];
                  echo '</a>';
                echo '</div>';
                } else {
                  echo '<div class="secondaryNavElement">';
                    echo '<a href="https://' . $_SERVER["HTTP_HOST"] . '/kycheung/GAMESBOND/GAMESBOND/login.php">LOGIN</a>';
                  echo '</div>';
                }
                ?>



          </div>
          <br>
        </div>
          <hr>
              </form>

              <div class="mainPanel">

                  <div class="cover">
                  <img src=" <?php echo $retrievedImage; ?> " alt=""></img>
                </div>
                <div class="info">
                  <div class="titleBox">
                    <h3><?php echo strtoupper($retrievedName); ?></h3>
                  </div>
                  <div class="smallInfoBox">
                    <label>Date of release</label>
                    <p><?php echo $retrievedYear . " . " . $retrievedMonth . " . " . $retrievedDay; ?> <p>
                  </div>
                  <div class="smallInfoBox">
                    <label>Genre</label>
                    <p><?php echo $retrievedGenre; ?> <p>
                  </div>
                  <div class="smallInfoBox">
                    <label>Platform</label>
                    <p><?php echo $retrievedPlatform; ?> <p>
                  </div>
                  <div class="ratingBox">
                    <div class="upperBox">
                      <div class="leftBox">
                      <label>IGN Score</label>
                      <p><?php echo $retrievedIgnScore; ?></p>
                    </div>
                    <div class="rightBox">
                    </div>
                    </div>
                    <div class="lowerBox">
                      <div class="leftBox">
                        </div>
                        <div class="rightBox">
                      <label>COLLECTIVE</label>
                      <p id="collective_score"><?php echo $retrievedIgnScore; ?></p>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="featuredTitle">
                  <h3>RATE THIS GAME</h3>
                  <hr>
              </div>

              <div class="ratingSystem">
                <div class="rate">
              		<div id="1" class="btn-1 rate-btn"></div>
                  <div id="2" class="btn-2 rate-btn"></div>
                  <div id="3" class="btn-3 rate-btn"></div>
                  <div id="4" class="btn-4 rate-btn"></div>
                  <div id="5" class="btn-5 rate-btn"></div>
                  <div id="6" class="btn-6 rate-btn"></div>
                  <div id="7" class="btn-7 rate-btn"></div>
                  <div id="8" class="btn-8 rate-btn"></div>
                  <div id="9" class="btn-9 rate-btn"></div>
                  <div id="10" class="btn-10 rate-btn"></div>
              	</div>
                <div class="box-result">
                  <?php
                  include 'private/db_credentials.php';
                  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
                  if(mysqli_connect_errno()) {
                    $msg = "Database connection failed: ";
                    $msg .= mysqli_connect_error();
                    $msg .= " (" . mysqli_connect_errno() . ")";
                    exit($msg);
                  }
                      $result = $connection->query("SELECT * FROM rating WHERE game_id = '$gameCode'");
                          while($data = mysqli_fetch_assoc($result)){
                                $rate_db[] = $data;
                                $sum_rates[] = $data['user_rating'];
                            }
                            if(@count($rate_db)){
                                $rate_times = count($rate_db);
                                $sum_rates = array_sum($sum_rates);
                                $rate_value = $sum_rates/$rate_times;
                                $rate_bg = (($rate_value)/5)*100;
                            }else{
                                $rate_times = 0;
                                $rate_value = 0;
                                $rate_bg = 0;
                            }
                    ?>
                    <p style="margin:5px 0px; font-size:16px; text-align:center">Rated <strong><?php echo substr($rate_value,0,3); ?></strong> out of <?php echo $rate_times; ?> Review(s)</p>
                </div>

                <div class="commentSystem">
                  <textarea></textarea>
                </div>
              </div>


    </div>

  </div>


</div>
<script>
$(function(){
   $('.rate-btn').hover(function(){
   $('.rate-btn').removeClass('rate-btn-hover');
      var therate = $(this).attr('id');
      for (var i = therate; i >= 0; i--) {
   $('.btn-'+i).addClass('rate-btn-hover');
       };
     });

   $('.rate-btn').click(function(){
      var therate = $(this).attr('id');
      var dataRate = 'act=rate&game_id=<?php echo $gameCode; ?>&user_rating='+therate+'&user_id=<?php echo $_SESSION['email'];?>'; //
   $('.rate-btn').removeClass('rate-btn-active');
      for (var i = therate; i >= 0; i--) {
   $('.btn-'+i).addClass('rate-btn-active');
      };

   $.ajax({
      type : "POST",
      url : "ratingAjax.php",
      data: dataRate,
      success:function(data){
        document.getElementById("collective_score").innerHTML = parseFloat(data).toFixed(1);
			}
    });
  });
});

$( document ).ready(function() {
    document.getElementById("collective_score").innerHTML = parseFloat(<?php echo $rate_value; ?>).toFixed(1);
    console.log( "document loaded" );
});
</script>

     <script data-require="jquery" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script.js"></script>




  </body>
</html>


<!-- <div class="cover" style="background-image:url('
<?php
// echo $retrievedImage;
?>

<div class="gameInfo">
  <div class="gameImage">
  <img src="
  <?php
  // echo $retrievedImage;
  ?> "></img>
</div>
</div>
')"> -->

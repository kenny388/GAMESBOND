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
                <div class="secondaryNavElement">
                                <a>Hi, Kenny</a>
                  </div>



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
                    <h3><?php echo $retrievedName; ?></h3>
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
                      <p><?php echo $retrievedIgnScore; ?></p>
                    </div>
                    </div>
                  </div>
                </div>
              </div>


    </div>

  </div>


</div>

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

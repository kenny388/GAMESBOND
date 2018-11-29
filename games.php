<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Show Models</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shareAll.css">
    <link rel="stylesheet" href="css/games.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <script data-require="jquery" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  </head>
  <body>

    <div class="everything">
    <?php
    //Start the session, no need to include initialize here, because it contains another set of database credentials
    session_start();

    //Check if the form has been submitted before
    if(isset($_POST['submit'])){

      //Check Model Name if exist,
      if (isset($_POST['modelName'])) {
        //Check if empty
        if (!empty($_POST['modelName'])) {
          //Assign the trimmed number to orderNumber
        	$modelName = trim($_POST['modelName']);
          $modelNameArray =  explode(" ", $modelName);
      	}
      }
    }

    //Check if no checkBoxes are checked
    if (isset($_POST['submit']) &&
    !isset($_POST['chkProductName']) &&
    !isset($_POST['chkProductCategory']) &&
    !isset($_POST['chkProductScale']) &&
    !isset($_POST['chkProductVendor']) &&
    !isset($_POST['chkProductDescription']) &&
    !isset($_POST['chkProductBuyPrice'])) {
      //There is nothing to select :/
      $errors['fields'] = "Please select some fields to display!";
    }

    //Include functions:
    include 'functions.php';

    //Include SideBar:
    include 'sideBar.php';
    echo '</div>';
    echo '</div>';

    // Error array that might get populated if there is error
    $errors = array();

    $modelName = "";

    //Check if the form has been submitted before
    if(isset($_POST['submit'])){

      //Check Model Name if exist,
      if (isset($_POST['modelName'])) {
        //Check if empty
        if (!empty($_POST['modelName'])) {
          //Assign the trimmed number to orderNumber
        	$modelName = trim($_POST['modelName']);
          $modelNameArray =  explode(" ", $modelName);
      	}
      }
    }

      //Check if no checkBoxes are checked
      if (isset($_POST['submit']) &&
      !isset($_POST['chkProductName']) &&
      !isset($_POST['chkProductCategory']) &&
      !isset($_POST['chkProductScale']) &&
      !isset($_POST['chkProductVendor']) &&
      !isset($_POST['chkProductDescription']) &&
      !isset($_POST['chkProductBuyPrice'])) {
        //There is nothing to select :/
        $errors['fields'] = "Please select some fields to display!";
      }

    ?>

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
            <div class="searchBar">
              <input name="modelName" placeholder="SEARCH HERE ...." value="<?php if (isset($_POST['modelName'])) echo htmlspecialchars($_POST['modelName']); ?>" class="mainSearchBar" type="text" size="20"/>
              <div class="m_icon"><img src="img/searchIcon.png"></img></div>
            </div>
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
        <div class="searchOptions">
          <div class="conditions">
            <h3>Category</h3>
              <div class="chkBoxRow">
                <div class="chkEntry">
                  <input type="checkbox" name="chkPlatformer" value="chkPlatformer" <?php if (isset($_POST['chkPlatformer'])) echo "checked"; ?>>Platformer</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkRPG" value="chkRPG" <?php if (isset($_POST['chkRPG'])) echo "checked"; ?>>RPG</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkSimulation" value="chkSimulation" <?php if (isset($_POST['chkSimulation'])) echo "checked"; ?>>Simulation</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkAction" value="chkAction" <?php if (isset($_POST['chkAction'])) echo "checked"; ?>>Action</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkAdventure" value="chkAdventure" <?php if (isset($_POST['chkAdventure'])) echo "checked"; ?>>Adventure</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkShooter" value="chkShooter" <?php if (isset($_POST['chkShooter'])) echo "checked"; ?>>Shooter</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkSports" value="chkSports" <?php if (isset($_POST['chkSports'])) echo "checked"; ?>>Sports</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkPuzzle" value="chkPuzzle" <?php if (isset($_POST['chkPuzzle'])) echo "checked"; ?>>Puzzle</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkMusic" value="chkMusic" <?php if (isset($_POST['chkMusic'])) echo "checked"; ?>>Music</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkRacing" value="chkRacing" <?php if (isset($_POST['chkRacing'])) echo "checked"; ?>>Racing</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" name="chkStrategy" value="chkStrategy" <?php if (isset($_POST['chkStrategy'])) echo "checked"; ?>>Strategy</input>
                </div>
              </div>

              <div class="scoreBar">
                <h3>Score</h3>
                <div class="barLabelRow">
                  <label>Greater or Equal to</label>
                  <input id="range"type="range" min="0.0" max="10.0" value="0" class="slider" step="0.1">
                  <label id="score">0.0</label>
                </div>

              </div>
          </div>
        </div>

        <hr>


        <!-- Submit Button -->
        <!-- <input class="button" type="submit" name="submit" value="Refine Search"/> -->

        <!-- End Of Form -->
      </form>



        <?php
        include 'browseGame.php';
        ?>






    </div>
  </div>


</div>

    <script>
      var slider = document.getElementById("range");
      var output = document.getElementById("score");
      output.innerHTML = slider.value; // Display the default slider value

      // Update the current slider value (each time you drag the slider handle)
      slider.oninput = function() {
          output.innerHTML = this.value;
      }
    </script>

     <script data-require="jquery" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script.js"></script>




  </body>
</html>

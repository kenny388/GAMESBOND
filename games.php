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

    //Include functions:
    include 'functions.php';

    //Include SideBar:
    include 'sideBar.php';
    echo '</div>';
    echo '</div>';

    // Error array that might get populated if there is error
    $errors = array();

    ?>

    <!-- page content -->
    <div class="mainBar">
    <div class="container">
      <!-- <div class="row">
        <input type="text"></input>
      </div> -->

      <!-- Start Of Form -->
      <!-- Form that direct to itself -->
      <form method="post">

        <div class="row">
          <!-- Left Column -->
          <div class="column">

            <!-- If field exist, it would be restored back to the input -->
            <div class="searchBar">
              <input id="keywordSearch" name="modelName" placeholder="SEARCH HERE ...." value="<?php if (isset($_POST['modelName'])) echo htmlspecialchars($_POST['modelName']); ?>" class="mainSearchBar" type="text" size="20"/>
              <div class="m_icon"><a id="searchButton" href=""><img src="img/searchIcon.png"></a></img></div>
            </div>

            <!-- </form> -->
            <div class="secondaryNavElement">
              <?php
                if (isset($_SESSION['loggedIn'])) {
                  echo "<a href='recommendation.php'>RECOMMENDATION</a>";
                } else {
                  echo '<a href="https://' . $_SERVER["HTTP_HOST"] . '/kycheung/GAMESBOND/GAMESBOND/login.php">RECOMMENDATION</a>';
                }
              ?>
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
        <!-- <form id="secondForm"> -->
        <div class="searchOptions">
          <div class="conditions">
            <h3>Category</h3>
              <div class="chkBoxRow">
                <div class="chkEntry">
                  <input type="checkbox" id="chkPlatformer" name="chkPlatformer" value="chkPlatformer" <?php if (isset($_POST['chkPlatformer'])) echo "checked"; ?>>Platformer</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkRPG" name="chkRPG" value="chkRPG" <?php if (isset($_POST['chkRPG'])) echo "checked"; ?>>RPG</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkSimulation" name="chkSimulation" value="chkSimulation" <?php if (isset($_POST['chkSimulation'])) echo "checked"; ?>>Simulation</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkAction" name="chkAction" value="chkAction" <?php if (isset($_POST['chkAction'])) echo "checked"; ?>>Action</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkAdventure" name="chkAdventure" value="chkAdventure" <?php if (isset($_POST['chkAdventure'])) echo "checked"; ?>>Adventure</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkShooter" name="chkShooter" value="chkShooter" <?php if (isset($_POST['chkShooter'])) echo "checked"; ?>>Shooter</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkSports" name="chkSports" value="chkSports" <?php if (isset($_POST['chkSports'])) echo "checked"; ?>>Sports</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkPuzzle" name="chkPuzzle" value="chkPuzzle" <?php if (isset($_POST['chkPuzzle'])) echo "checked"; ?>>Puzzle</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkMusic" name="chkMusic" value="chkMusic" <?php if (isset($_POST['chkMusic'])) echo "checked"; ?>>Music</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkRacing" name="chkRacing" value="chkRacing" <?php if (isset($_POST['chkRacing'])) echo "checked"; ?>>Racing</input>
                </div>
                <div class="chkEntry">
                  <input type="checkbox" id="chkStrategy" name="chkStrategy" value="chkStrategy" <?php if (isset($_POST['chkStrategy'])) echo "checked"; ?>>Strategy</input>
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

              <input id="refineButton" type="submit" value="Refine Search"></input>
          </div>
        </div>

        <hr>


        <!-- Submit Button -->
        <!-- <input class="button" type="submit" name="submit" value="Refine Search"/> -->

        <!-- End Of Form -->
      </form>


      <div id="ajaxContent">
        <?php
        include 'browseGame.php';
        ?>
      </div>

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

      $('#refineButton').click(function(event){
        event.preventDefault();
        if (document.getElementById('chkPlatformer').checked) {
          var chkPlatformer = true;
        } else {
          var chkPlatformer = false;
        }
        if (document.getElementById('chkRPG').checked) {
          var chkRPG = true;
        } else {
          var chkRPG = false;
        }
        if (document.getElementById('chkSimulation').checked) {
          var chkSimulation = true;
        } else {
          var chkSimulation = false;
        }
        if (document.getElementById('chkAction').checked) {
          var chkAction = true;
        } else {
          var chkAction = false;
        }
        if (document.getElementById('chkAdventure').checked) {
          var chkAdventure = true;
        } else {
          var chkAdventure = false;
        }
        if (document.getElementById('chkShooter').checked) {
          var chkShooter = true;
        } else {
          var chkShooter = false;
        }
        if (document.getElementById('chkPuzzle').checked) {
          var chkPuzzle = true;
        } else {
          var chkPuzzle = false;
        }
        if (document.getElementById('chkMusic').checked) {
          var chkMusic = true;
        } else {
          var chkMusic = false;
        }
        if (document.getElementById('chkRacing').checked) {
          var chkRacing = true;
        } else {
          var chkRacing = false;
        }
        if (document.getElementById('chkStrategy').checked) {
          var chkStrategy = true;
        } else {
          var chkStrategy = false;
        }
        if (document.getElementById('chkSports').checked) {
          var chkSports = true;
        } else {
          var chkSports = false;
        }

        var keyword = document.getElementById('keywordSearch').value;
        var score = document.getElementById('score').innerHTML;

        var data = 'keyword=' + keyword + '&score=' + score + '&chkPlatformer=' + chkPlatformer + '&chkRPG=' + chkRPG + '&chkSimulation=' + chkSimulation + '&chkAction=' + chkAction + '&chkAdventure=' + chkAdventure + '&chkShooter=' + chkShooter + '&chkSports=' + chkSports + '&chkPuzzle=' + chkPuzzle + '&chkMusic=' + chkMusic + '&chkRacing=' + chkRacing + '&chkStrategy=' + chkStrategy;

      $.ajax({
         type : "GET",
         url : "refineSearch.php",
         data: data,
         success:function(data){
           // window.alert(data);
           document.getElementById("ajaxContent").innerHTML = data;
         }
       });
     });

     $('#searchButton').click(function(event){
       event.preventDefault();
       if (document.getElementById('chkPlatformer').checked) {
         var chkPlatformer = true;
       } else {
         var chkPlatformer = false;
       }
       if (document.getElementById('chkRPG').checked) {
         var chkRPG = true;
       } else {
         var chkRPG = false;
       }
       if (document.getElementById('chkSimulation').checked) {
         var chkSimulation = true;
       } else {
         var chkSimulation = false;
       }
       if (document.getElementById('chkAction').checked) {
         var chkAction = true;
       } else {
         var chkAction = false;
       }
       if (document.getElementById('chkAdventure').checked) {
         var chkAdventure = true;
       } else {
         var chkAdventure = false;
       }
       if (document.getElementById('chkShooter').checked) {
         var chkShooter = true;
       } else {
         var chkShooter = false;
       }
       if (document.getElementById('chkPuzzle').checked) {
         var chkPuzzle = true;
       } else {
         var chkPuzzle = false;
       }
       if (document.getElementById('chkMusic').checked) {
         var chkMusic = true;
       } else {
         var chkMusic = false;
       }
       if (document.getElementById('chkRacing').checked) {
         var chkRacing = true;
       } else {
         var chkRacing = false;
       }
       if (document.getElementById('chkStrategy').checked) {
         var chkStrategy = true;
       } else {
         var chkStrategy = false;
       }
       if (document.getElementById('chkSports').checked) {
         var chkSports = true;
       } else {
         var chkSports = false;
       }




       var keyword = document.getElementById('keywordSearch').value;
       var score = document.getElementById('score').innerHTML;

       var data = 'keyword=' + keyword + '&score=' + score + '&chkPlatformer=' + chkPlatformer + '&chkRPG=' + chkRPG + '&chkSimulation=' + chkSimulation + '&chkAction=' + chkAction + '&chkAdventure=' + chkAdventure + '&chkShooter=' + chkShooter + '&chkSports=' + chkSports + '&chkPuzzle=' + chkPuzzle + '&chkMusic=' + chkMusic + '&chkRacing=' + chkRacing + '&chkStrategy=' + chkStrategy;

     $.ajax({
        type : "GET",
        url : "refineSearch.php",
        data: data,
        success:function(data){
          document.getElementById("ajaxContent").innerHTML = data;
        }
      });
    });
    </script>

     <script data-require="jquery" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script.js"></script>




  </body>
</html>

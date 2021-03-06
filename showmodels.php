<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Show Models</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shareAll.css">
    <link rel="stylesheet" href="css/showmodels.css">
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

      <!-- Start Of Form -->
      <!-- Form that direct to itself -->
      <?php
        include 'topBar.php';
      ?>

      <div class="spaceForPanel">
      </div>

      <div class="featuredTitle">
          <h3>Highest Rating</h3>
          <hr>
      </div>

      <div class="section">
      <div class="gameSection">
        <?php
        include 'gamesQueryFunctions.php';
        loadStaffPick();
        ?>
      </div>
      <div class="moreButton">
        <a href="games.php">BROWSE MORE</a>
      </div>
    </div>

    <div class="featuredTitle">
        <h3>Staff Pick</h3>
        <hr>
    </div>

        <div class="section">
        <div class="gameSection">
          <?php
          loadTopScore();
          ?>
        </div>
        <div class="moreButton">
          <a href="games.php">BROWSE MORE</a>
        </div>
      </div>

      <div class="featuredTitle">
          <h3>NEWS</h3>
          <hr>
      </div>

      <div class="news">
        <div class="newsEntry">
          <div class="newsPic"><img src="img/wnb.jpg"/></div>
          <div class="newsContent">
            <div class="newsTitle"><h3>Mad Max, Lego Dimensions help Warner Bros. revenue and profit rise</h3>
            </div>
            <div class="newsParagraph">
              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
            </div>
            <div class="newsUser">
              <div class="userName"><p>John Oliver</p></div>
              <div class="timeStamp"><p>10 Hours Ago</p></div>
            </div>
          </div>
        </div>
      </div>

      <div class="news">
        <div class="newsEntry">
          <div class="newsPic"><img src="img/dks.jpeg"/></div>
          <div class="newsContent">
            <div class="newsTitle"><h3>Dark Souls 3 and Dark Souls Remaster help FromSoftware. Revenue and profit rise</h3>
            </div>
            <div class="newsParagraph">
              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
            </div>
            <div class="newsUser">
              <div class="userName"><p>John Oliver</p></div>
              <div class="timeStamp"><p>10 Hours Ago</p></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


</div>



      <button id="leftButton"></button>
      <button id="rightButton"></button>
     <div class="center" id="content">
       <div class="internal0">
       </div>
      <div class="internal1">
        <img src="img/acBlackTint.png"/>
        <div class="panelMsg">
          <h3 class="msgTitle">Assassin's Creed Odyssey's first big story expansion begins next week</h3>
          <p class="msgContent">Legacy of the First Blade, the first of two major expansions headed to Assassin's Creed Odyssey, will unfurl its first chunk next week.<p>
          <a href="#"><p class="msgReadMore">Read More</p></a>
        </div>
      </div>
       <div class="internal1">
         <img id="dksImage" src="img/dksScene.png"/>
         <div class="panelMsg">
           <h3 class="msgTitle">Dark Souls 3's Cut Epitaphs Would Have Been A Change For The Series</h3>
           <p class="msgContent">In a new video digging through the Alpha and Network Test versions of Dark Souls 3, YouTuber Lance McDonald explores the game’s “epitaphs” that were cut before the final version of the game released to the public.<p>
           <a href="#"><p class="msgReadMore">Read More</p></a>
         </div>
      </div>
       <div class="internal1">
      </div>
      <div class="internal1">
     </div>
     <div class="internal">
     </div>
     <div class="internal">
     </div>
     <div class="internal">
     </div>
     <div class="internal">
     </div>
     <div class="internal">
     </div>
     <div class="internal">
     </div>
     <div class="internal">
     </div>
     </div>

<script>
$(window).scroll(function(){
  $(".center").css("opacity", 1 - $(window).scrollTop() / 500);
  $("#leftButton").css("opacity", 1 - $(window).scrollTop() / 500);
  $("#rightButton").css("opacity", 1 - $(window).scrollTop() / 500);
});
</script>


     <script data-require="jquery" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script.js"></script>




  </body>
</html>

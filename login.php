<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="css/showmodels.css"> -->
    <link rel="stylesheet" href="css/shareAll.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/sideBar.css">

  </head>
  <body>
    <div class="everything">

      <?php
      //Include functions:
      include 'functions.php';

      //Initialize : starting session, connecting db etc...
      include 'initialize.php';


      include 'sideBar.php';
      echo '</div>';
      echo '</div>';



      //Include the actual login Code
      include 'loginCode.php';
      ?>
    </div>
    </div>
  </body>
</html>

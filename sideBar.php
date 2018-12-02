<div class="sideBar">
  <div class="content">
  <div class="logo">
    <h2>GAMESBOND</h2>
  </div>
  <div class="nav">
      <div class="navElement"><a href= "http://<?php echo $_SERVER["HTTP_HOST"]; ?>/kycheung/GAMESBOND/GAMESBOND/showmodels.php">HOME</a></div>

      <div class="navElement"><a href= "http://<?php echo $_SERVER["HTTP_HOST"]; ?>/kycheung/GAMESBOND/GAMESBOND/showmodels.php">NEWS</a></div>

      <div class="navElement"><a href= "http://<?php echo $_SERVER["HTTP_HOST"]; ?>/kycheung/GAMESBOND/GAMESBOND/games.php">GAMES</a></div>
      <?php
      if (!isset($_SESSION['loggedIn'])) {
        echo '<div class="navElement"><a href= "https://';
        echo $_SERVER["HTTP_HOST"];
        echo '/kycheung/GAMESBOND/GAMESBOND/login.php">PROFILE</a></div>';
      } else {
        echo '<div class="navElement"><a href= "http://';
        echo $_SERVER["HTTP_HOST"];
        echo '/kycheung/GAMESBOND/GAMESBOND/profile.php">PROFILE</a></div>';
      }
      ?>

  </div>

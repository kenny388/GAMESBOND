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


  <!-- Submit Button -->
  <!-- <input class="button" type="submit" name="submit" value="Refine Search"/> -->

  <!-- End Of Form -->
</form>

<?php
if (isset($_GET['chkPlatformer'])) {
  $chkPlatformer = $_GET['chkPlatformer'];
} else {
  $chkPlatformer = false;
}
if (isset($_GET['chkRPG'])) {
  $chkRPG = $_GET['chkRPG'];
} else {
  $chkRPG = false;
}
if (isset($_GET['chkSimulation'])) {
  $chkSimulation = $_GET['chkSimulation'];
} else {
  $chkSimulation = false;
}
if (isset($_GET['chkAction'])) {
  $chkAction = $_GET['chkAction'];
} else {
  $chkActioner = false;
}
if (isset($_GET['chkAdventure'])) {
  $chkAdventure = $_GET['chkAdventure'];
} else {
  $chkAdventure = false;
}
if (isset($_GET['chkShooter'])) {
  $chkShooter = $_GET['chkShooter'];
} else {
  $chkShooter = false;
}
if (isset($_GET['chkSports'])) {
  $chkSports = $_GET['chkSports'];
} else {
  $chkSports = false;
}
if (isset($_GET['chkPuzzle'])) {
  $chkPuzzle = $_GET['chkPuzzle'];
} else {
  $chkPuzzle = false;
}
if (isset($_GET['chkMusic'])) {
  $chkMusic = $_GET['chkMusic'];
} else {
  $chkMusic = false;
}
if (isset($_GET['chkRacing'])) {
  $chkRacing = $_GET['chkRacing'];
} else {
  $chkRacing = false;
}
if (isset($_GET['chkStrategy'])) {
  $chkStrategy = $_GET['chkStrategy'];
} else {
  $chkStrategy = false;
}

// echo $chkPlatformer;
echo $chkPlatformer;
echo $chkRPG;
echo $chkSimulation;
echo $chkAction;
echo $chkAdventure;
echo $chkShooter;
echo $chkSports;
echo $chkPuzzle;
echo $chkMusic;
echo $chkRacing;
echo $chkStrategy;

?>

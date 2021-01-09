<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');

  if(isset($_SESSION['userid'])){
    $user = get_user_by_id($_SESSION['userid']);
    $user_id = $user['id'];
    $logged_in = true;
    $log_in_out_text = "Logout";

  }else{
    $logged_in = false;
    $log_in_out_text = "Anmelden";

  //Umleitung zu Login, falls noch nicht eingeloggt
  //  header("Location: https://minimize.celiance.ch/login.php");
  }

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://kit.fontawesome.com/898fafec69.js" crossorigin="anonymous"></script>

    <title>Minimize</title>
  </head>
  <body>

    <!-- HEADER HEADER -->
    <header>
      <a href="/index.php">
        <button>
          <i class="fas fa-arrow-left" id="arrow"></i>
        </button>
      </a>
    </header>

    <div class="desktop-meldung">
      <a href="index.php">
        <img src="assets/logominimize.png" alt="Logo" width= 200px" id="logo">
      </a>
      <h2>Bitte öffne Minimize mit deinem Handy.</h2>
    </div>

  </body>

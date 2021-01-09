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
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="main.js"></script>
    <script src="https://kit.fontawesome.com/898fafec69.js" crossorigin="anonymous"></script>
    <title>Minimize</title>
  </head>
  <body>

    <!-- HEADER HEADER -->
    <section>
    <header>
      <!--Pfeil anetue-->
      <?php if ($unterscheidung) { ?>
      <button type="button" name="button" onclick="window.history.back()" id="pfeil">
        <i class="fas fa-arrow-left fa-1.5x"></i>
    <?php } else { ?>
      <a href="home-uebersicht.php">
        <img src="../assets/logo.png" alt="Logo" width="120px" id="logo">
      </a>
    <?php } ?>
    </header>

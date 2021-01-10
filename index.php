<?php
  include 'header.php';

  if(isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
    session_destroy();
    }

  $logged_in = false;


?>



<body class="headercolor">
   <main class="mobile-hidden">
    <h2> Rundgang starten </h2>
    </main>

    <section class="onepage desktop-hidden">
        <main>
            <h2> Rundgang starten </h2>
             <p>Nutzte minimize und behalte den Überblick über dein Zuhause.</p>

             <button type="button" name="button" onclick="window.location.href='/rundgang_1.php'">
                 <i class="fas fa-arrow-right fa-3x"></i>
              </button>

            <button class="loginbutton" type="button" name="button" onclick="window.location.href='/login.php'">
            <h3> Login </h3>
            </button>
        </main>


<?php include 'footer.php';?>

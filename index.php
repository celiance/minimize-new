<?php
  include 'header.php';

  if(isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
    session_destroy();
    }

  $logged_in = false;


?>
<body>
    <section class="onepage">
        <main>
             <h2>Nutzte minimize und behalte den Überblick über dein Zuhause.</h2>
              <p> Der durchschnittliche Haushalt besteht aus rund 10’000 Gegenständen, benutzt werden im Schnitt
                  allerdings nur 500. Das heisst 9’500 Gegenstände brauchen Platz, Geld und Zeit. Minimize hilft dir unnötigen Kram loszuwerden und mehr Freiheit zu erhalten. Unser Credo: LESS THINGS, MORE WINGS</p>
            <button type="button" name="button" onclick="window.location.href='/rundgang_1.php'">
              <i class="fas fa-arrow-circle-right fa-3x"><p>Rundgang starten</p></i>
            </button>
            <button type="button" name="button" onclick="window.location.href='/login.php'">
              <p>Login</p>
            </button>
        </main>

<?php include 'footer.php';?>

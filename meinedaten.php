<?php

  include 'header.php';
  include 'login-wall.php';
  $unterscheidung = true;

?>
  <body>
    <section class="profile">
        <main>
          <h2>Hallo Name</h2>

            <div class="navprofile">

                    <a href="/profil.php" class="navprofilelink">
                      <span class="iconsprofil"> <i class="fas fa-user-circle fa-2x"></i></span><p>Meine Daten</p>
                    </a>


                    <a href="/MeinInventar.php" class="navprofilelink">
                      <span class="iconsprofil"> <i class="fas fa-archive fa-2x"></i></span><p>Mein Inventar</p>
                    </a>


                    <a href="/MeinInventar.php" class="navprofilelink">
                      <span class="iconsprofil"> <i class="fas fa-bell fa-2x"></i></span><p>Pushnachrichten</p>
                    </a>


                  <a href="/MeinInventar.php" class="navprofilelink">
                    <span class="iconsprofil"><i class="fas fa-sign-out-alt fa-2x"></i></span><p>Abmelden</p>
                  </a>

        </div>




        </main>
  <?php include "footer.php";?>

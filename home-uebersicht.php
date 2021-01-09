<?php

  include 'header.php';
  include 'login-wall.php';

?>
  <body class="home">
    <section class="home">
        <main>
            <h2>Hallo <?php echo $user['name']; ?>!</h2>
            <h3> Was möchtest du tun?</h3>
              <div class="box">
                <p>Mein Inventar ansehen</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>

              <div class="box">
                <p>Brauchst du das noch?</p>

                <a href="/alert.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>


        </main>
      <?php include "footer.php";?>

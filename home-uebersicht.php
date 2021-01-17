<?php

  include 'header.php';
  include 'login-wall.php';

?>
  <body class="home">
    <section class="home">
        <main>
            <h2>Hallo <br><?php echo $user['name']; ?>!</h2>
              <div class="box">
                <p>Mein Inventar ansehen</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-right "></i>
                  </button>
                </a>
              </div>

              <div class="box">
                <p>Brauchst du das noch?</p>

                <a href="/alert.php">
                  <button>
                    <i class="fas fa-arrow-right "></i>
                  </button>
                </a>
              </div>

        </main>
      <?php include "footer.php";?>

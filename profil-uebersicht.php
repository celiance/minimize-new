<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');

?>


  <!-- MAIN MAIN -->
  <!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>minimize</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="main.css">
      <script src="main.js"></script>
  </head>
  <body>
    <section class="menu">
        <header>
            <?php include 'header.php';?>
        </header>

        <main>

            <h2>Hallo <?php echo $user['name']; ?></h2>

              <div class="menu">
                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
                <p>Hilfe</p>
              </div>

              <div class="menu">
                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
                <p>Impressum</p>
              </div>


        </main>

        <footer>
            <?php include "footer.php";?>
        </footer>
    </section>
</body>
</html>

<?php
  session_start();


  require_once('system/config.php');
  require_once('system/data.php');


  if(isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
    session_destroy();
    }

  $logged_in = false;
  $log_in_out_text = "Login";


  if(isset($_POST['login_submit'])){
    $login_valid = true;

    $msg = "";

    if(!empty($_POST['email'])){
      $email = $_POST['email'];
    }else{
      $msg .= "Du hast vergessen deine E-Mail einzugeben.<br>";
      $login_valid = false;
    }

    if(!empty($_POST['password'])){
      $password = $_POST['password'];
    }else{
      $msg .= "Du hast vergessen dein Passwort einzugeben.<br>";
      $login_valid = false;
    }

    if($login_valid){
      $result = login($email , $password);
      var_dump($result);

      if($result){
        $_SESSION['userid'] = $result['id'];
        header("Location: https://minimize.celiance.ch/home-uebersicht.php");

      }else{
        $msg = "Die Benutzerdaten sind nicht in unserer Datenbank vorhanden.";
      }
    }
  }
?>
          <!-- LOGIN -->


          <?php
            $unterscheidung = true;
          ?>
          <?php include 'header.php';?>
            <body class="headercolor">
              <section class="login">
          <main>
              <h2>Login</h2>
              <!-- Nachricht -->
                <?php if(!empty($msg)){ ?>
                <div class="nachricht" role="alert">
                  <p><?php echo $msg ?></p>
                </div>
                <?php } ?>

              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

                <div>

                  <input type="text" name="email" placeholder="Mailadresse" value="" id="email"></br>
                </div>

                <div>

                  <input type="password" name="password" placeholder="Passwort" value="" id="password"></br>
                </div>
                <button type="submit" name="login_submit" value="einloggen">Anmelden</button>
              </form>


              <a href="register.php">
                <p>Du bist noch nicht registriert? Hier entlang!</p>
              </a>
            </section>
          </main>
        </div>
    </div>


  <?php include "footer.php";?>

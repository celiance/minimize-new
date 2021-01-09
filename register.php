
<?php
  session_start();


  require_once('system/config.php');
  require_once('system/data.php');


  $logged_in = false;
  $log_in_out_text = "Anmelden";

  if(isset($_POST['register_submit'])){
    $msg = "";
    $register_valid = true;

    if(!empty($_POST['name'])){
      $name = $_POST['name'];
    }else{
      $msg .= "Bitte gib einen Namen ein.<br>";
      $register_valid = false;
    }

    if(!empty($_POST['email'])){
      $email = $_POST['email'];
    }else{
      $msg .= "Bitte gib eine E-Mailadresse  ein.<br>";
      $register_valid = false;
    }

    if(!empty($_POST['password'])){
      $password = $_POST['password'];
    }else{
      $msg .= "Bitte gib ein Passwort ein.<br>";
      $register_valid = false;
    }

    // Daten in die Datenbank schreiben ********

    if($register_valid){

      if(email_check($email)){
        $msg = "Diese E-Mail-Adresse ist bereits vergeben.</br>";
      }else{
        $result = register($name, $email, $password);

        if($result){
          unset($_POST);
          $msg = "Du hast dich erfolgreich registriert.</br>";
          header('Location: https://minimize.celiance.ch/login.php');


        }else{
          $msg .= "Etwas hat nicht geklappt. Versuche es nochmal.</br>";
        }
      }
    }else{
      $alert_type = "alert-warning";
    }

  }

?>


  <!-- MAIN MAIN -->
<?php
  $unterscheidung = true;
?>
<?php include 'header.php';?>
  <body>
    <section class="register">
        <main>
             <h2>Ready to minimize?</h2>
             <p>Erstelle ein Konto und erfasse gleich dein erstes Produkt</p>

             <div class="register">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="text" placeholder="Dein Name" name="name" value="" class="name"></br>


                <input type="email" placeholder="Mailadresse" name="email" value="<?php if(isset($email)) echo $email; ?>" class="email"></br>


                <input type="password" placeholder="Passwort" name="password" value="" class="password"></br>

                <button type="submit" name="register_submit" value="registrieren">Registrieren</button>
              </form>
              <a href="login.php">
                <h6>Du bist noch nicht registriert? Hier entlang!</h6>
              </a>
            </div>
          <?php if(!empty($msg)){ ?>
          <div class="nachricht" role="alert">
            <p><?php echo $msg ?></p>
          </div>
          <?php } ?>
        </main>

      <?php include "footer.php";?>


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


    /*NAME Aktualiseren*/
    /*NAME Aktualiseren*/
    if(isset($_POST['updatename_submit'])){
      $msg = "";
      $name_valid = true;

      if(!empty($_POST['name'])){
        $name = $_POST['name'];
      }else{
        $msg .= "Bitte gib einen Namen ein.<br>";
        $name_valid = false;
      }

      // Daten in die Datenbank schreiben ****

      if($name_valid){
        $result = update_name($user_id, $name);

        if($result){
          unset($_POST);
          $msg = "Du hast dein Konto erfolgreich aktualisiert.</br>";
          header('Location: https://minimize.celiance.ch/profil.php');

        }else{
          $msg .= "Etwas hat nicht geklappt. Versuche es nochmal.</br>";
        }
      }else{
        $alert_type = "alert-warning";
       }
    }


  /*Passwort Aktualiseren*/
  /*Passwort Aktualiseren*/
  if(isset($_POST['updatepass_submit'])){
    $msg = "";
    $password_valid = true;

    if(!empty($_POST['password'])){
      $password = $_POST['password'];
    }else{
      $msg .= "Bitte gib ein Passwort ein.<br>";
      $password_valid = false;
    }

    // Daten in die Datenbank schreiben ****

    if($password_valid){
        $result = update_password($user_id, $password);

        if($result){
          unset($_POST);
          $msg = "Du hast dein Passwort erfolgreich aktualisiert.</br>";
          header('Location: https://minimize.celiance.ch/profil.php');

        }else{
          $msg .= "Etwas hat nicht geklappt. Versuche es nochmal.</br>";
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
             <h2>Profil Aktualisieren</h2>
             <p>Aktualisiere sein Konto</p>
             <?php echo $user_id ?>
             <div class="register">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="text" placeholder="Dein Name" name="name" value="<?php echo $user['name']; ?>" class="name"></br>
                <button type="submit" name="updatename_submit" value="registrieren">Name aktualisieren</button>
              </form>
            </br>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="password" placeholder="Passwort" name="password" value="" class="password"></br>
                <button type="submit" name="updatepass_submit" value="registrieren">Passwort aktualisieren</button>
              </form>
              <a href="profil.php">
                <h6>Zurück</h6>
              </a>
            </div>
          <?php if(!empty($msg)){ ?>
          <div class="nachricht" role="alert">
            <p><?php echo $msg ?></p>
          </div>
          <?php } ?>
        </main>

      <?php include "footer.php";?>

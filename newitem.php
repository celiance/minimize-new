<!-- MAIN MAIN -->
<?php
  $unterscheidung = true;
  include 'header.php';
  include 'login-wall.php';
?>
<body>
  <section class="newitem">
      <main>

           <div class="newarticle">
             <p>Wie heisst der Artikel?</p>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
              <input type="text" name="name" value="" class="name"></br>
              <p>Beschreibung des Aretikels</p>
              <input type="descriptionarticle" name="descriptionarticle" value=""></br>
              <p>Wann hast du diesen Artikel gekauft?</p>
              <input type="buy" name="password" value="" class="password"></br>


              <button class="buttonnewitem"type="submit" name="register_submit" value="registrieren">Artikel speichern</button>
              <button class="buttondeleteitem"type="submit" name="register_submit" value="registrieren">Löschen</button>


            </form>
          </div>
        <?php if(!empty($msg)){ ?>
        <div class="nachricht" role="alert">
          <p><?php echo $msg ?></p>
        </div>
        <?php } ?>
      </main>

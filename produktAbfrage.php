<?php

  include 'header.php';
  include 'login-wall.php';

  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $product_id = $product['id'];
  }else{
    echo "die Produkt-ID fehlt";
  }

    /* Häufigkeit */
    /* Häufigkeit */
    $haufigkeit = 1;

    if(isset($_POST['price_submit'])){
      $msg = "";
      $abfrage_valid = true;

      if(isset($_POST['haufigkeit'])){
        if ($_POST['haufigkeit']=="2.5"){
            $haufigkeit = 2.5;
        }
        if ($_POST['haufigkeit']=="2"){
            $haufigkeit = 2;
        }
        if ($_POST['haufigkeit']=="1.5"){
            $haufigkeit = 1.5;
        }
        if ($_POST['haufigkeit']=="1"){
            $haufigkeit = 1;
        }
      }else{
        $msg .= "Bitte wähle etwas aus.<br>";
        $abfrage_valid = false;
      }
      /*Datenbankeintrag */
      if($abfrage_valid){
        $result = update_haufigkeit($haufigkeit, $product_id);
        if($result){
          $product_id = $product['id'];
          unset($_POST);
          header("Location: /produktVerkaufen.php?product_id=" . $product_id);
        }else{
          $msg .= "Etwas hat nicht geklappt. Versuche es nochmal.</br>";
        }
        }else{
        $alert_type = "alert-warning";
        }
      }

      /*if($abfrage_valid){
        header("Location: https://minimize.celiance.ch");
        header("Location: /produktVerkaufen.php?product_id=" . $product_id);
      }*/


    /*Produkt löschen*/
    /*Produkt löschen*/
    if(isset($_POST['delete_product'])){
            $del_prod = delete_product($product_id);
            if($del_prod){
              $product_deleted = true;
              $msg .= "Sie haben ihr Produkt erfolgreich gelöscht.</br>";
              header("Location: MeinInventar.php");
            }else{
              $msg .= "ERROR";
            }
        }

?>
  <!-- MAIN MAIN -->
  <main>
    <h2>Produkt verkaufen</h2>

    <!--Formular-->
    <p>Wie oft hast du den Artikel benutzt?</p>
    <form class="" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <fieldset>
        <input type="radio" id="nie" name="haufigkeit" value="2.5">
        <label for="nie">einmal pro Tag</label><br>
        <input type="radio" id="bizli" name="haufigkeit" value="2">
        <label for="bizli">einmal pro Woche</label><br>
        <input type="radio" id="oft" name="haufigkeit" value="1.5">
        <label for="oft">einmal pro Monat</label><br>
        <input type="radio" id="oft" name="haufigkeit" value="1">
        <label for="oft">fast nie</label><br>
      </fieldset>
      <button class="löschenalert" type="submit" name="price_submit">Preis berechnen</button>
    </form>
    <button class="löschenalert" type="button" name="button" onclick="window.location.href='/produktseite.php?product_id=<?php echo $product['id'] ?>'">Abbrechen</button>
    <!--Produkt löschen btn-->
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <button class="löschen" type="submit" name="delete_product">Produkt löschen</button>
    </form>

  </main>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
<?php include 'footer.php';?>

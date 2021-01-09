<?php

  include 'header.php';
  include 'login-wall.php';

  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $product_id = $product['id'];
  }else{
    echo "hier fehlt etwas";
  }

  /* Häufigkeit */
  /* Häufigkeit */
    if(isset($_POST['geb_25'])){
      $haufigkeit = 2.5;
    }
    if(isset($_POST['geb_2'])){
      $haufigkeit = 2;
    }
    if(isset($_POST['geb_15'])){
      $haufigkeit = 1.5;
    }
    if(isset($_POST['geb_1'])){
      $haufigkeit = 1;
    }


  /*TIME Differenz*/
  /*TIME Differenz*/
  $purchase_date = $product['purchase_date'];
  $now = date("Y-m-d");
  $timeDiff = date_diff($purchase_date, $now);


  /*Preisberechnung*/
  /*Preisberechnung*/
  $price = $product['price'];

  $priceUpdate = ($price($timeDiffY * 5 + 10 * $haufigkeit))/100;


?>
  <!-- MAIN MAIN -->
  <main>
    <h2>Produkt verkaufen</h2>

    <!--Produktanzeige-->
    <h2>Produkt Nr. 1</h2>
    <img src="assets/testbild.jpg" alt="bild des Produktes">
    <p>Produkt in deinem Besitz seit: <?php echo $timeDiff; ?></p>

    <p>Neupreis: <?php echo $product['price']; ?></p>
    <p>Aktueller Preis: <?php echo $priceUpdate; ?></p>
    <p>Wie oft hast du den Artikel benutzt?</p>
    <form class="" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <fieldset>
        <input type="radio" id="nie" name="geb_25" value="nie">
        <label for="nie">einmal pro Tag</label><br>
        <input type="radio" id="bizli" name="geb_2" value="bizli">
        <label for="bizli">einmal pro Woche</label><br>
        <input type="radio" id="oft" name="geb_15" value="oft">
        <label for="oft">einmal pro Monat</label><br>
        <input type="radio" id="oft" name="geb_1" value="oft">
        <label for="oft">fast nie</label><br>
      </fieldset>
    </form>

    <button type="button" name="button">Produkt verkaufen</button>
    <button type="button" name="button" onclick="window.location.href='/produktseite.php'">Abbrechen</button>
    <h5 class="delete">Produkt löschen</h5>

  </main>
<?php include 'footer.php';?>

<?php

  include 'header.php';
  include 'login-wall.php';

  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $product_id = $product['id'];
    $haufigkeit = $product['haufigkeit'];
  }else{
    echo "hier fehlt etwas";
  }

    /*TIME Differenz*/
    /*TIME Differenz*/
    $purchase_date = $product['purchase_date'];
    $now = date("Y-m-d");

    $origin = date_create($purchase_date);
    $target = date_create($now);
    $interval = date_diff($origin, $target);
    $timeDiff = $interval->format('%y');

    /*Preisberechnung*/
    /*Preisberechnung*/
    $price = $product['price'];

    $priceUpdate_bef = $timeDiff * 5 + 10 * $haufigkeit;
    $priceUpdate = $price-$price*$priceUpdate_bef/100;

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


    <!--Produktanzeige-->
  </br>
  </br>
  </br>
    <h2 id="produkttitel"><?php echo $product['product_name']; ?></h2>
    <!-- Copy Text BTN -->
    <button onclick="copyTitel()">Titel kopieren</button>
    <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="Foto deines Produktes" width="100">
    <p>Du hast das Produkt gekauft im:</p>
    <p><?php
      $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
      echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
    ?></p>
    <!-- Copy Text BTN -->
      <button onclick="copyTitel()">Einkaufsdatum kopieren</button>
    <!-- Copy Text BTN -->
    <p>Das war vor: <?php echo $timeDiff; ?> Jahr/en</p>
    <p>Neupreis: <?php echo $product['price']; ?> CHF</p>
    <!-- Copy Text BTN -->
      <button onclick="copyTitel()">Neupreis kopieren</button>
    <!-- Copy Text BTN -->
    <h4>neuer Verkaufspreis: <?php echo $priceUpdate; ?> CHF</h4>
    <!-- Copy Text BTN -->
      <button onclick="copyTitel()">neuer Verkaufspreis kopieren</button>
    <!-- Copy Text BTN -->
    <p><?php echo $product['description']; ?></p>
    <!-- Copy Text BTN -->
      <button onclick="copyTitel()">Beschreibung kopieren</button>
    <!-- Copy Text BTN -->


    <!--Produkt löschen btn-->
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <button class="löschen" type="submit" name="delete_product">Produkt löschen</button>
    </form>
    <button class="löschen" type="submit" name="" onclick="window.location.href='/MeinInventar.php">zurück zur Übersicht</button>

  </main>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>

  <script type="text/javascript">
      function copyTitel() {
        let inputEl = document.getElementById("produkttitel");
        inputEl.select();                                    // Select element
        inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

        const successful = document.execCommand('copy');   // copy input value, and store success if needed

        if(successful) {
            alert("Copied the text: " + inputEl.value);
        } else {
            // ...
        }
      }
  </script>

<?php include 'footer.php';?>

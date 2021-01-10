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
    $timeDiffShow = $interval->format('%y Jahr/en %m Monate und %d Tagen');

    /*Preisberechnung*/
    /*Preisberechnung*/
    $price = $product['price'];

    $priceUpdate_bef = $timeDiff * 5 + 10 * $haufigkeit;
    $priceUpdate_raw = $price-$price*$priceUpdate_bef/100;
    $priceUpdate = round($priceUpdate_raw/ 0.05) * 0.05;

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
    <!-- Bild -->
    <!-- Bild -->
    <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="Bild deines Produktes" width="100"></br>
    <a id="download" href="uploads/files/<?php echo $product['img'] ?>" download="uploads/files/<?php echo $product['img'] ?>">Bild herunterladen</a>
    <!-- TITEL -->
    <!-- TITEL -->
    <input type="text" value="<?php echo $product['product_name']; ?>" id="produkttitel">
    <button onclick="copyTitel()">Titel kopieren</button>
    <!-- Neupreis -->
    <!-- Neupreis -->
    <input type="text" value="Neupreis: <?php echo $product['price']; ?> CHF" id="neupreis">
    <button onclick="copyPrice()">Neupreis kopieren</button>
    <!-- Verkaufspreis -->
    <!-- Verkaufspreis -->
    <input type="text" value="Neuer Verkaufspreis: <?php echo $priceUpdate; ?> CHF" id="verkaufspreis">
    <button onclick="copyPriceNew()">neuer Verkaufspreis kopieren</button>
    <!-- Beschreibung -->
    <!-- Beschreibung -->
    <input type="text" value="<?php echo $product['description']; ?>" id="descr">
    <button onclick="copyDescr()">Beschreibung kopieren</button>
    <!-- Einkaufsdatum -->
    <!-- Einkaufsdatum -->
    <input type="text" value="Einkaufsdatum: <?php
      $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
      echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
    ?>" id="einkaufsdatum">
    <button onclick="copyDate()">Einkaufsdatum kopieren</button>
    <p><i>Du hast das Produkt vor <?php echo $timeDiffShow; ?> gekauft</i></p>


    <!--Produkt löschen btn-->
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <button class="löschen" type="submit" name="delete_product">Produkt löschen</button>
    </form>
    <a href="/alert.php">
      <button class="löschen" type="submit" name="">zurück zur Übersicht</button>
    </a>
  </main>

  <script type="text/javascript">
      function copyTitel() {
        let inputEl = document.getElementById("produkttitel");
        inputEl.select();                                    // Select element
        inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

        const successful = document.execCommand('copy');   // copy input value, and store success if needed

        if(successful) {
            alert("Folgender Produkttext wurde kopiert: " + inputEl.value);
        } else {
          alert("Etwas ist schief gelaufen. Wir konnten den Inhalt nicht kopieren.");
        }
      }
      function copyPrice() {
        let inputEl = document.getElementById("neupreis");
        inputEl.select();                                    // Select element
        inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

        const successful = document.execCommand('copy');   // copy input value, and store success if needed

        if(successful) {
            alert("Folgender Produkttext wurde kopiert: " + inputEl.value);
        } else {
          alert("Etwas ist scheif gelaufen. Wir konnten den Inhalt nicht kopieren.");
        }
      }
      function copyPriceNew() {
        let inputEl = document.getElementById("verkaufspreis");
        inputEl.select();                                    // Select element
        inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

        const successful = document.execCommand('copy');   // copy input value, and store success if needed

        if(successful) {
            alert("Folgender Produkttext wurde kopiert: " + inputEl.value);
        } else {
          alert("Etwas ist scheif gelaufen. Wir konnten den Inhalt nicht kopieren.");
        }
      }
      function copyDescr() {
        let inputEl = document.getElementById("descr");
        inputEl.select();                                    // Select element
        inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

        const successful = document.execCommand('copy');   // copy input value, and store success if needed

        if(successful) {
            alert("Folgender Produkttext wurde kopiert: " + inputEl.value);
        } else {
          alert("Etwas ist scheif gelaufen. Wir konnten den Inhalt nicht kopieren.");
        }
      }
      function copyDate() {
        let inputEl = document.getElementById("einkaufsdatum");
        inputEl.select();                                    // Select element
        inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

        const successful = document.execCommand('copy');   // copy input value, and store success if needed

        if(successful) {
            alert("Folgender Produkttext wurde kopiert: " + inputEl.value);
        } else {
          alert("Etwas ist scheif gelaufen. Wir konnten den Inhalt nicht kopieren.");
        }
      }
  </script>

<?php include 'footer.php';?>

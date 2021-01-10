<?php
  $unterscheidung = true;
?>

<?php

  include ('header.php');
  include 'login-wall.php';
  $all_products = get_product($user_id);

?>

  <body class="inventar">
    <section class="inventar">
        <main>
          <h2>Mein Inventar</h2>
          <?php if(empty($all_products)){ ?>
            <div class="container">
              <p>Du hast noch keine Produkte in deinem Inventar.</p>
              <button type="button" name="button"  onclick="window.location.href='/artikelErfassen.php'">erstes Produkt erfassen</button>
            </div>
          <?php }  ?>
            <!--Alle Produkte-->
            <div class="container">
              <!--Einzelnes Produkt-->
              <?php foreach ($all_products as $product) { ?>
                <a href="<?php echo $base_url ?>/produktseite.php?product_id=<?php echo $product['id'] ?>">
                  <div class="produktbox">
                    <!--Produktbild-->
                  <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="testbild" style="height:150px">
                    <!--Angaben Produkt-->
                  <div class="alerttext">
                        <h3><?php echo $product['product_name']; ?></h3>
                        <h6>Gekauft am:</br></h6>
                        <p><?php
                            $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
                            echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
                          ?></p>

                    </div>

                  </div>
                </a>
              <?php }?>
          </div>
  </div>
</section>
</main>
<?php include "footer.php";?>

<?php

  include ('header.php');
  include 'login-wall.php';

  $unterscheidung = true;
  $all_products = get_product_push($user_id);

?>
<body>
  <section class="alert">
      <main>
        <?php if(!empty($all_products)){ ?>
          <p>Brauchst du diese Produkte noch?</p>
        <?php }else{?>
          <h2>Du hast aktuell keine Produkte in dieser Liste.</h2>
          <button type="button" name="button"  onclick="window.location.href='/MeinInventar.php'">Zum gesamten Inventar</button>
        <?php  }  ?>

        <!--Alle Push-Produkte-->
        <section class="inventar">
        <?php foreach ($all_products as $product) { ?>

          <!--Einzelnes Produkt-->

              <div class="produktbox">
                <a href="<?php echo $base_url ?>/produktseite.php?product_id=<?php echo $product['id'] ?>">
              <!--Produktbild-->
              <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="testbild" style="height:150px">
            </a>
            <!--Angaben Produkt-->

            <div class="alerttext">
                  <h3><?php echo $product['product_name']; ?></h3>
                  <h6>Gekauft am:</br></h6>
                  <p><?php
                      $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
                      echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
                    ?></p>

              </div>

            <div class="alertbutton">
              <i class="far fa-bell"></i>
            </div>
            <!--
            <a href="">
              <button class="produktonlyedit">
                <i class="fas fa-pen"></i>
              </button>
            </a>
            -->
            </a>
      </div>
      <?php }?>
</div>
</main>
<?php include "footer.php";?>

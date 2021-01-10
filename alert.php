<?php

  include ('header.php');
  include 'login-wall.php';

  $unterscheidung = true;
  $all_products = get_product_push($user_id);

?>
<body class="inventar">
  <section class="inventar navbackground">
      <main>
        <?php if(!empty($all_products)){ ?>
          <p>Brauchst du diese Produkte noch?</p>
        <?php }else{?>
          <h2>Du hast aktuell keine Produkte in dieser Liste.</h2>
          <button type="button" name="button"  onclick="window.location.href='/MeinInventar.php'">Zum gesamten Inventar</button>
        <?php  }  ?>

        <!--Alle Push-Produkte-->
<?php foreach ($all_products as $product) { ?>
        <div class="produktbox">
          <!--Einzelnes Produkt-->
            <a href="<?php echo $base_url ?>/produktseite.php?product_id=<?php echo $product['id'] ?>">
              <!--Produktbild-->
              <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="testbild" style="width:100%">
            </a>
            <!--Angaben Produkt-->
            <a href="<?php echo $base_url ?>/produktseite.php?product_id=<?php echo $product['id'] ?>">
            <div class="alerttext">
              <p><?php echo $product['product_name']; ?></p>
              <h6>
                Gekauft im:</br>
                <?php
                  $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
                  echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
                ?>
              </h6>
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

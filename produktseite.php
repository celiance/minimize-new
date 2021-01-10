<?php
  $unterscheidung = true;
?>


<?php

  include ('header.php');
  include ('login-wall.php');


  $push_products = get_product_push($user_id);


  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $product_id = $product['id'];
  }else{
    echo "hier fehlt etwas";
  }

  if(isset($_POST['behalten_submit'])){
    update_status($_POST['product_id']);
    header('Location: /produktseite.php?product_id=' . $_POST['product_id']);
  }

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
  <body class="produktseite">
      <!--Produktanzeige-->
      <div class="produktonly">
        <main>
          <div class="inhaltproduktonly">
              <h3><?php echo $product['product_name']; ?></h3>
              <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="testbild" width="100">
              <p><?php echo $product['description']; ?></p>
              <p>Preis: <?php echo $product['price']; ?> CHF</p>
              <p>Gekauft am:</p>
              <p>
                <?php
                  $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
                  echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
                ?>
              </p>
              <a href="">
                <button class="produktonlyedit">
                  <i class="fas fa-pen"></i>
                </button>
              </a>
          </div>
          <!--QUITTUNG QUITTUNG QUITTUNG
          <div class="quittungbox">
            <a href="<?php $product['quittung']; ?>">
            <p>Quittung ansehen</p>
              <button>
                <i class="fas fa-arrow-circle-right fa-2x"></i>
              </button>
            </a>
          </div>-->

          <!--glöckli wird nur angezeigt, wenn der push aktiv ist-->
          <?php
          foreach ($push_products as $push_prod) {
            $push_prod_id = $push_prod['id'];
                  if($push_prod_id == $product_id){?>
                    <div class="alertbutton">
                      <i class="far fa-bell"></i>
                    </div>
                </div>
          <?php }}?>


          <!--buttons werden nur angezeigt, wenn der push aktiv ist-->
        <?php
        foreach ($push_products as $push_prod) {
          $push_prod_id = $push_prod['id'];
                if($push_prod_id == $product_id){?>
                  <button class="löschenalert" type="submit" name="verkaufen_submit" value="" onclick="window.location.href='/produktAbfrage.php?product_id=<?php echo $product['id'] ?>'">Nö, besser verkaufen!</button>
                  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class"buttonalert">
                      <input type="hidden" name="product_id" value="<?php echo $product[id]; ?>">
                      <button class="artikelbehalten" type="submit" name="behalten_submit" value="">Artikel behalten!</button>
                    </div>
                  </form>
        <?php }}?>

        <a href="/alert.php">
          <button class="löschen" type="submit" name="">zurück zur Übersicht</button>
        </a>

        <!--Produkt löschen btn-->
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <button class="löschen" type="submit" name="delete_product">Produkt löschen</button>
        </form>

      </main>

  <?php include 'footer.php';?>

<?php
  $unterscheidung = true;
?>


<?php

  include ('header.php');
  include ('login-wall.php');


  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $product_id = $product['id'];
  }else{
    echo "hier fehlt etwas";
  }

?>
  <!-- MAIN MAIN -->
  <body class="produktseite">
      <!--Produktanzeige-->
      <section class="">
        <main>
            <button class="quittung" type="button" name="button"  onclick="window.location.href='/uploadQuittung.php?product_id=<?php echo $product['id']; ?>'" style="margin-left: 5%;">Quittung ändern</button>
            <img class="" src="uploads/files/<?php echo $product['quittung'] ?>" alt="testbild" width="90%" style="margin-left: 5%;">
      </main>
    </section>

  <?php include 'footer.php';?>

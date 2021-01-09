<?php

  include 'header.php';
  include 'login-wall.php';

?>
  <!-- MAIN MAIN -->
  <main>
    <h2>Produkt verkaufen</h2>

<iframe src="https://www.facebook.com/marketplace/create/item"></iframe>
    <!--Produktanzeige-->
    <h2>Produkt Nr. 1</h2>
    <img src="assets/testbild.jpg" alt="bild des Produktes">

    <form class="" action="index.html" method="post">
      <p>Wie oft hast du den Artikel benutzt?</p>
      <fieldset>
        <input type="radio" id="nie" name="Zahlmethode" value="nie">
        <label for="nie"> Nie</label><br>
        <input type="radio" id="bizli" name="Zahlmethode" value="bizli">
        <label for="bizli"> bizli</label><br>
        <input type="radio" id="oft" name="Zahlmethode" value="oft">
        <label for="oft"> sehr oft</label><br>
      </fieldset>
    </form>

    <form class="" action="index.html" method="post">
      <p>Weist das Produkt Gebrauchsspuren auf?</p>
      <fieldset>
        <input type="radio" id="ja" name="Zahlmethode" value="ja">
        <label for="ja"> Ja</label><br>
        <input type="radio" id="nein" name="Zahlmethode" value="nein">
        <label for="nein"> nein</label><br>
        <input type="radio" id="bizli2" name="Zahlmethode" value="bizli2">
        <label for="bizli2"> bizli</label><br>
      </fieldset>
    </form><br>

    <button type="button" name="button">Produkt verkaufen</button>
    <button type="button" name="button" onclick="window.location.href='/produktseite.php'">Abbrechen</button>
    <h5 class="delete">Produkt löschen</h5>

  </main>
<?php include 'footer.php';?>


<!-- FOOTER FOOTER -->
<footer>

  <!--footerfarbenunterscheidung-->
  <?php if ($unterscheidungfooter) { ?>
  <nav style= "background-color: whitesmoke;">

    <a href="/menu.php">
      <div class="iconfooter">
        <i class="fas fa-bars"></i>
    </div>

    <a href="/home-uebersicht.php">
      <div class="iconfooter">
        <i class="fas fa-home"></i>
    </div>

    <a href="/artikelErfassen.php">
      <div class="iconfooter">
        <i class="fas fa-plus-circle"></i>
    </div>

    <a href="/alert.php">
      <div class="iconfooter">
        <i class="far fa-bell"></i>
    </div>

        <a href="/profil.php">
          <div class="iconfooter">
            <i class="far fa-user"></i>
        </div>
  </nav>

<?php } else { ?>
  <nav style= "background-color: none;">

    <a href="/menu.php">
      <div class="iconfooter">
        <i class="fas fa-bars"></i>
    </div>

    <a href="/home-uebersicht.php">
      <div class="iconfooter">
        <i class="fas fa-home"></i>
    </div>

    <a href="/artikelErfassen.php">
      <div class="iconfooter">
        <i class="fas fa-plus-circle"></i>
    </div>

    <a href="/alert.php">
      <div class="iconfooter">
        <i class="far fa-bell"></i>
    </div>

        <a href="/profil.php">
          <div class="iconfooter">
            <i class="far fa-user"></i>
        </div>
  </nav>
<?php } ?>



  <script src="https://kit.fontawesome.com/898fafec69.js" crossorigin="anonymous"></script>


</footer>
</body>
</html>

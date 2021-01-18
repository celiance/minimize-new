<?php
  $unterscheidung = true;
?>




<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');
  include 'header.php';



  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $product_id = $product['id'];
  }else{
    echo "hier fehlt etwas";
  }

  if(isset($_POST['product_submit'])){
    $msg = "";
    $product_valid = true;

    if(isset($_FILES['bildfile'])){
      $name = $_FILES['bildfile'];

            //** DATEIUPLOAD DATEIUPLOAD **********************
            //name des uploadfelds im formular
            $inputname = 'bildfile';
            //pfad vom file aus ohne / am anfang
            $upload_folder = 'uploads/files/';
            //max dateigrösse in kb
            $filesize = 10000;
            //erlaubte dateiendungen als array
            $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
            //true wenn nur bilder, sonst false
            $images = true;
            //** WICHTIGE VARIABELN ***************************************

            $filename = pathinfo($_FILES[$inputname]['name'], PATHINFO_FILENAME);
            $extension = strtolower(pathinfo($_FILES[$inputname]['name'], PATHINFO_EXTENSION));
            if (!in_array($extension, $allowed_extensions)) {
            	die("Ungültige Dateiendung.");
            }
            if ($_FILES[$inputname]['size'] > ($filesize * 1024)) {
            	die("Datei zu gross.");
            }
            if ($images) {
            	if (function_exists('exif_imagetype')) {
            		$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            		$detected_type = exif_imagetype($_FILES[$inputname]['tmp_name']);
            			if (!in_array($detected_type, $allowed_types)) {
            				die("Nur der Upload von Bilddateien ist gestattet");
            		}
            	}
            }

    }else{
      $msg .= "Bitte wähle ein Foto aus.<br>";
      $product_valid = false;
    }

    // Daten in die Datenbank schreiben

    if($product_valid){

          $new_path = $upload_folder . $filename . '.' . $extension;
          $dateiname = $filename . '.' . $extension;
          if (file_exists($new_path)) {
            $id = 1;
            do {
              $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
              $dateiname = $filename . '_' . $id . '.' . $extension;
              $id++;
            } while (file_exists($new_path));
          }
          move_uploaded_file($_FILES[$inputname]['tmp_name'], $new_path);

        $result = update_quittung($dateiname, $_POST['product_id']);

        if($result){
          unset($_POST);
          $msg = "Du hast das Produkt erfolgreich erfasst.</br>";
          header('Location: https://minimize.celiance.ch/MeinInventar.php');

        }else{
          $msg .= "Etwas hat nicht geklappt. Versuche es nochmal.</br>";
        }
    }else{
      $alert_type = "alert-warning";
    }
  }

?>

  <!-- MAIN MAIN -->

<body class="artikelerfassen">
    <section class="artikelerfassen">
      <main>
        <h2>Quittung/ Garantieschein hochladen</h2>
        <p>Erstelle ein Foto von deiner Quittung oder deinem Garantieschein.</p>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">
        <?php if(!empty($msg)){ ?>

        <div class="nachricht" role="alert">
          <p><?php echo $msg ?></p>
        <?php } ?>
        <input type="file" name="bildfile" class="file" id="file"><br><br>
        <label class="upload" for="file">Datei hochladen</label>
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <button type="submit" name="product_submit" value="erfassen">Upload</button>
      </form>

    </div>
  </section>
  </main>

<?php include 'footer.php';?>

<?php

  include 'header.php';

  $all_users = get_all_users();


  foreach ($all_users as $user){
    $user_id = $user['id'];
    $user_name = $user['name'];
    $user_mail = $user['email'];
    $alert_list = get_product_push($user_id);

    if(!empty($alert_list)){

        //Mail versenden----------------
        $header = array(
            'From' => 'Minimize <celia.rogg@bluewin.ch>',
            'Reply-To' => 'celia.rogg@bluewin.ch',
            'X-Mailer' => 'PHP/' . phpversion(),
            'Content-Type' => 'text/html; charset=utf-8'
        );
        /*$empfaenger = $user_mail;*/
        $empfaenger = $user_mail;
        $betreff = "Minimize | Brauchst du diese Produkte noch?";
        $text = "Hallo " . $user_name . ",<br> du hast neue Produkte in deiner Push-Liste. <br> <strong><a href'https://minimize.celiance.ch/alert.php'>https://minimize.celiance.ch/alert.php</a></strong><br> Liebe Grüsse, <br> dein minimize-Team. ";

        mail($empfaenger, $betreff, $text, $header);
        //Mail versenden----------------
      }
    }

  ?>

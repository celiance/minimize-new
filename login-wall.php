<?php

if(!isset($_SESSION['userid'])){
  $logged_in = false;
  //Umleitung zu Login, falls noch nicht eingeloggt
  header("Location: https://minimize.celiance.ch/login.php");
}else{
  $logged_in = true;
}

?>

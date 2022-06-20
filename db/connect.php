<?php
//echo "message";

  //connexion à la base de données
  $con = mysqli_connect("localhost","root","","bookbooking");
  if(!$con){
     echo "Vous n'êtes pas connecté à la base de donnée";
  }

?>
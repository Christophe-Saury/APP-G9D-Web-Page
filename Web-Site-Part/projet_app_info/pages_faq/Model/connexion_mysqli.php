<?php
   // identifiants mysql
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "isep";



    try {
    $mysqli = new mysqli($host, $username, $password, $database);

} catch(Exception $e) {
    //Afficher toute erreur de connexion
    include 'page_erreur.php';
    die();
 }
  

?>
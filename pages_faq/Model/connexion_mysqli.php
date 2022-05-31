<?php
   // identifiants mysql
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "isep";
    $mysqli = new mysqli($host, $username, $password, $database);


    //Afficher toute erreur de connexion

    if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

?>
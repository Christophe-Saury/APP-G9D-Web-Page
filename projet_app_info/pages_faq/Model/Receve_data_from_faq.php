<?php

$row= null;
if(isset($_GET['ID'])){
    
    $ID = $_GET['ID'];

    ///////////////////// On a choisit de se connecter à la BD avec mysqli /////////////////////////////
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "isep";
    $mysqli = new mysqli($host, $username, $password, $database);

    //------------------------------------


    /////////////// Permet d'afficher toute erreur de connexion         ///////////////////////
    if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  

    $statement2 = $mysqli -> prepare("SELECT * FROM faq WHERE id_FAQ = ?;");
    $statement2 -> bind_param('s',$ID);
    $statement2 -> execute();

    $result = $statement2->get_result();
    $row = $result->fetch_assoc();

    //------------------------------------

}


?>
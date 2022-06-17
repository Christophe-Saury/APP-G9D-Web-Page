<?php
//Create connection credentials
$db_host = 'localhost';
$db_name = 'isep';
$db_user = 'root';
$db_pass = ''; // si problème essayer avec mdp vide

//Create mysqli object

try{
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
} catch(Exception $e) {
    include 'page_erreur.php';
     die();
  }




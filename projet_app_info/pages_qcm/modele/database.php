<?php
/*
//Create connection credentials
$db_host = 'localhost';
$db_name = 'isep';
$db_user = 'root';
$db_pass = '121212aa';

//Create mysqli object
try {
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
} catch(Exception $e) {
  //include 'page_erreur.php';
   //die();
   printf("Connect failed: %s\n", $mysqli->connect_error);
   exit();
}

/*
//Error Handler
if($mysqli->connect_error){
   // printf("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    //exit();
} */



//Create connection credentials
$db_host = 'localhost';
$db_name = 'isep';
$db_user = 'root';
$db_pass = '';

//Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


//Create mysqli object
try {
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
} catch(Exception $e) {
  include 'page_erreur.php';
   die();
  // printf("Connect failed: %s\n", $mysqli->connect_error);
   //exit();
}

/*
//Error Handler
if($mysqli->connect_error){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
*/
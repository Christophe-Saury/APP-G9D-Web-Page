<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'isep';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  include 'page_erreur.php';
  die();

}
    // $ys = $_POST;
    // $firstname = filter_var($ys["prenom"],FILTER_SANITIZE_STRING);
    // $lastname = filter_var($ys["nom"],FILTER_SANITIZE_STRING);
    // $phone = filter_var($ys["mobile"],FILTER_SANITIZE_NUMBER_INT);
    // $email = filter_var($ys["adresse_mail"],FILTER_SANITIZE_EMAIL);
    // $password = filter_var($ys["mdp"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $role = filter_var($ys["role"],FILTER_SANITIZE_STRING);
 // CONDITIONS
 
 ?>
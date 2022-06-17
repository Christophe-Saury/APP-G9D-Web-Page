<?php
    $host = 'localhost';
    $dbname = 'isep';
    $user = 'root';
    $password = '';

    try {
       $db = new PDO("mysql:host=$host;dbname=isep;charset=utf8","$user","$password");
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    





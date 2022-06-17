
<?php

//require_once('../inc/db.php');
$db_connexion = db_login();


function get_hash(mysqli $db_connexion, string $username)
{
    $query = $db_connexion->prepare("SELECT * FROM `utilisateur` WHERE `adresse_mail` = ? ");
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if ($row != NULL and count($row) >= 1) {
        return $row['mdp'];
    }
    else{
        return '';
    }
}

function get_role(mysqli $db_connexion,string $username)
{
    $query = $db_connexion->prepare("SELECT * FROM `utilisateur` WHERE `adresse_mail` = ? ");
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if ($row != NULL and count($row) >= 1) {
        return $row['role'];
    }
    else{
        return '';
    }
}

function db_login(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = 'isep';

    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}




?>
<?php

$db_connexion = db_login();

function verif_email($db_connexion, $email){
    $sql = "SELECT adresse_mail FROM utilisateur WHERE adresse_mail = ?";
    $query = $db_connexion->prepare($sql);
    $query->bind_param('s', $email);
    $query->execute();

    $query->get_result();


    return ($query->affected_rows > 0);

}

function insert_user($db_connexion, $email, $nom, $prenom, $mdp, $role, $chantier){

    $sql = "INSERT INTO `utilisateur`(`adresse_mail`, `mdp`, `nom`, `prenom`, `role`, `chantier`) VALUES (?,?, ?, ?, ?,?)";
    $query = $db_connexion->prepare($sql);
    $query->bind_param($email, $mdp, $nom, $prenom, $role,$chantier);
    $query->execute();
     
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
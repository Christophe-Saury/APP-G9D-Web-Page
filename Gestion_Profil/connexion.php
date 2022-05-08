<?php
    function dbconnexion($dbhost,$dbname,$dbusername,$dbpassword) {
        error_reporting(E_ERROR | E_PARSE);
    return new PDO("mysql:host=$dbhost;dbname=$dbname;", "$dbusername", "$dbpassword");
    }
    function get_session_editerprofil(){
    // On va récupérer le nom, le prénom et l'id à partir de la session précédente
    session_start();
    return array('id' => $_SESSION['id'],'prenom' => $_SESSION['prenom'],'nom' => $_SESSION['nom'],'role' => $_SESSION['role']) ;
    }

?>

    

 
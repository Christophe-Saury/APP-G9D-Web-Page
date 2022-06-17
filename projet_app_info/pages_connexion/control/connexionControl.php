<?php

    include_once('bcrypt.php');
    include_once('../model/requetes_connexion.php');
   // require('../model/requetes_connexion.php');
    session_start();

    
    if (isset($_POST['username']) && isset($_POST['password']) ) {

        $username = $_POST['username'];
        $password = $_POST['mdp'];
        $email = $_POST['email'];


        //$hash = password_hash($password, PASSWORD_DEFAULT);

        $db_hash = get_hash($db_connexion, $username);

        if ($db_hash == '' or !password_verify($password, $db_hash) ) {
            echo "Mot de Passe incorrect";
        }
        else {
        
            $_SESSION['connected'] = 1;
            $_SESSION['key'] = sha1($username);
            $_SESSION['role'] = get_role($username);
            var_dump(get_role($username));
            header('Location: ../../page_panel/control/panel.php');
        }
        var_dump($_SESSION['connected']); 
        var_dump($_SESSION['key']);
        var_dump($_SESSION['role']) ;
   }
    else {
        include('../vue/connexionVue.php');
    }

?>
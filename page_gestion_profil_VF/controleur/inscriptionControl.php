<?php
    unset($_GET['erreur']);
    if (isset($_POST['pseudo']) && isset($_POST['mdp']) &&isset($_POST['role']) ) {

        $username = explode(' ', $_POST['pseudo']);
        if (count($username) == 1) {
            echo "Vous devez écrire votre nom espacé du prénom";//<<<<======
            
            die();
        }

        $nom = $username[0];
        $prenom = $username[1];
        $password = $_POST['mdp'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $nom_chantier = $_POST['chantier'];
        $chantier = recupereIDChantier ($bdd, $nom_chantier);
        foreach ($chantier as $element){
            $chantier = $element['id_chantier'];
            echo $chantier; 
        }
        $values =  [
            'adresse_mail' => $email,
            'mdp' => $password,
            'nom' => $nom,
            'prenom'=> $prenom,
            'role' =>$role,
            'chantier' => $chantier
        ]; 
       

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            echo "Erreur : Le Mot de passe ne répond pas aux critères";//<<<<======
            
            die();     
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        if ( verif_email($db_connexion, $email) ) {
            echo "Erreur : Email déja enregistré";//<<<<======
            die();
        }
        $table3='utilisateur';
        insertion($bdd, $values, $table3);
        $vue = 'inscriptionVue'; 
    }
    else
    {
        $vue = 'inscriptionVue'; 
    }
?>
<?php
    require_once("../M/connexion.php");
    require_once("../M/modele.php");
    require_once("../M/constants.php");
    require_once("../M/requetes.php");
    require_once("../M/requetesSQL.php");
    require_once("../M/archivage.php");
    require_once("../M/archivageConstants.php");
    

    if (!isset($texteFonction)){
        $texteFonction = ecritureFonction($fonction); // Pour écrire le role de la personne connectée
    }

    if (!isset($_POST['page'])){
        $_POST['page'] = 1; // Numéro de page à afficher
    }

    if(isset($_GET['idcarte'])){
        $posteCarte = $_GET['idcarte']; // Valeurs du capteur fixe sélectionné sur les cartes
    }


    // Retrouver chaque ID de role utilisateur existant 
    $affichagePage = $fonction * 100 + $_POST['page'];

    switch($affichagePage){
        


        case 1: // Administrateur - Page Capteur Cardiaque
            if(isset($_GET['VS'])){
                lancementArchivage();
            }
            $allIdUtilisateurs = requeteSimple($reqIdUtilisateurs); // Récupérer tous les identifiants d'utilisateurs
            foreach ($allIdUtilisateurs as $aIU){
                requeteVariables($req1000bpm,array('jour','id_utilisateur'),array($day,$aIU[0])); // Pour chacun, on ajoute une ligne (100bpm) pour la date sélectionnée. Cf : résolution problème fonction COUNT()
            }
            $resultat = requeteVariables($reqPrincipaleGACardiaque, array ("freq","jour","horaire"), array($seuilFreq,$day,$heureActuelle));
            requeteSimple($reqSuppression1000bpm); // Supprimer la ligne 1000bpm
            //require_once("../V/gaCapteurCardiaque.php"); // Retour sur les valeurs du capteur cardiaque
            $head="head_gaCapteurCardiaque";
            $vue="gaCapteurCardiaque";
            include '../V/head/'.$head.'.php';
            include '../V/headers-footer/navbar.php';
            include '../V/' . $vue . '.php';
            include '../V/headers-footer/footer.php';
            break;





        case 2: // Administrateur - Page Capteurs Fixes
            if(isset($_GET['VS'])){
                lancementArchivage();
            }
            $resultatsCapteursFixes = requeteVariables($reqPrincipaleGAFixes, ['jour'], [$day]);
            break;
        




        case 3: // Administrateur - Page Carte Chantier
            if(isset($_GET['VS'])){
                lancementArchivage();
            }
            if(!isset($posteCarte)){
                $posteCarte = 1;
            }
            $valeursFixesCarte = requeteVariables($requeteValeursFixes, ['id_capteur','jour'], [$posteCarte, $day]);
            foreach ($valeursFixesCarte as $vFC){
                $temperatureC = $vFC[0];
                $humiditeC = $vFC[1];
                $bruitC = $vFC[2];
                $co2C = $vFC[3];
            }
            break;
        




        case 101: // Gestionnaire - Page Capteur Cardiaque
            $allIdUtilisateurs = requeteSimple($reqIdUtilisateurs); // Récupérer tous les identifiants d'utilisateurs
            foreach ($allIdUtilisateurs as $aIU){
                requeteVariables($req1000bpm,array('jour','id_utilisateur'),array($day,$aIU[0])); // Pour chacun, on ajoute une ligne (100bpm) pour la date sélectionnée. Cf : résolution problème fonction COUNT()
            }
            $resultat = requeteVariables($reqPrincipaleGACardiaque, array ("freq","jour","horaire"), array($seuilFreq,$day,$heureActuelle));
            requeteSimple($reqSuppression1000bpm); // Supprimer la ligne 1000bpm
            // require_once("../V/gaCapteurCardiaque.php"); // Retour sur les valeurs du capteur cardiaque
            // require_once("../V/gaCapteurCardiaque.php"); // Retour sur les valeurs du capteur cardiaque
            $head="head_gaCapteurCardiaque";
            $vue="gaCapteurCardiaque";
            include '../V/head/'.$head.'.php';
            include '../V/headers-footer/navbar.php';
            include '../V/' . $vue . '.php';
            include '../V/headers-footer/footer.php';
            break;





        case 102: // Gestionnaire - Page Capteurs Fixes
            $resultatsCapteursFixes = requeteVariables($reqPrincipaleGAFixes, ['jour'], [$day]);
            break;





        case 103: // Gestionnaire - Page Carte Chantier
            if(!isset($posteCarte)){
                $posteCarte = 0;
            }
            $posteCarte = 1;
            $valeursFixesCarte = requeteVariables($requeteValeursFixes, ['id_capteur','jour'], [$posteCarte, $day]);
            foreach ($valeursFixesCarte as $vFC){
                $temperatureC = $vFC[0];
                $humiditeC = $vFC[1];
                $bruitC = $vFC[2];
                $co2C = $vFC[3];
            }
            break;
        




        case 201: // Utilisateur - Page Capteurs Cardiaques
            $rythmeCardiaqueUtilisateur = requeteVariables($requeteRythmeCardiaque, ['id_utilisateur','jour','horaire'], [$identifiant,$day,$heureActuelle]);
            $rythmeCardiaqueMoyen = requeteVariables($requeteRythmeMoyen,['id_utilisateur','jour','horaire'],[$identifiant,$day,$hour2]);
            $rythmeCardiaqueMax = requeteVariables($requeteRythmeMax,['id_utilisateur','jour','horaire'],[$identifiant,$day,$hour2]);
            $tempsDanger = requeteVariables($requeteTempsDanger, ['id_utilisateur','jour','seuilFreq','horaire'], [$identifiant,$day,$seuilFreq,$heureActuelle]);
            //require_once("../V/utilisateurCapteurCardiaque.php");
            $head="head_util_CaptCard";
            $vue="utilisateurCapteurCardiaque";
            include '../V/head/'.$head.'.php';
            include '../V/headers-footer/navbar.php';
            include '../V/' . $vue . '.php';
            include '../V/headers-footer/footer.php';
            break;
        




        case 202: // Utilisateur - Page Capteurs Fixes
 	        $Poste = requeteVariables($requetePoste,['id_utilisateur'], [$identifiant])[0];
            $posteTravail = $Poste[0];
            $valeursFixesCarte = requeteVariables($requeteValeursFixes, ['id_capteur','jour'], [$posteTravail, $day]);
            foreach ($valeursFixesCarte as $vFC){
                $temperatureC = $vFC[0];
                $humiditeC = $vFC[1];
                $bruitC = $vFC[2];
                $co2C = $vFC[3];
            }
                //  require_once("../V/utilisateurCapteursFixes.php");
     /*     $head="head_util_CaptFixe";
          $vue="utilisateurCapteursFixes";
          include '../V/head/'.$head.'.php';
          include '../V/headers-footer/navbar.php';
          include '../V/' . $vue . '.php';
          include '../V/headers-footer/footer.php'; */
            break;
        




        case 203: // Utilisateur - Page Carte Chantier
            if(!isset($posteCarte)){
                $posteCarte = 1;
            }
            $valeursFixesCarte = requeteVariables($requeteValeursFixes, ['id_capteur','jour'], [$posteCarte, $day]);
            foreach ($valeursFixesCarte as $vFC){
                $temperatureC = $vFC[0];
                $humiditeC = $vFC[1];
                $bruitC = $vFC[2];
                $co2C = $vFC[3];
            }
   /*         require_once("../V/utilisateurCarteChantier.php");
            $head = "head_util_CarteChantier";
            $vue = "utilisateurCarteChantier";
            include '../V/head/'.$head.'.php';
            include '../V/headers-footer/navbar.php';
            include '../V/' . $vue . '.php';
            include '../V/headers-footer/footer.php'; */
            break;




        default :
            echo "Erreur d'identification du compte";
            break;
    }

/*
    include '../V/head/'.$head.'.php';
    include '../V/headers-footer/navbar.php';
    include '../V/' . $vue . '.php';
    include '../V/headers-footer/footer.php'; */
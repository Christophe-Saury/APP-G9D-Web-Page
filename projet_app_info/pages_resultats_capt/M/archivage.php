<?php 

    require("requetes.php");


    function dateArchive($jours){
        $dureeJour = 86400; // Nombre de secondes dans une journée
        $dateArchivage = time() - $dureeJour*$jours; // TEMPS J-$jours
        $dateArchivage = date('Y-m-d',$dateArchivage); // DATE de J-$jours au format de la table mesures_cardiaque de la BDD
        return $dateArchivage; // Retourne la date limite d'archvage
    }



// ================================================================================================================================================
// Fonction d'archivage des valeurs des capteurs fixes 
// ================================================================================================================================================



    function archivageMesuresFixes(){
        ini_set('max_execution_time', 3600); // Modification du temps maximal de traitement autorisé. Placé à 1h.
        require("connexion.php");
        require("archivageConstants.php");
        require("constants.php");
        $dateArchivage = dateArchive($joursAvantArchivageFixes); // Récupérer la date du dernier jour avant archivage (données complètement sauvegardées)
        $joursNonArchives = requeteVariables($requeteJoursNonArchivesFixes, array("jour"), array($dateArchivage)); // Exécution de la requête
        $listeJoursAArchiver = []; // Tableau listant tous les jours à archiver
        foreach ($joursNonArchives as $joursAA){
            $listeJoursAArchiver[] = $joursAA[0]; // Récupérer le premier et seul élément par requête
        }
        
        foreach ($listeJoursAArchiver as $jour){ // Pour chaque journée à archiver
            $moyennes = requeteVariables($requeteMoyennesJoursNonArchivesFixes, ['jour'],[$jour]); // Résultats requête
            
            foreach ($moyennes as $moy){
                $id_capteur = $moy[0]; // numéro du capteur archivé
                $co2 = (integer) $moy[1]; // Valeur moyenne du co2 sur la journée
                $humidite = (float) $moy[2]; // Valeur moyenne de l'humidité sur la journée
                $temperature = (float) $moy[3]; // Valeur moyenne de la tempéarture sur la journée
                $bruit = (float) $moy[4]; // Valeur moyenne du bruit sur la journée
                requeteVariables($requeteInsertionValeursMoyennesFixes,['jour','co2','humidite','temperature','bruit','id_capteur'],[$jour,$co2,$humidite,$temperature,$bruit,$id_capteur]);
                requeteVariables($requeteSuppressionValeursFixes,['jour'],[$jour]);
            }
        }
        
        ini_set('max_execution_time', 120); // Modification du temps maximal de traitement autorisé. Placé à 120s (valeur par défaut)
    }


    
// ================================================================================================================================================
// Fonction d'archivage des valeurs des capteurs cardiaques 
// ================================================================================================================================================


    function archivageMesuresCardiaques(){
        ini_set('max_execution_time', 3600); // Modification du temps maximal de traitement autorisé. Placé à 1h.
        require("connexion.php");
        require("archivageConstants.php");
        require("constants.php");
        $dateArchivage = dateArchive($joursAvantArchivageCardiaques); // Récupérer la date du dernier jour avant archivage (données complètement sauvegardées)
        $joursNonArchives = requeteVariables($requeteJoursNonArchivesCardiaques, array("jour"), array($dateArchivage)); // Exécution de la requête
        $listeJoursAArchiver = []; // Tableau listant tous les jours à archiver
        foreach ($joursNonArchives as $joursAA){
            $listeJoursAArchiver[] = $joursAA[0]; // Récupérer le premier et seul élément par requête (càd le jour)
        }
        foreach ($listeJoursAArchiver as $jour){ // Pour chaque journée à archiver
            $listeUtilisateurs = requeteVariables($requeteIDUtilisateursJoursNonArchivesCardiaques,['jour'],[$jour]);
            foreach($listeUtilisateurs as $lU){
                $id_util = $lU[0];
                //$id_util = 50;
                $depassements = requeteVariables($requeteDepassementUtilisateurCardiaque,['jour','id_utilisateur','seuilFreq'],[$jour,$id_util,$seuilFreq])[0][0]; // Résultats requête
                $moyenneFreq = (integer) requeteVariables($requeteMoyenneUtilisateurCardiaque,['jour','id_utilisateur'],[$jour,$id_util])[0][0]; // Résultats requête
                $tempsDepassement = ($depassements) * $periodeMesureCardiaque + 29*60*60;
                $heure30 = conversionTimeToHour($tempsDepassement);
                requeteVariables($requeteSuppressionValeursCardiaques,['jour','id_utilisateur'],[$jour,$id_util]);
                requeteVariables($requeteInsertionValeursMoyennesCardiaques,['jour', 'horaire', 'frequence', 'id_utilisateur'],[$jour,"$heure30",$moyenneFreq,$id_util]);
            }
        }
        ini_set('max_execution_time', 120); // Modification du temps maximal de traitement autorisé. Placé à 120s (valeur par défaut)
    }




        

        
// ================================================================================================================================================
// Fonction de conversion d'un temps en heures 
// ================================================================================================================================================


    function conversionTimeToHour($temps){
        $jour = date("d", $temps);
        $heure = date("H", $temps);
        $nouvelleHeure = ($jour-1) * 24 + $heure;
        $heureFinale = $nouvelleHeure.":".date('i:s',$temps);
        return $heureFinale;
    }





// ================================================================================================================================================
// Fonction de lancement de l'archivage 
// ================================================================================================================================================


    function lancementArchivage(){
        try {
            archivageMesuresFixes();
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        try {
            archivageMesuresCardiaques();
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }


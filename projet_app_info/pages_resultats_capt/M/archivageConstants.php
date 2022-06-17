<?php

// VALEURS CHOISIES ==============================================================================================================================

    // Nombre de jours avant la mise en archive des données des capteurs fixes
    $joursAvantArchivageFixes = 14;


    // Nombre de jours avant la mise en archive des données des capteurs cardiaques
    $joursAvantArchivageCardiaques = 14;




// REQUETES SQL ==================================================================================================================================


    // REQUETES CAPTEURS FIXES ===================================================================================================================

    // Récupérer les jours non-archivés. Les jours archivés possèderont en horaire : 30h00min00s (marqueur distinctif)
    $requeteJoursNonArchivesFixes = 'SELECT DISTINCT jour FROM mesures_fixes WHERE (jour <= :jour AND horaire != "30:00:00");';

    // Récupérer les moyennes des capteurs pour les jours non-archivés.
    $requeteMoyennesJoursNonArchivesFixes = 'SELECT id_capteur , AVG(co2) , AVG(humidite) , AVG(temperature) , AVG(bruit)  FROM mesures_fixes WHERE jour = :jour GROUP BY id_capteur ORDER BY id_capteur;';

    // Insérer les valeurs moyennes des capteurs fixes
    $requeteInsertionValeursMoyennesFixes = "INSERT INTO mesures_fixes VALUES (DEFAULT, :jour, '30:00:00', :co2, :humidite, :temperature, :bruit, :id_capteur);";

    // Supprimer les lignes archivées des capteurs fixes;
    $requeteSuppressionValeursFixes = "DELETE FROM mesures_fixes WHERE (jour <= :jour AND horaire < '29:00:00');";




    // ===========================================================================================================================================




    // REQUETES CAPTEURS CARDIAQUES ==============================================================================================================
    
    // Récupérer les jours non-archivés. Les jours archivés possèderont un horaire >= 30h00min00s (marqueur distinctif)
    $requeteJoursNonArchivesCardiaques = 'SELECT DISTINCT jour FROM mesures_cardiaque WHERE (jour <= :jour AND horaire < "30:00:00");';

    // Récupérer les différents utilisateurs ayant des mesures non-archivées le jour choisi
    $requeteIDUtilisateursJoursNonArchivesCardiaques = "SELECT DISTINCT id_utilisateur FROM mesures_cardiaque WHERE (jour = :jour);";

    // Requête dépassements utilisateur
    $requeteDepassementUtilisateurCardiaque = "SELECT COUNT(frequence) FROM mesures_cardiaque WHERE (jour = :jour AND id_utilisateur=:id_utilisateur AND frequence >= :seuilFreq) LIMIT 1;";
    // Requête valeur moyenne utilisateur
    $requeteMoyenneUtilisateurCardiaque = "SELECT AVG(frequence) FROM mesures_cardiaque WHERE (jour = :jour AND id_utilisateur=:id_utilisateur) LIMIT 1;";

    // Insérer les valeurs des capteurs cardiaques
    $requeteInsertionValeursMoyennesCardiaques = 'INSERT INTO mesures_cardiaque VALUES (DEFAULT, :jour, :horaire, :frequence, :id_utilisateur);';

    // Supprimer les lignes archivées des capteurs cardiaques;
    $requeteSuppressionValeursCardiaques = "DELETE FROM mesures_cardiaque WHERE (jour = :jour AND id_utilisateur = :id_utilisateur);";


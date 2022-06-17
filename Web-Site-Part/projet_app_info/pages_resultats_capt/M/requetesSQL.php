<?php



    // ===========================================================================================================================================
    // Page "constants.php" ======================================================================================================================
    

    // Récupérer le nom, le prénom et le rôle (Administrateur, Gestionnaire, Utilisateur) de la personne connectée
    $reqInfos = 'SELECT nom, prenom, role FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);';










    // ===========================================================================================================================================
    // Page "gaCapteursCardiaques" ===============================================================================================================
    
    
    // Récupérer le temps de stress sur la journée
    $reqTempsStress = 'SELECT COUNT(frequence) FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour = :jour AND frequence > :seuilFreq);';


    // REQUETE PRINCIPALE
    $reqPrincipaleGACardiaque = 'SELECT nom, prenom, chantier, COUNT(frequence) FROM utilisateur /* NOM, PRENOM, POSTE (poste de travail) NOMBRE DE FOIS OU FREQUENCE > seuil */
    INNER JOIN mesures_cardiaque
    ON utilisateur.id_utilisateur = mesures_cardiaque.id_utilisateur /* Condition de jointure : les identifiants utilisateur sont les mêmes */
    WHERE (frequence > :freq AND role = 2 AND jour = :jour  AND horaire <= :horaire) /* Ne compter que lorsque la fréquence passe au-dessus du seuil POUR LES UTILISATEURS SEULEMENT (role = 2) et depuis ce matin */
    GROUP BY utilisateur.id_utilisateur /* Regrouper la comptabilisation en fonction des identifiants des utilisateurs */
    ORDER BY COUNT(frequence) DESC;'
    ;










    // ===========================================================================================================================================
    // Page "gaCapteursFixes"


    // Récupérer tous les id_utilisateurs
    $reqIdUtilisateurs ='SELECT DISTINCT id_utilisateur FROM utilisateur WHERE role = 2;';

    // Ajouter à chaque utilisateur une valeur à 1000 bpm horaire : "100:00:00"
    $req1000bpm = 'INSERT INTO mesures_cardiaque (id_mesure, jour, horaire, frequence, id_utilisateur) VALUES (DEFAULT, :jour, "100:00:00",1000,:id_utilisateur);';

    // REQUETE PRINCIPALE
    $reqPrincipaleGAFixes = 'SELECT id_capteur, temperature, humidite, bruit, co2 FROM mesures_fixes WHERE (jour = :jour) GROUP BY id_capteur ORDER BY id_capteur;';

    // Supprimer les lignes à 1000bpm
    $reqSuppression1000bpm = 'DELETE FROM mesures_cardiaque WHERE frequence = 1000;';










    // ===========================================================================================================================================
    // Page "utilisateurCapteurCardiaque"


    // Requête SQL pour trouver le rythme cardiaque actuel
	$requeteRythmeCardiaque = 'SELECT frequence FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur  AND jour = :jour AND horaire <= :horaire) ORDER BY horaire DESC LIMIT 1;';

	// Requête SQL pour trouver le rythme cardiaque moyen sur la dernière heure
    $requeteRythmeMoyen = 'SELECT ROUND(AVG(frequence),1) FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour=:jour AND horaire >= :horaire);';

	// Requête SQL pour trouver le rythme cardiaque maximal atteint sur la dernière heure
	$requeteRythmeMax = 'SELECT MAX(frequence)FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour=:jour AND horaire >= :horaire);';
  
	// Requête SQL pour trouver le temps de stress (nb de mesures > $seuil) * $periodeMesure (intervalle de temps entre chaque mesure)
    $requeteTempsDanger = 'SELECT COUNT(frequence) FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour = :jour AND frequence > :seuilFreq AND horaire <= :horaire);';










    // ===========================================================================================================================================
    // Page "utilisateurCapteursFixes"

    // Requête SQL pour retrouver le poste de travail de l'utilisateur
    $requetePoste = 'SELECT chantier FROM utilisateur WHERE id_utilisateur = :id_utilisateur;';

    // Requête pour retrouver les valeurs du capteurs fixe associé au poste
    $requeteValeursFixes = 'SELECT temperature, humidite, bruit, co2 FROM mesures_fixes WHERE (id_capteur = :id_capteur AND jour=:jour) ORDER BY horaire DESC LIMIT 1;';



    // ===========================================================================================================================================
    // Page "utilisateurCarteChantier"

    $requeteMaxIDChantier = 'SELECT MAX(id_chantier) FROM chantier;';
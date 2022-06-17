<?php

    require("requetes.php"); // Fonctions permettant de traiter les requêtes SQL
    require("requetesSQL.php"); // Requêtes SQL (sous forme de texte)

    
    if(!isset($_SESSION["user_id"])){
        session_start();
  //      $_SESSION["user_id"] = 60;    // Id_utilisateur par défaut. A changer une fois que les SESSIONS fonctionnent
    }

    // Identifiant de l'utilisateur du site Web
    //$identifiant = $_SESSION["id_utilisateur"];
    $identifiant = $_SESSION["user_id"]; // Récupérer l'identifiant
    

    
    // Connexion BDD
    require("connexion.php");


    // Requête nom, prénom, fonction de la personne connectée
    $reqInfo = requeteVariables($reqInfos,['id_utilisateur'],[$identifiant]); 
    foreach($reqInfo as $rI) {
        $nom = $rI[0];
        $prenom = $rI[1];
        $fonction = $rI[2];
    }




    // Listes des tables de valeurs et de seuils (pour les changement de couleur)
// ======================================================================================================================================================================
    // Table des seuils de température (en °)
    $tableTemperature = [15,20,25,30,35];

    // Table des seuils d'humidité (en %)
    $tableHumidite = [35,45,55,65,75];

    // Table des seuils de CO2 (en ppm)
    $tableCO2 = [200,400,600,800,1000];

    // Table des seuils de bruit (en dB)
    $tableBruit = [50,70,85,95,110];
    
    // Table des seuils de fréquence (en bpm)
    $tableFrequence = [70,90,110,130,150];

    // Table des seuils de fréquence maximale (en bpm)
    $tableFrequenceMax = [100,120,140,160,180];

    // Table des seuils de durées de stress (en s)
    $tableTempsStress = [600,1200,1800,2400,3000];


    // ======================================================================================================================================================================


    // Couleurs des contours des valeurs 
    $couleurs = ['green', 'greenyellow', 'yellow', 'orange', 'red', 'black'];



    // Valeurs utiles
    // ======================================================================================================================================================================

    // Heure actuelle en s
    $hour = time();

    // Heure actuelle au format Heure:minute:seconde
    $heureActuelle = date("H:i:s", $hour);

    // Heure H-1
    $hour2 = date('H:i:s', $hour - 3600); // Vérifier problème affichage 1h supplémentaire

    // Date actuelle
    $day = date('Y-m-d');

    // Seuil de passage en état de stress (en bpm)
    $seuilFreq = 130;

    // Intervalle de temps entre chaque mesure cardiaque (en s)
    $periodeMesureCardiaque = 60;


    // Intervalle de temps entre chaque mesure fixe (en s)
    $periodeMesureFixe = 60;


    // Identifiant maximal de chantier
    $maxIDChantier = requeteSimple($requeteMaxIDChantier)[0][0];

<?php

    if(!isset($_SESSION["id_utilisateur"])){
        session_start();
        $_SESSION["id_utilisateur"] = 1;
    }

    // Indentifiant de l'utilisateur du site Web
    //$identifiant = $_SESSION["id_utilisateur"];
    $identifiant = $_SESSION["id_utilisateur"];
    

    $db = new PDO('mysql:host=localhost;dbname=isep;charset=utf8','root','');
    $r1 = $db -> prepare('SELECT role FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
    $r1 ->  execute(['id_utilisateur' => $identifiant]);
    $r2 = $r1 -> fetchAll();
    foreach($r2 as $r3) {
        $fonction = $r3[0];
    }


    if(!isset($posteCarte)){
        $posteCarte = 0;
    }


    // Listes des tables de valeurs et de seuils (pour les changement de couleur)
// ======================================================================================================================================================================
    // Table des seuils de température (en °)
    $tableTemperature = [15,20,25,30,35];

    // Table des seuils d'humidité (en %)
    $tableHumidite = [35,45,55,65,75];

    // Table des seuils de CO2 (en ppm)
    $tableCO2 = [250,325,400,475,550];

    // Table des seuils de bruit (en dB)
    $tableBruit = [50,70,85,95,110];
    
    // Table des seuils de fréquence (en bpm)
    $tableFrequence = [70,90,110,130,150];

    // Table des seuils de fréquence maximale (en bpm)
    $tableFrequenceMax = [100,120,140,160,180];

    // Table des seuils de durées de stress (en s)
    $tableTempsStress = [300,600,900,1200,1500];


    // ======================================================================================================================================================================


    // Couleurs des contours des valeurs 
    $couleurs = ['green', 'greenyellow', 'yellow', 'orange', 'red', 'black'];



    // Valeurs utiles
    // ======================================================================================================================================================================

    // Heure actuelle 
    $hour = time();

    // Heure H-1
    $hour2 = date('H:i:s', $hour -3600);

    // Date actuelle
    $day = date('Y-m-d');

    // Seuil de passage en état de stress (en bpm)
    $seuilFreq = 170;

    // Intervalle de temps entre chaque mesure (en s)
    $periodeMesure = 60;

    $poste0 = 0;
    $poste1 = 1;
    $poste2 = 2;
    $poste3 = 3;
    $poste4 = 4;
    $poste5 = 5;

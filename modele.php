<?php
    

    require('constants.php');

    $db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');


    function couleur(string $grandeurMesure) {
        require('constants.php');
        if ($grandeurMesure == 'temperature'){ // Grandeur mesurée : Température
            return $tableTemperature;
        }
        if ($grandeurMesure == 'humidite'){ // Grandeur mesurée : Humidité
            return $tableHumidite;
        }
        if ($grandeurMesure == 'co2'){ // Grandeur mesurée : CO2
            return $tableCO2;
        }
        if ($grandeurMesure == 'bruit'){ // Grandeur mesurée : Bruit
            return $tableBruit;
        }
        if ($grandeurMesure == 'frequence'){ // Grandeur mesurée : Fréquence
            return $tableFrequence;
        }
        if ($grandeurMesure == 'frequenceMax'){ // Grandeur mesurée : Fréquence maximale
            return $tableFrequenceMax;
        }
        if ($grandeurMesure == 'temps'){ // Grandeur mesurée : Période supérieure au seuil
            return $tableTempsStress;
        }
    }


    

    function associationCouleur (array $table1, $value){
        $couleurs = ['green', 'greenyellow', 'yellow', 'orange', 'red', 'black'];
        
        if ($value < $table1[0]){ // Cas 1
            return $couleurs[0]; // green
        }
        else if ($value < $table1[1]){ // Cas 2 
            return $couleurs[1];  // greenyellow
        }
        else if ($value < $table1[2]){ // Cas 3
            return $couleurs[2]; // yellow
        }
        else if ($value < $table1[3]){ // Cas 4
            return $couleurs[3]; // orange
        } 
        else if ($value < $table1[4]){ // Cas 5
            return $couleurs[4]; // red
        }
        else { // Cas 6
            return $couleurs[5]; // black
        }
    }


    

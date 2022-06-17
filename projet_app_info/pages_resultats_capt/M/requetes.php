<?php

    require("connexion.php"); // Se connecter à la Base de Données



    // Fonction renvoyant le résultat d'une requête simple (sans variables)
    if (!function_exists('requeteSimple')){
        function requeteSimple(string $requeteSQL){
            require("connexion.php"); // Connexion BDD
            $etape1 = $db -> prepare($requeteSQL);
            $etape1 -> execute();
            $etape2 = $etape1 -> fetchAll();
            return $etape2; // Renvoyer les résultats
        }
    }



    // Fonction renvoyant le résultat d'une requête à une ou plusieurs variables
    if (!function_exists('requeteVariables')){
        function requeteVariables(string $requeteSQL, array $tableTexte, $tableValeurs){ 
            // $tableTexte : liste des éléments STRING qui vont être remplacés par des variables dans la requête SQL (précédés de ":")
            // $tableValerus : liste des variables remplaçant les champs de la forme ":_____" dans le requête SQL
            require("connexion.php"); // Connexion BDD
            if (isset($tableTexte) && isset($tableValeurs) && count($tableTexte) === count($tableValeurs)){
                $taille = count($tableTexte); // Nombre d'éléments à remplacer
                $liste = []; // Préparation de l'argument dans la fonction execute()
                for ($i = 0; $i < $taille; $i++){
                    $liste[$tableTexte[$i]]=$tableValeurs[$i]; // Compléter $liste. Tableau associatif String - Variable
                }
                $etape1 = $db -> prepare($requeteSQL);
                $etape1 -> execute($liste); // On place $liste en argument dans execute()
                $etape2 = $etape1 -> fetchAll();
                return $etape2;
            }
        }
    }


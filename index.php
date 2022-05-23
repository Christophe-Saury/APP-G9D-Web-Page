<?php

    require("modele.php");
    $r1 = $db -> prepare('SELECT fonction FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
    $r1 ->  execute(['id_utilisateur' => $identifiant]);
    $r2 = $r1 -> fetchAll();
    foreach($r2 as $r3) {
        $fonction = $r3[0];
    }


    if ($fonction == 0){
        require("utilisateurCapteurCardiaque.php");
    }
    elseif ($fonction == 1 || $fonction == 2) {
        require("gaCapteurCardiaque.php");
    }
    else {
        echo "erreur compte";
    }

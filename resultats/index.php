<?php

    require("modele.php");
    require("constants.php");


    if ($fonction == 2){
        require("utilisateurCapteurCardiaque.php");
    }
    elseif ($fonction == 0 || $fonction == 1) {
        require("gaCapteurCardiaque.php");
    }
    else {
        echo "erreur compte";
    }

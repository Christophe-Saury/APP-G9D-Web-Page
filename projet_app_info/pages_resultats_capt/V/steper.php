<?php
include('head/head_steper.php');
?>
<body>
    <div class="corpsGauche">
        <ul class="corpsGaucheHaut">
            <li class="corpsGaucheHautUtilisateur">Utilisateur</li>
            <li class="identifiant"><?php echo "$nom $prenom";?></li>                  
        </ul>
        <ul class="corpsGaucheBas">
            <li><a href="../C/index.php">Capteur cardiaque</a></li>
            <li><a href="../V/utilisateurCapteursFixes.php">Votre poste de travail</a></li>
            <li><a href="../V/utilisateurCarteChantier.php">Carte chantier</a></li>
            <ul class="codeCouleur">
                <li><i class='material-icons' style='font-size: 15px; color: green;'>square</i> Très Bon</li>
                <li><i class='material-icons' style='font-size: 15px; color: greenyellow;'>square</i> Bon</li>
                <li><i class='material-icons' style='font-size: 15px; color: yellow;'>square</i> Acceptable</li>
                <li><i class='material-icons' style='font-size: 15px; color: orange;'>square</i> Mauvais</li>
                <li><i class='material-icons' style='font-size: 15px; color: red;'>square</i> Très Mauvais</li>
                <li><i class='material-icons' style='font-size: 15px; color: black;'>square</i> Dangereux</li>
            </ul>
        </ul>

    </div>
</body>


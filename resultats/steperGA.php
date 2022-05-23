<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>steperGA</title>
    <link rel="stylesheet" href="css_resultats/steper.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    
    <?php
    require("constants.php");
    
    $np = $db -> prepare('SELECT nom, prenom, role FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
    $np ->  execute(['id_utilisateur' => $identifiant]);
    $np2 = $np -> fetchAll();
    foreach($np2 as $np3) {
        $nom = $np3[0];
        $prenom = $np3[1];
        $fonction = $np3[2];
    }
?>
</head>

<body>
    <div class="corpsGauche">
        <ul class="corpsGaucheHaut">
            <li class="corpsGaucheHautUtilisateur">
                <?php
                    if ($fonction == 1){
                        echo "Gestionnaire";
                    }
                    if ($fonction == 0){
                        echo "Administrateur";
                    }
                ?>
            </li>
            <li class="identifiant"><?php echo "$nom $prenom"; ?></li>                  
        </ul>        
        <ul class="corpsGaucheBas">
            <li><a href="index.php">Capteurs cardiaques</a></li>
            <li><a href="gaCapteursFixes.php">Postes de travail</a></li>
            <li><a href="gaCarteChantier.php">Carte chantier</a></li>
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

</html>
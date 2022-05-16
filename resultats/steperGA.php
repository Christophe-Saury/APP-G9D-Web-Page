<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>steperGA</title>
    <link rel="stylesheet" href="steper.css">
    
    <?php
    require("constants.php");
    $db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
    $hour = time(); // Heure actuelle
    $hour2 = date('H:i:s',$hour -3600); // Heure d'avant
    $day = date('Y-m-d'); // date du jour
    $seuilFreq = 160; // Seuil de signalisation "stress"
    $periodeMesure = 60; // Intervalle de temps entre chaque mesure (en s)
    
    $dateExemple = '2022-01-01'; // Test de date
    $heureExemple = '15:00:00'; // Test d'horaire

    $np = $db -> prepare('SELECT nom, prenom, fonction FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
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
                    if ($fonction == 2){
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
        </ul>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>

<?php
    require("modele.php");

    $np = $db -> prepare('SELECT nom, prenom FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
    $np ->  execute(['id_utilisateur' => $identifiant]);
    $np2 = $np -> fetchAll();
    foreach($np2 as $np3) {
        $nom = $np3[0];
        $prenom = $np3[1];
    }
?>


<head>
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Capteurs fixes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css_resultats/gaCapteursFixes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>
	<div class="corps">
        <div>
            <?php include("steperGA.php") ?>
		</div>
		<div class="corpsCentral">
            <table class="tableauRésultats">
                <tr class="entete">  
                    <th>Poste</th>
                    <th>Température</th>
                    <th>Humidité</th>
                    <th>Bruit</th>
                    <th>CO2</th>
                </tr>
                <?php $fixe=$db -> prepare('SELECT id_capteur, temperature, humidite, bruit, co2 FROM mesures_fixes
                WHERE (jour = :jour) GROUP BY id_capteur ORDER BY id_capteur;');
                $fixe -> execute(['jour' => $day]);
                $fixe2 = $fixe -> fetchAll();
                foreach($fixe2 as $fixe3) {
                    $temperature = $fixe3[1];
                    $couleurTemperature = associationCouleur(couleur('temperature'),$temperature);
                    $humidite = $fixe3[2];
                    $couleurHumidite = associationCouleur(couleur('humidite'),$humidite);
                    $bruit = $fixe3[3];
                    $couleurBruit = associationCouleur(couleur('bruit'),$bruit);
                    $co2 = $fixe3[4];
                    $couleurCo2 = associationCouleur(couleur('co2'),$co2);
                    echo "<tr>
                    <td>{$fixe3[0]}</td>
                    <td><i class='material-icons' style='font-size: 20px; color: $couleurTemperature;'>trip_origin</i>   {$temperature}°C</td>
                    <td><i class='material-icons' style='font-size: 20px; color: $couleurHumidite;'>trip_origin</i>   {$humidite}%</td>
                    <td><i class='material-icons' style='font-size: 20px; color: $couleurBruit;'>trip_origin</i>   {$bruit}dB</td>
                    <td><i class='material-icons' style='font-size: 20px; color: $couleurCo2;'>trip_origin</i>   {$co2}ppm</td>
                    </tr>";
                }
                ?>
              </table>
		</div>
	</div>
	


</body>

</html>
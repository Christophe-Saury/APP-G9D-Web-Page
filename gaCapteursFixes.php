<!DOCTYPE html>
<html>

<?php
    $db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
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
	<link rel="stylesheet" href="gaCapteursFixes.css">
</head>


<body>
	<div class="corps">
		<div class="corpsGauche">
			<ul class="corpsGaucheHaut">
				<li class="corpsGaucheHautUtilisateur">Administrateur</li>
                <li class="identifiant"><?php echo "$nom $prenom"?></li>                  
			</ul>
			<ul class="corpsGaucheBas">
				<li><a href="index.php">Capteurs cardiaques</a></li>
				<li><a href="gaCapteursFixes.php">Postes de travail</a></li>
				<li><a href="gaCarteChantier.php">Carte chantier</a></li>
			</ul>
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
                $fixe -> execute(['jour' => $dateExemple]);
                $fixe2 = $fixe -> fetchAll();
                foreach($fixe2 as $fixe3) {
                    echo "<tr><td>{$fixe3[0]}</td><td>{$fixe3[1]}</td><td>{$fixe3[2]}</td><td>{$fixe3[3]}</td><td>{$fixe3[4]}</td></tr>";
                }
                ?>
              </table>
		</div>
	</div>
	


</body>

</html>
<!DOCTYPE html>
<html>

<?php
	require("modele.php");
	require("constants.php");

	// Récupérer la valeur du poste de travail de l'utilisateur
 	$posteTravail1 = $db -> prepare('SELECT poste FROM utilisateur WHERE id_utilisateur = :id_utilisateur;');
 	$posteTravail1 -> execute(['id_utilisateur' => $identifiant]);
 	$posteTravail2 = $posteTravail1 -> fetchAll();
 	foreach($posteTravail2 as $posteTravail3){
		$posteTravail = $posteTravail3[0];
 	}



 	// Récupérer les valeurs du capteur fixe associé à l'utilisateur
	$poste1 = $db -> prepare('SELECT temperature, humidite, bruit, co2 FROM mesures_fixes WHERE (id_capteur = :id_capteur AND jour=:jour) ORDER BY horaire DESC LIMIT 1;');
 	$poste1 -> execute(['id_capteur' => $posteTravail, 'jour' => $day]);
 	$poste2 = $poste1 -> fetchAll();
 	foreach($poste2 as $poste3){
		$temp = $poste3[0];
		$hum = $poste3[1];
		$bruit = $poste3[2];
		$co2 = $poste3[3];
 	}


 	$np = $db -> prepare('SELECT nom, prenom FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
 	$np ->  execute(['id_utilisateur' => $identifiant]);
 	$np2 = $np -> fetchAll();
 	foreach($np2 as $np3) {
		$nom = $np3[0];
	 	$prenom = $np3[1];
 	}
?>


<head>
	<title>Page d'affichage des résultats utilisateur - Capteurs fixes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css_resultats/utilisateurCapteurCardiaque.css">
</head>



<body>
	<div class="corps">
		<div>
            <?php include("steper.php") ?>
		</div>
		<div class="central">
			<header>
				<p style="margin : auto; padding : auto; font-size : 30px">
				<?php
				echo date('d/m/Y H:i:s', $hour); // Date actuelle à l'ouverture de la page
				?>
				</p>
				<div class="boutonsCentral">
					<a href = "projet\mesures_cardiaque.ibd" download="Fichier Base de Données"> Téléchargement</a>
					<a href = "#" style='visibility : hidden;'> Graphiques </a>
				</div>
			</header>
			<div class="corpsCentral" style="flex-grow: 7; display: flex; flex-direction: row   ; flex-wrap: wrap;">
				<div class="capteurTempérature capteur">
					<header>
						Température
					</header>
					<?php
					$grandeur = 'temperature';
					$coul = couleur($grandeur);
					$borderColor = associationCouleur($coul,$temp);
					echo "<div class=valeur style=border-color:$borderColor> $temp °</div>";
					?>
				</div>
				<div class="capteurHumidite capteur">
					<header>
						Humidité
					</header>
					<?php
					$grandeur = 'humidite';
					$coul = couleur($grandeur);
					$borderColor = associationCouleur($coul,$hum);
					echo "<div class=valeur style=border-color:$borderColor> $hum %</div>";
					?>
				</div>
				<div class="capteurBruit capteur">
					<header>
						Bruit
					</header>
					<?php
					$grandeur = 'bruit';
					$coul = couleur($grandeur);
					$borderColor = associationCouleur($coul,$bruit);
					echo "<div class=valeur style=border-color:$borderColor> $bruit dB</div>";
					?>
				</div>
				<div class="capteurCO2 capteur">
					<header>
						Taux de CO2
					</header>
					<?php
					$grandeur = 'co2';
					$coul = couleur($grandeur);
					$borderColor = associationCouleur($coul,$co2);
					echo "<div class=valeur style=border-color:$borderColor> $co2 ppm</div>";
					?>
				</div>
			</div>	
		
		</div>		
	</div>
</body>

</html>
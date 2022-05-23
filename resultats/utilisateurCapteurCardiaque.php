<!DOCTYPE html>
<html>

<?php
	if(!isset($couleurs)){
		require("modele.php");
	}

	// Requête SQL pour trouver le rythme cardiaque actuel
	$query11 = $db -> prepare('SELECT frequence FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur) ORDER BY horaire DESC LIMIT 1;');
	$query11 -> execute(['id_utilisateur' => $identifiant]);
	$query12 = $query11 -> fetchAll();


	// Requête SQL pour trouver le rythme cardiaque moyen sur la dernière heure
	$query21 = $db -> prepare('SELECT ROUND(AVG(frequence),1) FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour=:jour AND horaire >= :horaire);');
	$query21 ->  execute([
		'id_utilisateur' => $identifiant,
		'jour' => $day,
		'horaire' => $hour
	]);
	$query22 = $query21 -> fetchAll();


	// Requête SQL pour trouver le rythme cardiaque maximal atteint sur la dernière heure
	$query31 = $db -> prepare('SELECT MAX(frequence)FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour=:jour AND horaire >= :horaire);');
	$query31 ->  execute([
		'id_utilisateur' => $identifiant,
		'jour' => $day,
		'horaire' => $hour
	]);
	$query32 = $query31 -> fetchAll();


	// Requête SQL pour trouver le temps de stress (nb de mesures > $seuil) * $periodeMesure (intervalle de temps entre chaque mesure)
	$query41 = $db -> prepare('SELECT COUNT(frequence) FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour = :jour AND frequence > :seuilFreq);');
	$query41 ->  execute([
		'id_utilisateur' => $identifiant,
		'jour' => $day,
		'seuilFreq' => $seuilFreq
	]);
	$query42 = $query41 -> fetchAll();



	$np = $db -> prepare('SELECT nom, prenom FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
	$np ->  execute(['id_utilisateur' => $identifiant]);
	$np2 = $np -> fetchAll();
	foreach($np2 as $np3) {
		$nom = $np3[0];
		$prenom = $np3[1];
	}
?>


<head>
	<title>Page d'affichage des résultats utilisateur - Capteur</title>
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
					<a href = "projet\mesures_cardiaque.ibd" download="Fichier Base de Données">Téléchargement</a>
					<a href = "#" style='visibility : hidden;'>Graphiques</a>
				</div>
			</header>			
			<div class="corpsCentral" style="flex-direction:row">
				<div class="capteurCardiaque capteur">
					<header>
						Votre rythme cardiaque actuel
					</header>
					<?php
						foreach($query12 as $query13) { 						
							$grandeur = 'frequence';
							$coul = couleur($grandeur);
							$borderColor = associationCouleur($coul,$query13[0]);
							echo "<div style=border-color:$borderColor> $query13[0] bpm</div>";
						} // Rythme cardiaque actuel
					?>
				</div>
				<div class="capteurCardiaqueMoyenne capteur">
					<header>
						Votre rythme cardiaque moyen sur la dernière heure
					</header>
					<?php
						foreach($query22 as $query23) { 						
							$grandeur = 'frequence';
							$coul = couleur($grandeur);
							$borderColor = associationCouleur($coul,$query23[0]);
							echo "<div style=border-color:$borderColor> $query23[0] bpm</div>";
						} // Rythme cardiaque moyen sur la dernière heure
					?>
				</div>
				<div class="capteurCardiaqueMax capteur">
					<header>
						Rythme cardiaque maximal mesuré sur la dernière heure
					</header>
					<?php
						foreach($query32 as $query33) { 						
							$grandeur = 'frequenceMax';
							$coul = couleur($grandeur);
							$borderColor = associationCouleur($coul,$query33[0]);
							echo "<div style=border-color:$borderColor> $query33[0] bpm</div>";
						} // Rythme cardiaque maximal sur la dernière heure
					?>
				</div>
				<div class="compteurCardiaque capteur">
					<header>
						Temps de stress
					</header>
					<?php
						foreach($query42 as $query43) {
							$grandeur = 'temps';
							$coul = couleur($grandeur);
							$temps = $query43[0]*$periodeMesure;
							$borderColor = associationCouleur($coul,$temps);
							$result = date('H:i:s',$temps-3600);
							echo "<div style=border-color:$borderColor> $result</div>";
						} // Rythme cardiaque actuel
					?>
				</div>			

			</div>				
		</div>
	</div>

</body>

</html>
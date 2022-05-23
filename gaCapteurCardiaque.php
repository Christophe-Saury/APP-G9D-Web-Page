<!DOCTYPE html>
<html>


<?php
    $np = $db -> prepare('SELECT nom, prenom FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
    $np ->  execute(['id_utilisateur' => $identifiant]);
	$np2 = $np -> fetchAll();
    foreach($np2 as $np3) {
        $nom = $np3[0];
        $prenom = $np3[1];
    }
?>


<head>
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Capteur</title>
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
                <a href="index.php"><li>Capteurs cardiaques</li></a>
				<a href="gaCapteursFixes.php"><li>Postes de travail</li></a>
				<a href="gaCarteChantier.php"><li>Carte chantier</li></a>
			</ul>
		</div>



		<div class="corpsCentral">
            <table class="tableauRésultats">
                <tr class="entete">  
                    <th>NOM</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                    <th>Temps de stress</th>
                </tr>
                <?php $client=$db -> prepare(
                'SELECT nom, prenom, poste, COUNT(frequence) FROM utilisateur /* NOM, PRENOM, POSTE (poste de travail) NOMBRE DE FOIS OU FREQUENCE > seuil */
                INNER JOIN mesures_cardiaque /* Jointure avec la liste des mesures cardiaques */
                ON utilisateur.id_utilisateur = mesures_cardiaque.id_utilisateur /* Condition de jointure : les identifiants utilisateur sont les mêmes */
                WHERE (frequence > :freq AND fonction = 0) /* Ne compter que lorsque la fréquence passe au-dessus du seuil POUR LES UTILISATEURS SEULEMENT */
                GROUP BY utilisateur.id_utilisateur /* Regrouper la comptabilisation en fonction des identifiants des utilisateurs */
                ORDER BY COUNT(frequence) DESC;' /* Tri par nombre de dépassements */
                );

                $client -> execute(['freq' => $seuilFreq]); /* Exécuter avec la variable $seuilFreq */
                $client2 = $client -> fetchAll();
                foreach($client2 as $client3) {
                    echo "<tr>
                    <td>{$client3[0]}</td>
                    <td>{$client3[1]}</td>
                    <td>{$client3[2]}</td>
                    <td>".date('H:i:s',$client3[3]*$periodeMesure)."</td>
                    </tr>";
                } // VERIFIER ERREUR "$periodeMesure - 3600. Le H prend automatiquement la valeur 1
                ?>
            </table>
		</div>
	</div>	


</body>

</html>
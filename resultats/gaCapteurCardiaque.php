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


    // Requête SQL pour trouver le temps de stress (nb de mesures > $seuil) * $periodeMesure (intervalle de temps entre chaque mesure)
	$query41 = $db -> prepare('SELECT COUNT(frequence) FROM mesures_cardiaque WHERE (id_utilisateur = :id_utilisateur AND jour = :jour AND frequence > :seuilFreq);');
	$query41 ->  execute([
		'id_utilisateur' => $identifiant,
		'jour' => $dateExemple,
		'seuilFreq' => $seuilFreq
	]);
	$query42 = $query41 -> fetchAll();
?>


<head>
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Capteur</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="gaCapteursFixes.css">
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
                ORDER BY nom;' /* Tri par nombre de dépassements */
                );

                $client -> execute(['freq' => $seuilFreq]); /* Exécuter avec la variable $seuilFreq */
                $client2 = $client -> fetchAll();

                foreach($client2 as $client3) {
                    $temps = $client3[3]*$periodeMesure;
                    $couleurTemps = associationCouleur(couleur('temps'),$temps);
                    echo "<tr>
                    <td>{$client3[0]}</td>
                    <td>{$client3[1]}</td>
                    <td>{$client3[2]}</td>
                    <td>
                    <i class='material-icons' style='font-size: 25px; color: $couleurTemps;'>health_and_safety</i>".date('H:i:s',$temps-3600)."
                    </td>
                    </tr>";
                } // VERIFIER ERREUR "$periodeMesure - 3600. Le H prend automatiquement la valeur 1
                ?>
            </table>
		</div>
	</div>	

</body>

</html>
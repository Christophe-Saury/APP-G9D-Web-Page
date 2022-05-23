<!DOCTYPE html>
<html>


<?php
    require("modele.php");

    if(!isset($posteCarte)){
        $posteCarte = 0;
    } else {
        
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
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Carte Chantier</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css_resultats/gaCarteChantier.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>
	<div class="corps">
		<div class="corpsGauche" style="flex-direction: 1;">
            <div>
                <?php include("steperGA.php") ?>
		    </div>
		</div>

		<div class="corpsCentral"  style="flex-direction: 10;"> 
            <header>
                <div class="localisation">
                    <?php echo $posteCarte ?>
                </div>
                <div class="Température capteur">
                    <ul>
                        <li>Température : </li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px;">thermostat</i>
                    </ul>
                </div>
                <div class="CO2 capteur">
                    <ul>
                        <li>CO2 :</li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px; color: orange;">co2</i>
                    </ul>
                </div>
                <div class="Humidité capteur">
                    <ul>
                        <li>Humidité :</li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px; color: orange;">water_drop</i>
                    </ul>
                </div>
                <div class="Bruit capteur">
                    <ul>
                        <li>Bruit :</li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px; color: red;">equalizer</i>
                    </ul>
                </div>
            </header>
            <div class="corpsCentral">
                <div class="corpsCentralCarte">
                    <img src=https://www.bati-solar.fr/wp-content/uploads/2018/10/nos-maisons-plans-chatellerault-poitiers-plans-des-maisons-dhabitation-plans-des-maisons.jpg style="width : 100%;opacity: 0.5;" alt="CarteChantier" usemap="#CarteChantier1">
                    <map name="CarteChantier1">
                        <area shape="rect" coords="0 310 310 690" alt="Garage" onclick="retourValeur($poste0)" href="gaCarteChantier.php">
                        <area shape="rect" coords="310 310 780 680" alt="Salon" onclick="retourValeur($poste1)" href="gaCarteChantier.php">
                        <area shape="rect" coords="410 0 770 310" alt="Terrasse" onclick="retourValeur($poste2)" href="gaCarteChantier.php">
                        <area shape="rect" coords="770 0 1200 460" alt="Chambres23" onclick="retourValeur($poste3)" href="gaCarteChantier.php">
                        <area shape="rect" coords="770 460 1200 690" alt="Cuisine" onclick="retourValeur($poste4)" href="gaCarteChantier.php">
                    </map>                
                </div>
            </div>
        </div>	
	</div>
	


</body>

</html>
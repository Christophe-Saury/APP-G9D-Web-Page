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
    if (!$fonction == 0){
        echo 'erreur';
    }
?>


<head>
	<title>Page d'affichage des résultats utilisateur - Carte Chantier</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css_resultats/utilisateurCarteChantier.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>
	<div class="corps">
		<div>
            <?php include("steper.php") ?>
		</div>
        <div class="central">
            <div class="corpsCentral">
                <header>
                    <div class="localisation">
                        Localisation
                    </div>
                    <div class="Température capteur">
                        <ul>
                            <li>Température : </li>
                            <li>Valeur</li>
                            <i class="material-icons" style="font-size: 30px; color:green">thermostat</i>
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
                <div style = "height : 75px; width = 100%; background-color : azure;">
                    <p style="margin : auto; padding : auto; font-size : 30px">
				    <?php
				    echo date('d/m/Y H:i:s', $hour); // Date actuelle à l'ouverture de la page
				    ?>
			        </p>
                </div>
                <div class="corpsCentral">
                    <div class="corpsCentralCarte">
                        <img src=https://www.bati-solar.fr/wp-content/uploads/2018/10/nos-maisons-plans-chatellerault-poitiers-plans-des-maisons-dhabitation-plans-des-maisons.jpg style="width : 100%;opacity: 0.5;" alt="CarteChantier" usemap="#CarteChantier1">
                        <map name="CarteChantier1">
                            <area shape="rect" coords="0 0 410 310" alt="Chambre 1" href="#chambre1.htm">
                            <area shape="rect" coords="0 310 310 690" alt="Garage" href="#garage.htm">
                            <area shape="rect" coords="310 310 780 680" alt="Salon" href="#salon.htm">
                            <area shape="rect" coords="410 0 770 310" alt="Terrasse" href="#terrasse.htm">
                            <area shape="rect" coords="770 0 1200 460" alt="Chambres23" href="#chambres23.htm">
                            <area shape="rect" coords="770 460 1200 690" alt="Cuisine" href="#cuisine.htm">
                        </map>
                    </div>	
                </div>
            </div>	
        </div>
    </div>
	


</body>

</html>
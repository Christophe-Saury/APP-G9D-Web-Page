

<?php
include('head/head_gaCapteursFixes.php');
include 'headers-footer/navbar.php';

    if (!isset($_POST['page']) || $_POST['page'] != 2){
        $_POST['page'] = 2;
        require("../C/index.php");
    }
?>


<br><br>
<body>
	<div class="corps">
        <div>
            <?php include_once("steperGA.php") ?>
		</div>
		<div class="corpsCentral">
            <div class="headerCentral">
                <p style="font-size: 40px; margin : auto; padding : auto;">
				<?php
				echo date('d/m/Y H:i', $hour);// Date actuelle à l'ouverture de la page
				?>
                </p>
				<button id="archive" style="width : 200px; border: 2px solid #3d8bcd; margin: 10px auto;padding: 10px; text-align : center; background-color:white; cursor : pointer;">
					Archiver les valeurs anciennes
                </button>
                <script>
                    let AR = document.getElementById('archive');
                    let fonction = <?php echo $fonction?>;
                    if (fonction == 1){
                        AR.style.visibility = "hidden"; 
                    }
                    AR.addEventListener('click', function() {
                        window.location.href = "?VS=" + 1000;
                    });
                </script>
            </div>
            <table class="tableauRésultats">
                <tr class="entete">  
                    <th>Chantier</th>
                    <th>Température</th>
                    <th>Humidité</th>
                    <th>Bruit</th>
                    <th>CO2</th>
                </tr>
                <?php 
                foreach($resultatsCapteursFixes as $RCF) {
                    $temperature = $RCF[1]; // Valeur température
                    $couleurTemperature = associationCouleur(couleur('temperature'),$temperature); // Couleur associée à la température
                    $humidite = $RCF[2]; // Valeur humidité
                    $couleurHumidite = associationCouleur(couleur('humidite'),$humidite); // Couleur associée à l'humidité
                    $bruit = $RCF[3]; // Valeur bruit
                    $couleurBruit = associationCouleur(couleur('bruit'),$bruit); // Couleur associée au bruit
                    $co2 = $RCF[4]; // Valeur CO2
                    $couleurCo2 = associationCouleur(couleur('co2'),$co2); // Couleur associée au CO2
                    echo "<tr>
                    <td>{$RCF[0]}</td>
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
<br><br>
<?php

include 'headers-footer/footer.php';

?>
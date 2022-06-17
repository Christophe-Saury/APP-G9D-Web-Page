

<?php
include('head/head_util_CaptFixe.php');
include 'headers-footer/navbar.php';


	if (!isset($_POST['page']) || $_POST['page'] != 2){
		$_POST['page'] = 2;
		require("../C/index.php");
	}



 	// Récupérer les valeurs du capteur fixe associé à l'utilisateur
 	$valeursFixes = requeteVariables($requeteValeursFixes, ['id_capteur','jour'], [$posteTravail, $day]);
 	foreach($valeursFixes as $vF){
		$temp = $vF[0];
		$hum = $vF[1];
		$bruit = $vF[2];
		$co2 = $vF[3];
 	}
?>




<body>
	
	<div class="corps">
		<div>
            <?php include("steper.php") ?>
		</div>
		<div class="central">
			<header>
				<p style="margin : auto; padding : auto; font-size : 30px">
				<?php
				echo date('d/m/Y H:i', $hour); // Date actuelle à l'ouverture de la page
				?>
				</p>
				<div class="boutonsCentral">
					<a href = "../projet/mesures_cardiaque.ibd" download="Fichier Base de Données"> Téléchargement</a>
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
<br><br>
<?php 
        include 'headers-footer/footer.php';

        ?>

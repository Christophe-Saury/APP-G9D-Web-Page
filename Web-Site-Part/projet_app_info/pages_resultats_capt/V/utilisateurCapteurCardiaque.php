

<?php

	if (!isset($_POST['page']) || $_POST['page'] != 1){
		$_POST['page'] = 1;
		require("../C/index.php");
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
					<a href = "../projet/mesures_cardiaque.ibd" download="Fichier Base de Données">Téléchargement</a>
				</div>
			</header>
			<div class="corpsCentral" style="flex-direction:row">
				<div class="capteurCardiaque capteur">
					<header>
						Votre rythme cardiaque actuel
					</header>
					<?php
						foreach($rythmeCardiaqueUtilisateur as $rCU) { 						
							$grandeur = 'frequence';
							$coul = couleur($grandeur);
							$borderColor = associationCouleur($coul,$rCU[0]);
							echo "<div style=border-color:$borderColor> $rCU[0] bpm</div>";
						} // Rythme cardiaque actuel
					?>
				</div>
				<div class="capteurCardiaqueMoyenne capteur">
					<header>
						Votre rythme cardiaque moyen sur la dernière heure
					</header>
					<?php
						foreach($rythmeCardiaqueMoyen as $rCMoy) { 						
							$grandeur = 'frequence';
							$coul = couleur($grandeur);
							$borderColor = associationCouleur($coul,$rCMoy[0]);
							echo "<div style=border-color:$borderColor> $rCMoy[0] bpm</div>";
						} // Rythme cardiaque moyen sur la dernière heure
					?>
				</div>
				<div class="capteurCardiaqueMax capteur">
					<header>
						Rythme cardiaque maximal mesuré sur la dernière heure
					</header>
					<?php
						foreach($rythmeCardiaqueMax as $rCMax) { 						
							$grandeur = 'frequenceMax';
							$coul = couleur($grandeur);
							$borderColor = associationCouleur($coul,$rCMax[0]);
							echo "<div style=border-color:$borderColor> $rCMax[0] bpm</div>";
						} // Rythme cardiaque maximal sur la dernière heure
					?>
				</div>
				<div class="compteurCardiaque capteur">
					<header>
						Temps de stress
					</header>
					<?php
						foreach($tempsDanger as $tD) {
							$grandeur = 'temps';
							$coul = couleur($grandeur);
							$temps = $tD[0]*$periodeMesureCardiaque;
							$borderColor = associationCouleur($coul,$temps);
							$result = date('H:i:s',$temps-3600);
							echo "<div style=border-color:$borderColor> $result</div>";
						}
					?>
				</div>
			</div>				
		</div>
	</div>

</body>


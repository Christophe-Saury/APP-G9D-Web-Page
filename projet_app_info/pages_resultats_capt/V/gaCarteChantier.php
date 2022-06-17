
<?php
include('head/head_gaCapteursFixes.php');
include 'headers-footer/navbar.php';
    if (!isset($_POST['page']) || $_POST['page'] != 3){
        $_POST['page'] = 3;
        require_once("../C/index.php");
    }
    if (isset($_GET['idcarte'])){
        require_once("../C/index.php");
    }

?>

<br><br>

<body>
	<div class="corps">
		<div class="corpsGauche" style="flex-direction: 1;">
            <div>
                <?php include_once("steperGA.php") ?>
		    </div>
		</div>

		<div class="corpsCentral"  style="flex-direction: 10;"> 
            <header style="	display: flex;
	                        flex-direction: row;
                            width: 100%;
                            text-align: center;
                            font-size: auto;
                            font-style: italic;
                            padding-top: 20px;
                            padding-bottom: 20px;
                            background-color: azure;
                            border-bottom:1px solid #3d8bcd ;
                            border-left: 1px solid #3d8bcd;
                            border-right: 1px solid #3d8bcd;">
                <div class="localisation" style="flex-grow: 1;">
                    <?php 
                    echo "Chantier n° : ";
                    echo $posteCarte;
                    ?>
                </div>
                <div class="Température capteur" style="flex-grow: 1;">
                    <ul style='list-style: none;margin: 0;padding: 0;'>
                        <?php
                            $grandeur = 'temperature';
                            $coul = couleur($grandeur);
                            $Color = associationCouleur($coul,$temperatureC);
                            echo "<li style='font-size: 20px;list-style: none;'>Température :</li>";
                            echo "<li style='font-size: 20px;list-style: none;'>$temperatureC °</li>";
                            echo "<i class='material-icons' style='font-size: 30px; color:$Color'>thermostat</i>";
                        ?> 
                    </ul>
                </div>
                <div class="CO2 capteur" style="flex-grow: 1;">
                    <ul style='list-style: none;margin: 0;padding: 0;'>
                        <?php
                            $grandeur = 'co2';
                            $coul = couleur($grandeur);
                            $Color = associationCouleur($coul,$co2C);
                            echo "<li style='font-size: 20px;list-style: none;'>CO2 :</li>";
                            echo "<li style='font-size: 20px;list-style: none;'>$co2C ppm</li>";
                            echo "<i class='material-icons' style='font-size: 30px; color:$Color'>co2</i>";
                        ?> 
                    </ul>
                </div>
                <div class="Humidité capteur" style="flex-grow: 1;">
                    <ul style='list-style: none;margin: 0;padding: 0;'>
                        <?php
                            $grandeur = 'humidite';
                            $coul = couleur($grandeur);
                            $Color = associationCouleur($coul,$humiditeC);
                            echo "<li style='font-size: 20px;list-style: none;'>Humidité :</li>";
                            echo "<li style='font-size: 20px;list-style: none;'>$humiditeC %</li>";
                            echo "<i class='material-icons' style='font-size: 30px; color:$Color'>water_drop</i>";
                        ?>
                    </ul>
                </div>
                <div class="Bruit capteur"  style="flex-grow: 1;">
                    <ul style='list-style: none;margin: 0;padding: 0;'>
                        <?php
                            $grandeur = 'bruit';
                            $coul = couleur($grandeur);
                            $Color = associationCouleur($coul,$bruitC);
                            echo "<li style='font-size: 20px;list-style: none;'>Bruit :</li>";
                            echo "<li style='font-size: 20px;list-style: none;'>$bruitC dB</li>";
                            echo "<i class='material-icons' style='font-size: 30px; color:$Color'>hearing_disabled</i>";
                        ?>
                    </ul>
                </div>
            </header>
            <div class="corpsCentral">
                <div class="corpsCentralCarte" style="display:flex; flex-direction : row; flex-wrap : wrap;">
                    <?php 
                    require("../M/cartes.php");
                        afficheCartes();
                    ?>
                </div>
                <script>
                    let maxIDChantier = <?php echo "$maxIDChantier"?>;
                    for (let i = 1 ; i < maxIDChantier + 1 ; i++){      
                        const carte = document.getElementById(i);
                        carte.addEventListener('click', function() {
                            window.location.href = "?idcarte=" + this.id;
                        });
                    }
                </script>
            </div>
        </div>
	</div>



</body>

<br><br>

<?php 
        include 'headers-footer/footer.php';

        ?>
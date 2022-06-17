


<?php
    if (!isset($_POST['page']) || $_POST['page'] != 1){
        $_POST['page'] = 1;
        require("../C/index.php");
    }
    if (isset($_GET['VS'])){
        require_once("../C/index.php");
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
                    <th>NOM</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                    <th>Temps de stress</th>
                </tr>
                <?php
                    foreach($resultat as $r) {
                        $temps = ($r[3]-1) * $periodeMesureCardiaque; // Multiplication du nombre de mesures au-dessus du seuil part l'intervalle de temps entre chaque mesure
                        // On effectue "$client2[3]-1" puisque pour afficher les nomsdes personnes ne dépassant jamais 0, on doit ajouter 1 ligne > seuil, puis la retirer par la suite
                        $couleurTemps = associationCouleur(couleur('temps'),$temps);
                        echo "<tr>      
                        <td>{$r[0]}</td>
                        <td>{$r[1]}</td>
                        <td>{$r[2]}</td>
                        <td style ='justify-content :center;'>
                        <i class='material-icons' style='font-size: 30px; color: $couleurTemps; margin:0;margin-right: 30px;'>health_and_safety</i>".date('H:i:s',$temps-3600)."
                        </td> 
                        </tr>";
                    } //"$periodeMesureCardiaque - 3600 car Le H prend automatiquement la valeur 1
                    requeteSimple($reqSuppression1000bpm); // Supprimer la ligne 1000bpm
                ?>
            </table>
		</div>
	</div>	

</body>

<br><br>


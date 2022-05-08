<!Doctype html>
<html>
	<head>
		<title> Gestion_des profils_admin/William.php </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width , initial-scale = 1.0">
		<link href ="Gestionprofil.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        // Code HTML du formulaire
		<div id="div1" class="grosdiv">
			<div id="div2" class="divprofil"> 
			
			<img src="photoCV.JPG" width=100 height=100 id="grandimageprofil"/>
                <?php
                $id_user;
                $prenom_user = "William";
                $nom_user ="Mbollo Mbassy";
				echo"<table id='tableUser'>";
                echo("<tr class='USER'> <td class='tdprofile'>Résultat de la recherche</td> </tr>");
					echo("<tr class='USER'> <td class='tdprofile'>".$prenom_user." ".$nom_user."</td> </tr>");
					echo("<tr class='USER'> <td class='tdprofile'> Historique d'alertes </td> </tr>");
					echo("<tr class='USER'> <td class='tdprofile'> Changer de rôle </td>  </tr>");
					echo("<tr class='USER'> <td class='tdprofile'> Envoyer un mail </td> </tr>");
				echo"</table>";
                ?>
                
			
			</div>
			
			<div id="div3" class="moydiv">

                <!-- Divisionn pour pouvoir effectuer les recherches de profil  -->
				<div id="div4" class="divrecherche">
				    <form action="Gestion_des_profils_admin.php" method="post" id="form1">
				    <input class="inputprofile" type="text" name="Prenom" placeholder="Chercher un profil"/>	
				    </form>
				</div>
                <?php
                        // Partie connexion à la Base de Données
                        error_reporting(E_ERROR | E_PARSE);
                        if ($_SERVER["REQUEST_METHOD"] == "POST")

                        // identifiants mysql
                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "gestion_profil";
                
                        
                        $Prenom = $_POST["Prenom"];
                
                        if(!isset($Prenom)) {
                            die("Veuillez entrer un prenom");
                        }

                        // Ouvrir une nouvelle connexion au MYSQL server
                        $mysqli = new mysqli($host, $username, $password, $database);
                
                        //Afficher toute erreur de connexion
                        if ($mysqli->connect_error) {
                        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
                        }  

                        // Preparer la requête SQL

                ?>

            
				<div class="tableau">	
					<?php 
                     // Partie affichage des résultats de la recherche dans un tableau
                    $statement = $mysqli -> prepare("SELECT * FROM utilisateur WHERE Prenom LIKE ? LIMIT 5");
                    $Prenom = '%'.$Prenom.'%';
                    $statement -> bind_param('s',$Prenom);
                    $statement->execute();
                    $result = $statement->get_result();
                    
                    
                    if (mysqli_num_rows($result)>0) {
                        echo " <tr id='tr1'> <td> Résultat de la recherche </td> </tr>";
                        while($row = mysqli_fetch_assoc($result)){ 
                        echo"<table>";
                        echo "<tr id='tr2'> <td> <form action = 'ProfilParticulier.php' method='post'> <button name='BoutonProfil'id ='userimage'><img src='ProfilParticulier.JPEG' width=30 height=30p /></button></form></td> <td>".$row['Prenom'].",".$row['Nom'].",</td> <td>".$row['Role'].",</td> <td>".$row['age'].",</td> <td>".$row['ancienneté']."</td></tr>\n";
                        echo "</table>";
                    }
                        
                    }
                    else {echo "0 resultats";}

                    mysqli_close ($mysqli);
				   
                   ?>
				</div>	
			</div>
			<div id="div6"> <p class="texte1" > Conditions Générales d'Utilisation. Nous contacter </p> </div>
		</div>
	</body>
</html>
<!Doctype html>
<html>
	<head>
		<title> Modifier son profil </title>
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
                // On va récupérer le nom, le prénom et l'id à partir de la session précédente
                $user_data = get_session_editerprofil();
                $id = $user_data['id'];
                $prenom = $user_data['prenom'];
                $nom = $user_data['nom'];
                $role = $user_data['role'];
                ?>
                
			
			</div>
			
			<div id="div3" class="moydiv">

                <?php
                        // Partie connexion à la Base de Données
                        error_reporting(E_ERROR | E_PARSE);
                        if ($_SERVER["REQUEST_METHOD"] == "POST")

                        // identifiants mysql
                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "gestion_profil";
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
				</div>	
			</div>
			<div id="div6"> <p class="texte1" > Conditions Générales d'Utilisation. Nous contacter </p> </div>
		</div>
	</body>
</html>
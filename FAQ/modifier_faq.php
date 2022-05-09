<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<head>
    <title> Hello </title>
</head>
    <body>
        <?php
        // Vérifie que le formulaire provient d'un POST
        if ($_SERVER["REQUEST_METHOD"] == "POST")

        // identifiants mysql
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "faq";

        // Variables récupérées via le formulaire
        $modsujet = $_POST["modsujet"];
        $modContenu = $_POST["modContenu"];
        

        if(!isset($modsujet)) {
            die("S'il vous plaît entrer un sujet");
        }
        if(!isset($modContenu)) {
            die("S'il vous plaît entrer le contenu de la question");
        }
        // Ouvrir une nouvelle connexion au MYSQL server
        $mysqli = new mysqli($host, $username, $password, $database);

        //Afficher toute erreur de connexion
        if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }  

        //préparer la requête d'insertion SQL
        $statement = $mysqli->prepare("UPDATE `questions` SET `Contenu` = ? WHERE `questions`.`sujet` = ? ;"); 

        //Associer les valeurs et exécuter la requête d'insertion
        $statement->bind_param('ss', $modContenu, $modsujet); 

       if($statement->execute()){
        print "Sujet: " . $modsujet . "Nouveau contenu: ". $modContenu;
        }else{
        print $mysqli->error; 
        }
        header("Location: modiFAQ.html");
        ?>
    </body>
    </html>
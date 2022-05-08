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
        $sujet = $_POST["sujet"];
        $Contenu = $_POST["Contenu"];

        if(!isset($sujet)) {
            die("S'il vous plaît entrer un sujet");
        }
        if(!isset($Contenu)) {
            die("S'il vous plaît entrer le contenu de la question");
        }
        // Ouvrir une nouvelle connexion au MYSQL server
        $mysqli = new mysqli($host, $username, $password, $database);

        //Afficher toute erreur de connexion
        if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }  

        //préparer la requête d'insertion SQL et récuper le dernier id +1 dans la table question 
        $statement1 = $mysqli -> prepare(" SELECT MAX(id_question)+1 FROM questions") ;
        $statement1 -> execute();
        $result1 = $statement1-> get_result();
        $row = mysqli_fetch_assoc($result1) ;
        $row = $row['MAX(id_question)+1'];

        $statement = $mysqli->prepare("INSERT INTO questions (id_question,sujet, Contenu) VALUES(?,?,?)"); 

        //Associer les valeurs et exécuter la requête d'insertion
        $statement->bind_param('iss',$row,$sujet,$Contenu); 

        if($statement->execute()) {
                print "Sujet: " . $sujet . "Contenu: ". $Contenu;
        }
        else{
        print $mysqli->error; 
        }
        header("Location: AjouFAQ.html");
        ?>
    </body>
    </html>
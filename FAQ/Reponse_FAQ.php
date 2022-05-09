<!DOCTYPE html>
<html>
<head>
    <title> Réponses FAQ </title>
</head>
    <body>
        <?php
         error_reporting(E_ERROR | E_PARSE);
        // Vérifie que le formulaire provient d'un POST
        if ($_SERVER["REQUEST_METHOD"] == "POST")

        // identifiants mysql
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "faq";

        // Variables récupérées dans via le formulaire 
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

        //préparer la requête d'insertion SQL et récuper le dernier id +1 dans la table reponses 
        $statement1 = $mysqli -> prepare(" SELECT MAX(id_reponse)+1 FROM reponses") ;
        $statement1 -> execute();              // on exécute la requête précédente 
        $result1 = $statement1-> get_result(); // on obtient les résultats de la requête précédente
        $row = mysqli_fetch_assoc($result1);
        $id_reponse = $row['MAX(id_reponse)+1'];

        // Récupérer l'id question associé au sujet de la réponse s'il y a une correspondance sinon recommencer
        $statement2 = $mysqli -> prepare(" SELECT id_question FROM questions WHERE sujet = ?") ;
        $statement2 -> bind_param('s',$sujet);
        $statement2 -> execute();
        $result2 = $statement2-> get_result();

        // en cas de résultat non null sereinement rechercher l'id de la question correspondant au sujet 
        if (isset($result2)){
            $row = mysqli_fetch_assoc($result2) ;
            $id_question = $row['id_question'];

            // On se prépare à ajouter la nouvelle réponse dans notre base de données de reponses
            $statement = $mysqli->prepare("INSERT INTO reponses (id_reponse,Contenu,id_question) VALUES(?,?,?)"); 

            //Associer les valeurs et exécuter la requête d'insertion
            $statement->bind_param('iss',$id_reponse,$Contenu,$id_question); 
            
        }
        if (!isset(mysqli_fetch_assoc($result2)['id_question'])){
           
            die("<p> S'il vous palit veuillez entrer un sujet préexistant, pour se faire vous pouvez vous référer à la FAQ <br/>
            <a href> Lien pour accéder à la FAQ <a>");
        }

        if($statement->execute()) {
                print "Sujet: " . $sujet . "Contenu: ". $Contenu;
        }
        else{
        print $mysqli->error; 
        }
        
        ?>
    </body>
    </html>
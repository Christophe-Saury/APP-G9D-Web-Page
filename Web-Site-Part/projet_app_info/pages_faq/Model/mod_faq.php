<?php
       
        // Vérifie que le formulaire provient d'un POST
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // identifiants de la base de donée mysql
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "isep";

        // Variables récupérées dans via le formulaire
        $ID = htmlspecialchars((string)$_POST["id"]); 
        $Categorie = $_POST["Categorie"];
        $Contenu_question = $_POST["Contenu_question"];
        $Contenu_question = htmlspecialchars(($Contenu_question));
        $Contenu_reponse = $_POST["Contenu_reponse"];
        $Contenu_reponse = htmlspecialchars(($Contenu_reponse)); 

        echo($ID."<br/>");
        echo($Categorie."<br/>");
        echo($Contenu_question."<br/>");
        echo($Contenu_reponse);


       
        $mysqli = new mysqli($host, $username, $password, $database);


        //Afficher toute erreur de connexion

        if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }  

        $statement2 = $mysqli -> prepare("UPDATE faq SET Questions  = ?, Reponses = ? ,categories = ? WHERE id_FAQ = ?;");
        $statement2 -> bind_param('ssss',$Contenu_question,$Contenu_reponse,$Categorie,$ID);
        $statement2 -> execute();
        echo("OKAY");
        

        header( "Location: ../View/FAQ/Page_visualiser_FAQ.php");
        //header('http://localhost/ISEPAPP1/William/View/FAQ/Page_visualiser_FAQ.php');
    }
      ?>

    </body>
    </html>
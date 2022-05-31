<?php
        // Vérifie que le formulaire provient d'un POST
        if ($_SERVER["REQUEST_METHOD"] == "POST")

        // identifiants mysql
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "isep";
       
        $mysqli = new mysqli($host, $username, $password, $database);


        //Afficher toute erreur de connexion

        if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }  
        ///////////////////////////////////////////////////////////////////////////////


         /* Récupération dans des variables,
        des données issues du formulaire
        */
        
        $ID = $_POST["newid"]; 
        $Categorie = $_POST["Categorie"];
        $Contenu_question = $_POST["Contenu_question"];
        $Contenu_question = htmlspecialchars(nl2br($Contenu_question));
        $Contenu_reponse = $_POST["Contenu_reponse"];
        $Contenu_reponse = htmlspecialchars(nl2br($Contenu_reponse)); 


        $statement2 = $mysqli -> prepare("UPDATE `faq` SET `Questions`= '?',`Reponses`= '?' ,`categories`= '?' WHERE id_FAQ = ?;");
        $statement2 -> bind_param('sssi',$Contenu_question,$Contenu_reponse,$Categorie,$ID);
        $statement2 -> execute();
        echo("OKAY");


       // Redirection vers la page Page_questions_reponses
        header('Location:http://localhost/ISEPAPP1/William/View/FAQ/Page_questions_reponses.html');
        ?>

    </body>
    </html>
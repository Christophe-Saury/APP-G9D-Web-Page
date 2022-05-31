<?php
        include "connexion_mysqli.php";

        error_reporting(E_ERROR | E_PARSE);
        // Vérifie que le formulaire provient d'un POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
       

        // Variables récupérées dans via le formulaire 
        $Categorie = $_POST["Categorie"];
        $Contenu_question = $_POST["Contenu_question"];
        $Contenu_question = htmlspecialchars(nl2br($Contenu_question));
        $Contenu_reponse = $_POST["Contenu_reponse"];
        $Contenu_reponse = htmlspecialchars(nl2br($Contenu_reponse)); 

        echo($Categorie."<br/>".$Contenu_question."<br/>");
        
        //préparer la requête d'insertion SQL et récuper le dernier id +1 dans la table reponses

        $statement1 = $mysqli -> prepare(" SELECT MAX(id_FAQ)+1 FROM faq") ;
        $statement1 -> execute();              // on exécute la requête précédente 
        $result1 = $statement1-> get_result(); // on obtient les résultats de la requête précédente
        $row = mysqli_fetch_assoc($result1);
        $id_FAQ = $row['MAX(id_FAQ)+1'];


        
         //Récupérer l'id question associé au sujet de la réponse s'il y a une correspondance sinon recommencer


        $statement2 = $mysqli -> prepare("INSERT INTO faq(id_FAQ,Questions,Reponses,categories) VALUES (?, ?, ?,?);");
        $statement2 -> bind_param('isss',$id_FAQ,$Contenu_question,$Contenu_reponse,$Categorie);
        $statement2 -> execute();
        echo("OKAY");
        }


       
        header('Location:../View/FAQ/Page_questions_reponses.php');
?>

<?php
/* Fichier servant à la suppression des questions et réponse de la faq à partir de l'ID
Dès que l'ID est reçu, la ligne de la table correspondnat est supprimée 
*/
    include("../Controller/connexion.php");
    
    if (isset($_POST["id"])){
        $ID = $_POST["id"];
        $stmt = $pdo -> prepare("DELETE FROM faq WHERE id_FAQ = :id ");
        $stmt -> bindParam(':id', $ID);
        $stmt -> execute();
        header("Location: ../View/FAQ/Page_visualiser_FAQ.php");
    } 
?>
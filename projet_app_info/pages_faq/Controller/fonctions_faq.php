<?php 

    include("connexion.php");
    function select_categorie($pdo,$categories){ //Selectionne les questions et les reponses dans une catégorie

    $stmt1 = $pdo -> prepare("SELECT Questions,Reponses FROM `faq` WHERE  categories = :categories;");
	//$stmt1 -> bindParam(':id',$id);
	$stmt1 ->bindParam(':categories',$categories);
	$stmt1 -> execute();
	$array_PDO = [$stmt1] ;
	return $array_PDO ;
}
?>
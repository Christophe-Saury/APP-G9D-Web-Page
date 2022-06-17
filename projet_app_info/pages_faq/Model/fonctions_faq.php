<?php 
	
    function select_categorie($pdo,$categories){ //Selectionne les questions et les reponses dans une catégorie et les affiche

    $stmt1 = $pdo -> prepare("SELECT Questions,Reponses FROM `faq` WHERE  categories = :categories;");
	$stmt1 ->bindParam(':categories',$categories);
	$stmt1 -> execute();
	foreach ($stmt1 as $row1){
		echo("<p class =\"questions\">".$row1['Questions']."</p><br/>");
		echo("<p class=\"reponses\"> Réponse: ".$row1['Reponses']."<br/></p>");
	}
	}
?>
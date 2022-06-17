<!DOCTYPE html>
<html>
	<?php include('../M/constants.php');
	?>


<head>
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Capteurs fixes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css_resultats/gaCapteursFixes.css">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    	<?php 
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $periodeMesureFixe; url=$page");
	?>
</head>

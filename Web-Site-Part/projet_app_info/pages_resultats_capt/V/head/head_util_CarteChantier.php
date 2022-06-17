<!DOCTYPE html>
<html>
	<?php
include('../M/constants.php');
?>

<head>
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Carte Chantier</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css_resultats/gaCarteChantier.css">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    	<?php 
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $periodeMesureFixe; url=$page");
	?>
</head>

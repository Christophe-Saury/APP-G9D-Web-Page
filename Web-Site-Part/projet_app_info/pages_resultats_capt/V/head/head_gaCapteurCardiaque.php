<!DOCTYPE html>
<html>

<head>
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Capteur</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../V/css_resultats/gaCapteursFixes.css">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    	<?php
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $periodeMesureCardiaque; url=$page");
	?>
</head>
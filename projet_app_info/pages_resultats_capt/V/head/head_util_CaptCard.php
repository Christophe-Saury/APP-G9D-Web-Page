<!DOCTYPE html>
<html>

<head>
	<title>Page d'affichage des résultats utilisateur - Capteur</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../V/css_resultats/utilisateurCapteurCardiaque.css">	
    	<?php 
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $periodeMesureFixe; url=$page");
	?>
</head>
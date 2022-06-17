<!DOCTYPE html>
<html>
<?php
include('../M/constants.php');
?>
<head>
	<title>Page d'affichage des résultats utilisateur - Capteurs fixes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css_resultats/utilisateurCapteurCardiaque.css">
    	<?php 
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $periodeMesureFixe; url=$page");
	?>
</head>
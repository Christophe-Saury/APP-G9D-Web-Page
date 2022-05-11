<?php
//connexion à la bdd
try
{
	$bdd = new PDO("mysql:host=localhost;dbname=page_ticketing", "root", "");
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>
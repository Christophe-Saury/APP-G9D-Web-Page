<?php
//connexion à la bdd
try
{
	$bdd = new PDO("mysql:host=localhost;dbname=isep", "root", "");
}
catch (Exception $e)
{
        include 'page_erreur.php';
        die();
}

?>
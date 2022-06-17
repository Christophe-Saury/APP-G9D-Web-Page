<?php
// Page PHP servant de base pour les autres fichiers pour la connexion à la bdd

/*Méthode de gestion des erreurs, la plupart des types d'erreurs rencontrés 
sont évités gràace aux lignes suivantes */
try
{
$dsn = "mysql:host=localhost;dbname=isep;charset=utf8";
// récupérer tous les utilisateurs de la bdd 

$sql = "SELECT * FROM utilisateur";
$opt = array(
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, 'root','', $opt);
}
catch (Exception $e)
{
        include 'page_erreur.php';
        die();
}

?>
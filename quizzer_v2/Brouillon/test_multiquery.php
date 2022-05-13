<?php// test multiquery


//Create connection credentials
$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = '121212aa';

//Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error Handler
if($mysqli->connect_error){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}




 // queries
$query  = "SELECT CURRENT_USER();";
$query .= "SELECT id_user_etr FROM score_user ORDER BY ID LIMIT 20, 5";
 
/* Exécution d'une requête multiple */
if ($mysqli->multi_query($query)) {
	do {
		/* Stockage du premier résultat */
		if ($result = $mysqli->store_result()) {
			while ($row = $result->fetch_row()) {
				printf("%s\n", $row[0]);
			}
			$result->free();
		}
		/* Affichage d'une séparation */
		if ($mysqli->more_results()) {
			printf("-----------------\n");
		}
	} while ($mysqli->next_result());
}
 
/* Fermeture de la connexion */
$mysqli->close();
?>





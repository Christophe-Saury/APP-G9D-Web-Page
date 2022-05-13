<?php
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
   
  // $results = $mysqli->prepare($query) or die($mysqli->error.__LINE__);
$id_user =1;
$score=4;


  $query = 'UPDATE utilisateur SET score = ? WHERE id_user = ?';
  $deleteRecipeStatement = $mysqli->prepare($query);
  $deleteRecipeStatement->bind_param("ss", $score, $id_user);

  $deleteRecipeStatement->execute() or die($mysqli->error.__LINE__);


   


  
   echo "Edited data successfully\n";




?>
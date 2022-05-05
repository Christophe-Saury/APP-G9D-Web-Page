<?php

// Get all questions
function recupereTousQuestions(PDO $bdd): array {
$query = "SELECT * FROM questions";
return $bdd->query($query)->fetchAll();
}


// Get total questions
function getTotalNbQuestions(){
    $query = "SELECT * FROM questions";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    return $total;
}


?>
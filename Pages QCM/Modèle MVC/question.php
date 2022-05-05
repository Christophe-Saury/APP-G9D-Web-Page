<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

//Set Question number
$number = (int) $_GET['n'];


// Get total questions

$query = "SELECT * FROM questions";

// Get result
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;



// Get question

$query = "SELECT * FROM questions
            WHERE question_number = $number";

// Get result
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question = $result->fetch_assoc();


// Get Choices

$query = "SELECT * FROM choices
            WHERE question_number = $number";

// Get results
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);


?>


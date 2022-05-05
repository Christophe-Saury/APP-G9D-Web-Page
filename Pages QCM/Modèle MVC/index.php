<?php include 'database.php'; ?>

<?php
// Get Total Questions
$query = "SELECT * FROM questions";

//Get Results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;



?>



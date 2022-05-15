<?php include("database.php"); ?>
<?php
$i=1;
$number =1;


// Get Total Questions
$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total_quest = $results->num_rows;
//fin index.php
/*
while($number<=$total_quest){
// Get question
$query = "SELECT * FROM questions
            WHERE question_number = $number";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();



$number++;
}
*/




// Get questions
$query = "SELECT * FROM questions
            ";
// Make array of choices id
$retval = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question_id_arr = array();
$question_text_arr = array();

while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $question_id_arr[]=$row[0];
    $question_text_arr[]=$row[1];
}







// Get Choices
$query = "SELECT * FROM choices
          ";
// Make array of choices id
$retval = $mysqli->query($query) or die($mysqli->error.__LINE__);
$choices_id_arr = array();
$choices_text_arr = array();
$iscorrect_arr = array();

while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $choices_id_arr[]=$row[0];
    $choices_text_arr[]=$row[3];
    $iscorrect_arr[]=$row[2];
}


print_r($iscorrect_arr);





?>











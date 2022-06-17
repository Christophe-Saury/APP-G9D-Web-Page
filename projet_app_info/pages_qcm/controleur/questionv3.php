<?php include '../modele/database.php'; 
require '../modele/Requetes_sql_qcm.php';
?>

<?php 

session_start();
$id_utilisateur = $_SESSION['user_id'];
$role_utilisateur = $_SESSION['role'];


// Variable def
$i=0;
$qp=(string) $_GET['qp']; //Gets string that indicates the number of the questions already answered
$quest_number = (int) $_GET['n']; // Progression of qcm = Number of questions answered + 1
// arrays
$question_nb_arr = array(); // array with all the question numbers
$qp_nb_arr=array(); // array that will have the number of the questions already answered
$final_quest_arr = array(); // array that will have the question numbers of the questions that haven't been answered



// --------------------------------------------
// We want to update an array that will contain the question numbers so that only the unanswered questions are in that list
// We do this so that we can then randomize the questions in the qcm

// First step is to get a list of answered questions


//Separate the numbers in string qp to get all the previously answered questions
$qp_split= str_split($qp, 2);
//Store the separate results in an array
while($i<count($qp_split)){
    $qp_nb_arr[]=intval($qp_split[$i]);
    $i++;
}



// Get all the questions
$retval = Get_questionscontent($mysqli);
$total_quest = $retval->num_rows;
// Put the answered question numbers in an array
while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $question_nb_arr[]=$row[0];
}



// --------------------------------------------

// Second step is to get a list of unanswered questions


// Put into the final_quest_arr only the question numbers of the questions that haven't been answered
$question_nb_arr = array_diff($question_nb_arr, $qp_nb_arr);
$final_quest_arr = array_values($question_nb_arr);




// --------------------------------------------
// Fourth step is to randomize the question number gotten from the list of unanswered questions



// get random variable between 0 and total nb of questions -1
$rand_nb = rand(0,count($final_quest_arr)-1);

// get question number corresponding to the random_nb
$act_quest_nb = $final_quest_arr[$rand_nb];



// --------------------------------------------
// Fifth step is to get the content from the question number obtained randomly

// Get question
$result = Get_aquestioncontent($mysqli, $act_quest_nb);
$question = $result->fetch_assoc();

// Get Choices for our random question and store into an array
$retval = Get_achoicescontent($mysqli, $act_quest_nb);
$choices_id_arr = array();
$choices_text_arr = array();

while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $choices_id_arr[]=$row[0];
    $choices_text_arr[]=$row[3];
}

include '../vue/head/head_question_qcm.php';
include '../vue/headers-footer/navbar.php';
include '../vue/vue_question_qcm.php';
include '../vue/headers-footer/footer.php';

?>



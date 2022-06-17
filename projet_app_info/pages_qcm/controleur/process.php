<?php include '../modele/database.php';
require '../modele/Requetes_sql_qcm.php';
?>
<?php 

session_start();


// Check to see if score is set_error_handler
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }

    if($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next = $number+1;
        $rand_quest_numb=$_POST['rand_quest_numb'];
        $str_rand_q = sprintf('%02d', $rand_quest_numb);
        $qp=$_POST['Prev_quests'].$str_rand_q;

        // Get total questions
        $results = Get_questionscontent($mysqli);
        $total_quest = $results->num_rows;

        // Get correct choice
        $result = Get_correctchoice($mysqli, $rand_quest_numb);

        // Get row
        $row = $result->fetch_assoc();

        // set correct choice
        $correct_choice = $row['id'];
        $isprev_choice_corr = 0;

        //Compare
        if($correct_choice == $selected_choice){
            // answer is correct
            $_SESSION['score']++;
            $isprev_choice_corr = 1;
        }

        //Check if last question
        if($number == $total_quest){
            header("Location: Page_qcm.php?page=Score_quiz");
            exit();
        } else {
            header("Location: questionv3.php?n=".$next."&qp=".$qp);
            // header("Location: questionv3.php?n=".$next);
        }
    }


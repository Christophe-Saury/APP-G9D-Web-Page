<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
$previous_post=0;

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
        //sprintf('%02d', $numb); 
echo $rand_quest_numb;
        // Get total questions

    $query = "SELECT * FROM questions";

    // Get result
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;


  //  isPrevCorr($number, $previous_post, $isprev_choice_corr);




        // Get correct choice
        $query = "SELECT * FROM choices WHERE question_number = $rand_quest_numb AND is_correct = 1";
        
        // Get result
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

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
        if($number == $total){
            header("Location: finalv3.php");
            exit();
        } else {
            header("Location: questionv3.php?n=".$next."&qp=".$qp);
            // header("Location: questionv3.php?n=".$next);
        }


    }

/*

    function isPrevCorr($number, $previous_post, $isprev_choice_corr){
        // Check if we did previous question and if the previous score is correct
        if($number == $previous_post & $isprev_choice_corr==1){
            $_SESSION['score']--;
        } else {
            $previous_post = $number;
        } 
    }*/
<?php // Requêtes SQL

include 'database.php'; 
?>
<?php 



// Select Queries :






    //Checking if there's already a question for the question_number : add.php 
    function Check_isthereQuestion(mysqli $mysqli, string $question_number){
        $query = "SELECT * from questions WHERE question_number = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $question_number);
        $stmt->execute()or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        $result = $stmt->get_result();
        return $result;
    }





   



    // Get content from questions : 
    //affichageréponses.php, finalv3, GestionQuest, questionv3 + from (add.php) + (index_quizv2 ) + (process) add.php + affichagereponses + GestionQuestion + questionsv3
    function Get_questionscontent(mysqli $mysqli){
        // Get questions
        $query = "SELECT * FROM questions";
        // Make array of choices id
        $retval = $mysqli->query($query) or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        return $retval;
    }



    // Get content from a question : question
    function Get_aquestioncontent(mysqli $mysqli, int $act_quest_nb){
        $query = "SELECT * FROM questions
                    WHERE question_number = $act_quest_nb";
        $result = $mysqli->query($query) or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        return $result;
    }





    // Get choices content : affichagereponses.php + GestionQuestion
    function Get_choicescontent(mysqli $mysqli){
        // Get Choices{}
        $query = "SELECT * FROM choices
                ";
        // Make array of choices id
        $retval = $mysqli->query($query) or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        return $retval;
    }


    // Get choices content for a question : question
    function Get_achoicescontent(mysqli $mysqli, int $act_quest_nb){
        $query = "SELECT * FROM choices
        WHERE question_number = $act_quest_nb";

        // Make array of choices id
        $retval = $mysqli->query($query) or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        return $retval;
    }





/*
    // Get number of scores for the day : classementv4, tableauscoregest
    function Select_scoreperday(mysqli $mysqli, string $datedujour){
        //Get number of scores for the day
        $sql="SELECT * FROM score_user where jour = ?"; 
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $datedujour);
        $stmt->execute() or die($mysqli->error.__LINE__);
        $result = $stmt->get_result();
        return $result;
    }
*/


    // Get score for the current day and order them in descending order : classement
    function Get_scoreforday_orderbyscore(mysqli $mysqli, string $datedujour){
    $sql="SELECT * FROM `utilisateur`, score_user WHERE utilisateur.id_utilisateur = score_user.id_user_etr AND score_user.jour = ? ORDER BY score_user.score DESC";      
    //SELECT * FROM `utilisateur`, score_user WHERE utilisateur.id_user = score_user.id_user_etr AND score_user.jour = ? ORDER BY score_user.score DESC

    // pour faire lien entre les deux bases de données

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $datedujour);
    $stmt->execute() or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    $result = $stmt->get_result();
    return $result;
    }



    // Check if user has a score for the day : finalv3
    function Check_hasaScore(mysqli $mysqli, int $id_user, string $datedujour){
        $sql = "SELECT * FROM score_user WHERE (id_user_etr = ? AND jour =?);";
        // pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $id_user, $datedujour);
        $stmt->execute() or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        $result = $stmt->get_result();
        return $result;
    }


/*
    //Get number of scores for a user : HistScoreUtil
    function Get_nbScoreForUser(mysqli $mysqli, int $id_user){
        $sql="SELECT * FROM score_user where id_user_etr = ?";    // pour finalv3 :Check if : SELECT * FROM score_user where jour = ?

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_user);
        if($stmt->execute())

        {
            $result = $stmt->get_result();
            $total = $result->num_rows;
        }
        else
        {
            error_log ("Didn't work");
        }
    }
*/



    // Get score for the user and order by date in descending order : HistScoreUtil
    // can maybe get rid of ranking
    function Get_scoreUser_OrderDate(mysqli $mysqli, int $id_user){
        $sql="SELECT * FROM `utilisateur`, score_user WHERE (utilisateur.id_utilisateur = score_user.id_user_etr AND utilisateur.id_utilisateur = ?) ORDER BY score_user.jour DESC";      
        //SELECT * FROM `utilisateur`, score_user WHERE utilisateur.id_user = score_user.id_user_etr AND score_user.jour = ? ORDER BY score_user.score DESC

        // pour faire lien entre les deux bases de données

            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $id_user);
            $stmt->execute() or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
            $result = $stmt->get_result();
            return $result;
    }




    // Get correct choice : process
    function Get_correctchoice(mysqli $mysqli, $rand_quest_numb){
        $query = "SELECT * FROM choices WHERE question_number = $rand_quest_numb AND is_correct = 1";
            
        // Get result
        $result = $mysqli->query($query) or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        return $result;
    }








    

// Insert Queries


    //Insert questions into database : add.php 
    function Insert_intoquestions(mysqli $mysqli, int $question_number, $question_text){
        $query = "INSERT INTO questions (question_number, text)
        VALUES('$question_number','$question_text')";

        // Run query
        $insert_row = $mysqli->query($query) or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
        return $insert_row;
    }


    //Insert questions into database : add.php 
    function Insert_intochoices(mysqli $mysqli, int $question_number, int $is_correct, string $value){
    //Choice query
    $query = "INSERT INTO choices (question_number, is_correct, text) VALUES ('$question_number','$is_correct','$value')";

    //run query
    $insert_row = $mysqli->query($query) or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    return $insert_row;
    }

   

    // Insert Score into database : final
    function Insert_score(mysqli $mysqli, int $score_prcent, int $id_user, string $datedujour){
        $query = 'INSERT INTO score_user(score, id_user_etr, jour) VALUES (?, ?, ?)'; //INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
        //                                                                                  INSERT INTO score_user(score, id_user_etr, jour) VALUES (?, ?, ?);
    
        $insert_query = $mysqli->prepare($query);
        $insert_query->bind_param("iis", $score_prcent, $id_user, $datedujour);
        $insert_query->execute() or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    }








// Update Queries

    // update score in db : final
    function Update_score(mysqli $mysqli, int $score_prcent, int $id_user, string $datedujour){
        $query = 'UPDATE score_user SET score = ? WHERE (id_user_etr = ? AND jour = ?);';
        $update_query = $mysqli->prepare($query);
        $update_query->bind_param("iss", $score_prcent, $id_user, $datedujour);
        $update_query->execute() or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    }




// Delete Queries

    // Delete une question : GestionQuest
    function Delete_question(mysqli $mysqli, int $number){
        // Make post near buttons to execute this and refresh if pressed on delete buttoon
        // Delete query

        $sql = "DELETE FROM questions WHERE question_number = ?;";
        // pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $number);
        $stmt ->execute() or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    }


    // Delete choices corresponding to the question that was deleted : GestionQuestion
    function Delete_choices(mysqli $mysqli, int $number){
        $sql = "DELETE FROM choices WHERE question_number = ?;";
        // pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $number);
        $stmt ->execute() or die("Le site web éprouve des difficultés à se connecter à la base de donnée, veuillez faire monter l'information à administrateur");
    }







   



?>
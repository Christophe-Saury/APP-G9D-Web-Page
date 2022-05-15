<?php include 'database.php'; ?>
<?php session_start(); 



// variables def
$datedujour= date('Y-m-d');//date('Y-m-d')
$id_user =1;
$score= $_SESSION['score'];



// Get Total Questions
$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total_quest = $results->num_rows;
//fin index.php



// Get score en pourcentage
$Mauv_Rep = $total_quest - $score; 
$score_prcent = (($score * 100) - ($score *100) % $total_quest) / $total_quest;




// Check if user has a score for the day
$sql = "SELECT * FROM score_user WHERE (id_user_etr = ? AND jour =?);";
// pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $id_user, $datedujour);
if($stmt->execute())

{
    $result = $stmt->get_result();
    $total_result = $result->num_rows;
}
else
{
    error_log ("Didn't work");
}





// Based on whether there is already a score for the day does a or b
if($total_result == 0){
    // Do : Insert Score into database

    $query = 'INSERT INTO score_user(score, id_user_etr, jour) VALUES (?, ?, ?)'; //INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
    //                                                                                  INSERT INTO score_user(score, id_user_etr, jour) VALUES (?, ?, ?);

    $insert_query = $mysqli->prepare($query);
    $insert_query->bind_param("iis", $score_prcent, $id_user, $datedujour);
    $insert_query->execute() or die($mysqli->error.__LINE__);


} 



else {
    // Do : Update score in db

    $query = 'UPDATE score_user SET score = ? WHERE (id_user_etr = ? AND jour = ?);';
    $update_query = $mysqli->prepare($query);
    $update_query->bind_param("iss", $score_prcent, $id_user, $datedujour);
    $update_query->execute() or die($mysqli->error.__LINE__);
    


}


?>






<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Score</title>
    <link rel="stylesheet" href="css/CSS Page Score.css"/>
    </head>

    <body>
        <header>
        </header>


<!--  Beginning of the body code  -->

<!-- Making of Flexboxes -->

    <!-- for later        <div class="blue_header">
            </div>

-->
        <div class="div_container">

            <br><br>
            <br><br><br>

            <div class="Score">
                <div class="Circle">
                <label class="Score_text">Votre score</label>
                <br><br>
                <label class="Score_text"><?php echo $score_prcent; ?>/100</label>
              </div>
            </div>

            <br><br> <br><br>

            <div class="AnswerRatio_Row">

                <div class="AnswerRatio_Column">
                    <div>
                        <button class="Resultats_Button" type="button">
                        <label class = "Resultats_text"> <?php echo $total_quest; ?> Questions Totales </label>
                        </button>
                    </div>
                    <div>
                        <button class="Resultats_Button" type="button">
                            <label class = "Resultats_text"> <?php echo $score; ?> Bonnes Réponses </label></button>
                    </div>
                    <div>
                        <button class="Resultats_Button" type="button">
                        <label class = "Resultats_text"> <?php echo $Mauv_Rep; ?> Mauvaises Réponses </label> </button>
                    </div>
                </div>
            </div>

            <br><br> <br><br><br>


            <div class="Button_Row">

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'HistScoreUtil.php'"> Historique Score </button>

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'AffichageReponses.php'"> Voir Réponses </button>

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Réessayer </button>

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'Classementv4.php'"> Voir Classement </button>


            </div>


        </div>

        <footer>
        </footer>

    </body>


</html>

<?php $_SESSION['score'] = 0; ?>


















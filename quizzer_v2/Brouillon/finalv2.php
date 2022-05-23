<?php include 'database.php'; ?>
<?php session_start(); 
// Control index.php
$datedujour= date('Y-m-d');

// Get Total Questions
$query = "SELECT * FROM questions";


//Get Results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
//fin index.php



// Check if user has a score for the day
$query = "SELECT * FROM score_user WHERE (id_user_etr = ? AND jour =?);";
// pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)



// variables def
$id_user =1;
$score= $_SESSION['score'];
$Mauv_Rep = $total - $score; 
$score_prcent = (($score * 100) - ($score *100) % $total) / $total;


$check_query = $mysqli->prepare($query);
$check_query->bind_param("ss", $id_user, $datedujour);
$check_query->execute() or die($mysqli->error.__LINE__);

$query = 'UPDATE score_user SET score = ? WHERE (id_user_etr = ? AND jour = ?);';
$update_query = $mysqli->prepare($query);
$update_query->bind_param("sss", $score_prcent, $id_user, $datedujour);
$update_query->execute() or die($mysqli->error.__LINE__);


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Score</title>
    <link rel="stylesheet" href="CSS/CSS Page Score.css"/>
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
                        <label class = "Resultats_text"> <?php echo $total; ?> Questions Totales </label>
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

                <button class="Imp_Buttons" type="button"> Voir Réponses </button>

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'question.php?n=1'"> Réessayer </button>

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'Classementv2.php'"> Voir Classement </button>


            </div>


        </div>

        <footer>
        </footer>

    </body>


</html>

<?php $_SESSION['score'] = 0; ?>















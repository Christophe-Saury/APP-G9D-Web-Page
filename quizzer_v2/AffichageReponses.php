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
$question_nb_arr = array();
$question_text_arr = array();

while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $question_nb_arr[]=$row[0];
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








?>











<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Bonnes Réponses</title>
    <link rel="stylesheet" href="css/CSS Page Affichage Reponses.css"/>
    </head>

    <body>
        <header>
        </header>
        <br> <br> <br> <br> <br> <br> <br>

<!--  Beginning of the body code  -->

<!-- Making of Flexboxes -->

    <!-- for later        <div class="blue_header">
            </div>

-->
        <div class="div_container">

        <?php
        while($i<=$total_quest){
            ?>
            <br>
            <div class ="div_row">
                <label class="Text_Question">Question <?php echo $i; ?> of <?php echo $total_quest; ?> : <?php echo $question_text_arr[$i-1]; ?></label>
            </div>

            <br>

            <div class="div_container">
                <div class="div_row">
                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div> 
                        <p> <?php echo  $choices_text_arr[6*($i-1)]; ?><p>
                        </div>

                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+1]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div> 
                        <p> <?php echo  $choices_text_arr[6*($i-1)+1]; ?><p>
                        </div>

                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+2]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+2]; ?><p></div>
                    </div>

                <div class="div_row">
                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+3]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+3]; ?><p>
                        </div>

                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+4]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+4]; ?><p>
                        </div>
                    
                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+5]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+5]; ?><p>
                        </div>
                </div>
            </div>
            <br>

          <?php
    $i++;    
    } 
        ?>

 




        </div>
        

    <div class="Button_Row">

       <button class="Imp_Buttons" type="button" onclick="window.location.href =  'HistScoreUtil.php'"> Voir Score </button>

        <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Réessayer </button>

        <button class="Imp_Buttons" type="button" onclick="window.location.href =  'Classementv4.php'"> Voir Classement </button>


    </div>


        
        <footer>
        </footer>

    </body>


</html>

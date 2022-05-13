<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 


$i=0;

$qp=(string) $_GET['qp'];
// str_split
$qp_split= str_split($qp, 2);
//number_format

while($i<count($qp_split)){
    $qp_nb_arr[]=intval($qp_split[$i]);
    $i++;
}


//print_r ($qp_split);
//echo $qp_nb_arr;
//print_r($qp_nb_arr);

//Set Question number
$quest_number = (int) $_GET['n'];
//$previous_post=$number;






// Get number of total questions
$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total_numb = $results->num_rows;





//Put all the questions in an array
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

//print_r($question_nb_arr);
//print_r($question_text_arr);


$question_nb_arr = array_diff($question_nb_arr, $qp_nb_arr);
$final_quest_arr = array_values($question_nb_arr);
//print_r ($final_quest_arr);


//Get rid of questions that already appeared








/*

while($i<=count($qp_split)){
// Delete from question array the previous questions that passed

    $qp_val = intval($qp_split[$i-1])-1;

    array_splice($question_nb_arr,intval($qp_split[$i-1]), 1);
    array_splice($question_text_arr,intval($qp_split[$i-1]), 1);
    $i++;

}
*/

//print_r($question_nb_arr);
//print_r($question_text_arr);






// get random variable between 0 and total nb of questions -1
$rand_nb = rand(0,count($final_quest_arr)-1);
// get question number corresponding to the random_nb
$act_quest_nb = $final_quest_arr[$rand_nb];


// Get question
$query = "SELECT * FROM questions
            WHERE question_number = $act_quest_nb";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();







/* This part is no longer necessary
// Get question
$query = "SELECT * FROM questions
            WHERE question_number = $quest_number";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();
*/



// Get Choices for our random question and store into an array
$query = "SELECT * FROM choices
            WHERE question_number = $act_quest_nb";

// Make array of choices id
$retval = $mysqli->query($query) or die($mysqli->error.__LINE__);
$choices_id_arr = array();
$choices_text_arr = array();

while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $choices_id_arr[]=$row[0];
    $choices_text_arr[]=$row[3];
}




?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>QCM</title>
    <link rel="stylesheet" href="CSS/CSS pages QCMv2.css" type="text/css" />
    </head>

<body>
    
<script>
function chbx(obj){
    var that = obj;
    if(document.getElementById(that.id).checked == true) {
      document.getElementById('id1').checked = false;
      document.getElementById('id2').checked = false;
      document.getElementById('id3').checked = false;
      document.getElementById('id4').checked = false;
      document.getElementById('id5').checked = false;
      document.getElementById('id6').checked = false;
      document.getElementById(that.id).checked = true;
    }
}
            </script>


    <header>
      
    </header>
    <main>

    <div class="div_container">
            <div class="Question_Container">
                <br>
                <br>
                <br>
                <br>
                <label class="current">Question <?php echo $quest_number; ?> of <?php echo $total_numb; ?> : </label>
                <label class="Question"><?php echo $question['text']; ?></label>   </div> <br><br><br>
                <br>
                <label class="Question_Expl">Sélectionner une réponse</label> <br><br><br><br><br>
                <br>
               
                    
            </div>


            <form method="post" action="process.php">
            <div class="Answer_Container">

           

                <div class="Answer_Column">
                    <div class = "Answer_Box">
                        <Input id='id1' name="choice" type='Checkbox' value ="<?php echo $choices_id_arr[0]; ?>" onclick="chbx(this)">
                        <label class = "Answer_text"><?php echo  $choices_text_arr[0]; ?></label>
                        <br />
                    </div>
                    <div class = "Answer_Box">
                        <Input id='id2' name="choice" type='Checkbox' value ="<?php echo $choices_id_arr[1]; ?>" onclick="chbx(this)">
                        <label class = "Answer_text"><?php echo  $choices_text_arr[1]; ?></label>
                        <br />
                    </div>
                    <div class = "Answer_Box">
                        <Input id='id3' type='Checkbox' Name ="choice" value ="<?php echo  $choices_id_arr[2]; ?>" onclick="chbx(this)">
                        <label class = "Answer_text"><?php echo  $choices_text_arr[2]; ?></label>
                        <br />
                    </div>
                </div>

                <div class="Answer_Column">
                    <div class = "Answer_Box">
                        <Input id='id4' type='Checkbox' Name ="choice" value ="<?php echo $choices_id_arr[3]; ?>" onclick="chbx(this)">
                        <label class = "Answer_text"><?php echo  $choices_text_arr[3]; ?></label>
                        <br />
                    </div>
                    <div class = "Answer_Box">

                        <Input id='id5' type='Checkbox' Name ="choice" value ="<?php echo $choices_id_arr[4]; ?>" onclick="chbx(this)">
                        <label class = "Answer_text"><?php echo  $choices_text_arr[4]; ?></label>
                        <br />
                    </div> 
                     <div class = "Answer_Box">
                        <Input id='id6' type='Checkbox' Name ="choice" value ="<?php echo $choices_id_arr[5]; ?>" onclick="chbx(this)">
                        <label class = "Answer_text"><?php echo  $choices_text_arr[5]; ?></label>
                        <br />
                    </div>
                </div>
               
            </div>
          <!--  <input type="submit" value="Submit" />
               <input type="hidden" name="number" value="question_nb in php" />
            </form> -->
            <br><br><br>

            <div class="Button_Container">
     

                <div class="Button_Column">
                    <input class="Big_button" type="submit" value="Submit" />
                    <input type="hidden" name="rand_quest_numb" value="<?php echo $act_quest_nb; ?>" />
                    <input type="hidden" name="number" value="<?php echo $quest_number; ?>" />
                    <input type="hidden" name="Prev_quests" value="<?php echo $qp; ?>" />
                    
                    </form>
                   <!-- <button class="Big_button" type="button"> Question Suivante </button>   -->

                </div>

            </div>

            <!--
            <div class="Footer_Container">

            </div>
        -->
</div>



    <!-- ................................................................................................... -->




       
    </main>

    <footer>

    </footer>

</body>


</html>
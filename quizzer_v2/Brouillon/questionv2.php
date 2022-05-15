<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

//Set Question number
$number = (int) $_GET['n'];
$previous_post=$number;

// Get total questions

$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;



// Get question
$query = "SELECT * FROM questions
            WHERE question_number = $number";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();


// Get Choices

$query = "SELECT * FROM choices
            WHERE question_number = $number";

// Get results
//$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

//$row = $choices->fetch_assoc();


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
                <label class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?> : </label>
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
               <input type="hidden" name="number" value="<?php echo $number; ?>" />
            </form> -->
            <br><br><br>

            <div class="Button_Container">
     

                <div class="Button_Column">
                    <input class="Big_button" type="submit" value="Submit" />
                    <input type="hidden" name="number" value="<?php echo $number; ?>" />
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
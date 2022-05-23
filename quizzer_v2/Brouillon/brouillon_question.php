<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

//Set Question number
$number = (int) $_GET['n'];


// Get total questions

$query = "SELECT * FROM questions";

// Get result
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;



// Get question

$query = "SELECT * FROM questions
            WHERE question_number = $number";

// Get result
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question = $result->fetch_assoc();


// Get Choices

$query = "SELECT * FROM choices
            WHERE question_number = $number";

// Get results
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

$row = $choices->fetch_assoc();


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
    <link rel="stylesheet" href="css/CSS pages QCM.css" type="text/css" />
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

    <div class="div_container">
            <div class="Question_Container">
                <br>
                <br>
                <br>
                <br>
                <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
                <br>
                <br>
                <br>
                <label class="Question"> <?php echo $question['text']; ?></label>    <br><br><br>
                <br>
                <label class="Question_Expl">Sélectionner une réponse</label> <br><br><br><br><br>
                <br>
               
                    
            </div>


            <div class="Answer_Container">

            <form method="post" action="process.php">

                <div class="Answer_Column">
                    <div class = "Answer_Box">
                        <input name="choice" type="radio" value="<?php echo $choices_id_arr[0]; ?>" /><?php echo  $choices_text_arr[0]; ?>
                        <br />
                    </div>
                    <div class = "Answer_Box">
                    <input name="choice" type="radio" value="<?php echo $choices_id_arr[1]; ?>" /><?php echo  $choices_text_arr[1]; ?>
                        <br />
                    </div>
                    <div class = "Answer_Box">
                        <input name="choice" type="radio" value="<?php echo $choices_id_arr[2]; ?>" /><?php echo  $choices_text_arr[2]; ?>
                        <br />
                    </div>
                </div>

                <div class="Answer_Column">
                    <div class = "Answer_Box">
                        <input name="choice" type="radio" value="<?php echo $choices_id_arr[3]; ?>" /><?php echo  $choices_text_arr[3]; ?>
                        <br />
                    </div>
                    <div class = "Answer_Box">
                        <input name="choice" type="radio" value="<?php echo $choices_id_arr[4]; ?>" /><?php echo  $choices_text_arr[4]; ?>
                        <br />
                    </div> 
                     <div class = "Answer_Box">
                        <input name="choice" type="radio" value="<?php echo $choices_id_arr[5]; ?>" /><?php echo  $choices_text_arr[5]; ?>
                        <br />
                    </div>
                </div>
            </div>
            <br><br><br><br>  <br><br><br><br>

            <div class="Button_Container">

                <div class="Button_Column">
                    <button class="Big_button" type="button"> Question Précédente </button>

                </div>


                <div class="Button_Center_Column">
                    
                    <div class="Button_Row">
                        
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                        <button class="Small_button" type="button"></button>
                
             
                       
                
                    </div>
       
                </div>

                <div class="Button_Column">

                    <button class="Big_button" type="button"> Question Suivante </button>

                </div>

            </div>

            <!--
            <div class="Footer_Container">

            </div>
        -->
</div>


    <!-- ................................................................................................... -->




    <main>
        <div class="container">
           <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
           <p class="question"> 
                <?php echo $question['text']; ?>

           </p>
           <form method="post" action="process.php">
               <ul class="choices">
                    <?php while($row = $choices->fetch_assoc()): ?>
                        <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
                    <?php endwhile; ?>

               </ul>
               <input type="submit" value="Submit" />
               <input type="hidden" name="number" value="<?php echo $number; ?>" />
           </form>
        </div>
    </main>

    <footer>

    </footer>

</body>


</html>
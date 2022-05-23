<?php include 'database.php'; ?>
<?php
    if(isset($_POST['submit'])){
        // Get post variables
        $question_number = $_POST['question_number'];
     
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];
        //Choices array
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];
        $choices[6] = $_POST['choice6'];



    //Checking if there's already an entry
    $query = "SELECT * from questions WHERE question_number = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $question_number);
    if($stmt->execute())

    {
        $result = $stmt->get_result();
        $isentry = $result->num_rows;
 
    }
    else
    {
        error_log ("Didn't work");
    }


    // Every conditions for adding a question/ 
    //entry =0 && $correct_choice>=1 && $correct_choice<=6 && $choices[1]!="" && $choices[2]!="" && $choices[3]!="" && $choices[4]!="" && $choices[5]!="" && $choices[6]!="" 
    /*
    if($isentry==0 && ){
        // does what its supposed to




    }


*/


    if($isentry==0 && $question_text !="" && $correct_choice>=1 && $correct_choice<=6 && $choices[1]!="" && $choices[2]!="" && $choices[3]!="" && $choices[4]!="" && $choices[5]!="" && $choices[6]!="" ){
    //Does if all conditions are respected


     //Question query
     $query = "INSERT INTO questions (question_number, text)
     VALUES('$question_number','$question_text')";

     // Run query
     $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

     //Validate insert
     if($insert_row){
         foreach($choices as $choice => $value){
             if($value != ''){
                 if($correct_choice == $choice){
                     $is_correct = 1;
                 } else {
                     $is_correct = 0;
                 }
                 //Choice query
                 $query = "INSERT INTO choices (question_number, is_correct, text) VALUES ('$question_number','$is_correct','$value')";

                 //run query
                 $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                 // Validate insert
                 if($insert_row){
                     continue;
                 } else {
                     die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
                 }
             }
         }
 
         echo "<script language='javascript'> alert('Une question a été ajouté à la base de donnée.');</script>";
     }







    } elseif($isentry==1) {
    // If there's already an entry with that number

    echo "<script language='javascript'> alert('Il y a déjà une entrée avec ce numéro de question.');</script>";
    



    } elseif($question_text ==""){
        // If the question field is empty

        echo "<script language='javascript'> alert('Le champ du texte de la question est vide. Veuillez le remplir pour ajouter une question.');</script>";



    } elseif($choices[1]=="" || $choices[2]=="" || $choices[3]=="" || $choices[4]=="" || $choices[5]=="" || $choices[6]==""){
    // If one of the choices fields is left empty

    echo "<script language='javascript'> alert('Tous les champs de réponses à la question ne sont pas remplis. Veuillez les remplir pour ajouter une question');</script>";



    


    } elseif($correct_choice<1 || $correct_choice>6){
    // If correct_choice isn't within the 1-6 range

    echo "<script language='javascript'> alert('Le numéro de la bonne réponse n est pas compris entre 1 et 6. Veuillez entrer un numéro de bonne réponse valide.');</script>";


    }

}




  

/*


    
        //Question query
        $query = "INSERT INTO questions (question_number, text)
                    VALUES('$question_number','$question_text')";

        // Run query
        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

        //Validate insert
        if($insert_row){
            foreach($choices as $choice => $value){
                if($value != ''){
                    if($correct_choice == $choice){
                        $is_correct = 1;
                    } else {
                        $is_correct = 0;
                    }
                    //Choice query
                    $query = "INSERT INTO choices (question_number, is_correct, text)
                                VALUES ('$question_number','$is_correct','$value')";

                    //run query
                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    // Validate insert
                    if($insert_row){
                        continue;
                    } else {
                        die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
                    }
                }
            }
            $msg = 'Question has been added';
        }

    }
*/
    // Get total questions

    $query = "SELECT * FROM questions";

    // Get result
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $next = $total+1;


?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Ajout de Questions</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>

<body>
    <header>
    </header>
    <main>


        <div class="container">
            <h2>Ajouter une question</h2>
           

            <form method="post" action ="add.php">
                <p>
                    <!-- <label>Question Number</label> _-->
                    <input type="hidden" value="<?php echo $next; ?>" name="question_number" />    
                </p>
                <p>
                    <label>Texte de la question</label>
                    <input type="text" name="question_text" />    
                </p>
                <p>
                    <label>Choix #1</label>
                    <input type="text" name="choice1" />    
                </p>
                <p>
                    <label>Choix #2</label>
                    <input type="text" name="choice2" />    
                </p>
                <p>
                    <label>Choix #3</label>
                    <input type="text" name="choice3" />    
                </p>
                <p>
                    <label>Choix #4</label>
                    <input type="text" name="choice4" />    
                </p>
                <p>
                    <label>Choix #5</label>
                    <input type="text" name="choice5" />    
                </p>
                <p>
                    <label>Choix #6</label>
                    <input type="text" name="choice6" />    
                </p>
                <p>
                    <label>Numéro Bonne Réponse : </label>
                    <input type="number" name="correct_choice" />    
                </p>
                <p>
                    <input type="submit" name="submit" value="submit" />    
                </p>
            </form>
        </div>
    </main>



    <footer>
        
    </footer>

</body>


</html>
<?php

$id_user= $SESSION['role_utilisateur'];

if($id_user== 2){

    ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Ma première page</title>
        <link rel="stylesheet" href="css/index_quiz.css"/>
    </head>
    <body>

    <br><br><br><br>
 
    <div class="Column">
        <div class="index_text1">
          Accéder à une des options suivantes :
        </div>
        <br>

        <div class="index_text">
        <h2>
                - QCM <br>
                - Historique des scores<br>
         

        </div>
 
        <br>

        <div class="row_index">
            <button class="Imp_Buttons" onclick="window.location.href =  'index_quizv2.php';">QCM</button>

            <button class="Imp_Buttons" onclick="window.location.href =  'HistScoreUtil.php';">Historique des Scores</button>

          <!--  <button class="Imp_Buttons" onclick="window.location.href =  'add.php';">Ajouter Des Questions</button>   -->


        </div>

    </div>

    </body>

    <footer></footer>

</html>








<?php




} else if ($id_user==0 || $id_user==1){
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Ma première page</title>
            <link rel="stylesheet" href="css/index_quiz.css"/>
        </head>
        <body>
    
        <br><br><br><br>
     
        <div class="Column">
            <div class="index_text1">
              Accéder à une des options suivantes :
            </div>
            <br>
    
            <div class="index_text">
            <h2>
                    - QCM <br>
                    - Historique des scores<br>
                    - Ajout de questions<br>
                    - Supprimer des questions
    
            </div>
     
            <br>
    
            <div class="row_index_gest">
                <button class="Imp_Buttons" onclick="window.location.href =  'index_quizv2.php';">QCM</button>
    
                <button class="Imp_Buttons" onclick="window.location.href =  'TableauScoreGestv2.php';">Historique des Scores</button>
    
                <button class="Imp_Buttons" onclick="window.location.href =  'add.php';">Ajouter Des Questions</button>
    
                <button class="Imp_Buttons" onclick="window.location.href =  'GestionQuestion.php';">Supprimer Des Questions</button>
    
    
            </div>
    
        </div>
    
        </body>
    
        <footer></footer>
    
    </html>




<?php



}


?>
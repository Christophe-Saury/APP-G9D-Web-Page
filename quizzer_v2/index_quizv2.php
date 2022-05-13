<?php include 'database.php'; ?>

<?php
// Get Total Questions
$query = "SELECT * FROM questions";

//Get Results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;





?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Quiz</title>
    <link rel="stylesheet" href="css/index_quiz.css" type="text/css" />
    </head>

<body>
    <header>   
    </header>

    <main>

    <div class = "div_column">

   

        <div class="Question_Container">
            <br>
            <br>
        
            <label class="current"></label>
            <label class="Question">Tester vos connaissances</label>   </div> <br><br><br>
            <br>
            <label class="Question_Expl">Ceci est un qcm à choix multiples, il n'y a qu'une seule bonne réponse par question.</label> <br><br>
            <br>
                  
            </div>
            <br>
          

        <div class="div_row">
            <ul>
                <li><strong>Nombre de questions : </strong><?php echo $total; ?></li><br>
                <li><strong>Type: </strong>Plusieurs choix</li><br>
                <li><strong>Temps estimé: </strong><?php echo $total * .5; ?> Minutes</li>
            </ul>



            <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv2.php?n=1'"> Commencer </button>


        </div>



    </div>



    </main>



    <footer>
    </footer>

</body>


</html>
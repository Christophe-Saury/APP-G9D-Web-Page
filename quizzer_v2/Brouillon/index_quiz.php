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
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>

<body>
    <header>
       
    </header>


    
    <main>
        <div class="container">
            <h2>Tester vos connaissances</h2>
            <p>Ceci est un qcm à choix multiples, il n'y a qu'une seule bonne réponse par question.</p>
            <ul>
                <li><strong>Nombre de questions : </strong><?php echo $total; ?></li>
                <li><strong>Type: </strong>Plusieurs choix</li>
                <li><strong>Temps estimé: </strong><?php echo $total * .5; ?> Minutes</li>
            </ul>
            <a href="question.php?n=1" class="start">Commencer le quiz</a>
        </div>
    </main>


    <footer>
 
    </footer>

</body>


</html>

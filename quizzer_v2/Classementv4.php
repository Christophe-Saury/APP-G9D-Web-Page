<?php include 'database.php'; ?>
<?php
  

  /* Mysqli query to fetch rows 
  in descending order of marks */

// Variable declaration
  $datedujour = date('Y-m-d'); //'date('Y-m-d')';
                                    /* First rank will be 1 and second be 2 and so on */
  $ranking = 1;
  $id_user = 1;
  $ranking_user=0;
  $name_user="";
  $score_user=0;
  $other_id_user=0;
  $first_username="";
  $second_username="";
  $third_username="";

  $username_arr=array();
  $id_user_arr=array();
  $ranking_arr=array();





  //Get number of scores for the day
  $sql="SELECT * FROM score_user where jour = ?";    // pour finalv3 :Check if : SELECT * FROM score_user where jour = ?

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $datedujour);
  if($stmt->execute())

  {
      $result = $stmt->get_result();
      $total = $result->num_rows;
  }
  else
  {
      error_log ("Didn't work");
  }

// end of query





// queries

  // Get score for the current day and order them in descending order 
  $sql="SELECT * FROM `utilisateur`, score_user WHERE utilisateur.id_user = score_user.id_user_etr AND score_user.jour = ? ORDER BY score_user.score DESC";      
  //SELECT * FROM `utilisateur`, score_user WHERE utilisateur.id_user = score_user.id_user_etr AND score_user.jour = ? ORDER BY score_user.score DESC

  // pour faire lien entre les deux bases de données

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $datedujour);
    if($stmt->execute()){
        $result = $stmt->get_result();
        
        while($a = $result->fetch_array(MYSQLI_ASSOC)){
            $Prenom = $a['Prenom'];
            $Nom = $a['Nom'];
            $username_arr[]=$Prenom." ".$Nom;

            if($a['id_user'] == $id_user){
              $ranking_user=$ranking;
              $name_user=$Prenom." ".$Nom;
              $score_user=$a['score'];
            }
            $ranking++;
        }
    } else {
        error_log ("Didn't work");
    }
    
   
// Checks if there's less than 3 scores for the day.
    if ($total == 0) {
      $username_arr[]="/";
      $username_arr[]="/";
      $username_arr[]="/";
  } elseif ($total == 1) {
    $username_arr[]="/";
    $username_arr[]="/";
  } elseif ($total == 2) {
    $username_arr[]="/";
  }

  
    ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Classement</title>
        <link rel="stylesheet" href="CSS/CSS Page Classement_v2.css"/>
    </head>
    <body>


<!--  Beginning of the body code  -->

<!-- Making of Flexboxes -->

    <!-- for later        <div class="blue_header">
            </div>

-->
        <div class="div_container">

            <br><br>
            

            <div class="ScoreBoard_Row">
                
                <div class="ScoreBoard_Column1">

                    <div class="imageBox1">
                        <img class="image1" src="Images/Photo.PNG">
                    </div>
                    <div class="ScoreBoardNameBox">
                        <label class="ScoreBoardName"><?php  echo $username_arr[1];   ?></label>
                    </div>
                    <div class="ScoreBoardNumber">
                        <label class="ScoreBoardNumber">2</label>
                    </div>

                </div> 

                <div class="ScoreBoard_Column2">

                    <div  class="imageBox2">
                        <img class="image2" src="Images/Photo.PNG">
                    </div>
                    <div class="ScoreBoardNameBox">
                        <label class="ScoreBoardName"><?php echo $username_arr[0]; ?></label>
                    </div>
                    <div class="ScoreBoardNumber">
                        <label class="ScoreBoardNumber">1</label>
                    </div>
                        
                </div> 

                <div class="ScoreBoard_Column3">

                    <div class="imageBox3">
                        <img class="image3" src="Images/Photo.PNG">
                    </div>
                    <div class="ScoreBoardNameBox">
                        <label class="ScoreBoardName"><?php echo $username_arr[2]; ?></label>
                    </div>
                    <div class="ScoreBoardNumber">
                        <label class="ScoreBoardNumber">3</label>
                    </div>
                        
                </div>         

            </div>


            <br><br> <br>


            <div class="MyPlacement">

                <div class="MyPlacement_Column">

                    <div>
                        <label class = "Placement_text"> Votre Classement </label>
                    </div>

                    <div class="MyPlacement_Row">
                  
                            <div class="NumberScoreBox">
                                <label class = "NumberScore_text"> <?php echo $ranking_user; ?> </label>
                            </div>
                            <div>
                                <img class="UserPhoto" src="Images/Photo.PNG">
                            </div>
                            <div class="NameScoreBox">
                                <label class ="NameScore"><?php echo $name_user; ?></label>
                            </div>
                            <div class="NameScoreBox">
                                <label class ="NameScore"><?php echo $score_user; ?></label>
                            </div>
                

                    </div>
                </div>



            </div>
            <br><br>
            
            

            <div class="Button_Row">

                <button class="Imp_Buttons" onclick="window.location.href =  'AffichageReponses.php'"> Voir Réponses </button>

                <button class="Imp_Buttons" onclick="window.location.href =  'questionv3.php?n=1&qd='"> Réessayer </button>

                <button class="Imp_Buttons" onclick="window.location.href =  'HistScoreUtil.php'"> Historiques des scores </button>


            </div>



        </div>

    </body>

</html>

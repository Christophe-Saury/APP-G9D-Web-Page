<?php include 'database.php'; ?>
<?php
  

  /* Mysqli query to fetch rows 
  in descending order of marks */

  $result = $mysqli->query("SELECT id_user, Prenom, Nom,
  score FROM utilisateur ORDER BY score DESC") or die($mysqli->error.__LINE__);
    
  /* First rank will be 1 and 
      second be 2 and so on */
  $ranking = 1;
  $id_user = 1;
  $ranking_user=0;
  $name_user="";
  $score_user=0;

  $username_arr=array();
  $ranking_arr=array();
  $marks_arr=array();
    
  /* Fetch Rows from the SQL query */
  if (mysqli_num_rows($result)) {
      while ($row = mysqli_fetch_array($result)) { 
          $Prenom = $row['Prenom'];
          $Nom = $row['Nom'];
          $username_arr[]=$Prenom." ".$Nom;
          $ranking_arr[]=$ranking;
          $marks_arr=$row['score'];
        

          if($row['id_user']==$id_user){
            $ranking_user=$ranking;
            $name_user=$Prenom." ".$Nom;
            $score_user=$row['score'];
          }
          $ranking++;
      }
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
                        <img class="image1" src="">
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
                        <img class="image2" src="">
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
                        <img class="image3" src="">
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
                                <img class="UserPhoto" src="">
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

                <button class="Imp_Buttons"> Voir Réponses </button>

                <button class="Imp_Buttons" onclick="window.location.href =  'question.php?n=1'"> Réessayer </button>


            </div>



        </div>

    </body>

</html>





<!-- ............................................................................................................................ -->





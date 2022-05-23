<?php include 'database.php'; ?>
<?php
  

  /* Mysqli query to fetch rows 
  in descending order of marks */

// Variable declaration
  $datedujour = date('Y-m-d');
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
  $marks_arr=array();


// check if a score was already made for the day.









// queries
  // Get score for the current day and order them in descending order 
  $sql="SELECT id_user_etr, score, jour FROM score_user WHERE jour=? ORDER BY score DESC";

 //
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $datedujour);


  $stmt->execute();
  
   //$result = $mysqli ->     query($stmt) or die($mysqli->error.__LINE__);


    
 


    //$row2; // use fetch association with new query to get first and last name for every id



    
  /* Fetch Rows from the SQL query */
  // order rows according to score and storing results in arrays
 
    /* Fetch Rows from the SQL query */
    if (mysqli_num_rows($stmt)) {
        while ($row = mysqli_fetch_array($stmt)) { 
            $other_id_user =$row['id_user_etr'];
            $id_user_arr[]= $other_id_user;
            $ranking_arr[]=$ranking;
            $marks_arr=$row['score'];
                
            if($row['id_user_etr']==$id_user){
                $ranking_user=$ranking;
                $score_user=$row['score'];
            }
            $ranking++;
        }
    }
   // print_r($id_user_arr);
/*
    unset($result);
    //print_r($id_user_arr);

  //  
  $query="SELECT id_user, Prenom, Nom FROM utilisateur";

  $result2 = $mysqli->query($query) or die($mysqli->error.__LINE__);


    while ($row2 = mysqli_fetch_array($result2)) { 

        if($row2['id_user']==$id_user_arr[0]){
            $first_username=$row2['Prenom']." ".$row2['Nom'];
        }
       

        if($row2['id_user']==$id_user_arr[1]){
            $second_username=$row2['Prenom']." ".$row2['Nom'];
        }

        if($row2['id_user']==$id_user_arr[2]){
            $third_username=$row2['Prenom']." ".$row2['Nom'];
        }

        if($row2['id_user']==$id_user){
            $name_user =$row2['Prenom']." ".$row2['Nom'];
        }
  
        
    }

*/




   // queries
  // Get score for the current day and order them in descending order 




/*
  //simple second query to try and make work
  $sql="SELECT * FROM score_user where jour = ? ";    // pour finalv3 :Check if : SELECT * FROM score_user where jour = ?

  $stmt = $mysqli->prepare($sql);
  if($stmt->execute())
  {
      $result = $stmt->get_result();
      while($a = $result->fetch_array(MYSQLI_ASSOC))
      {
          echo 'Id: '. $a['id_user'] ;
          
          echo 'score: '.$a['Prenom'];
          echo '<br>';
      }
  }
  else
  {
      error_log ("Didn't work");
  }

// end of second query
*/









// ....................................................................................................................................






    //$row2; // use fetch association with new query to get first and last name for every id



    
  /* Fetch Rows from the SQL query */
  // order rows according to score and storing results in arrays
 
    /* Fetch Rows from the SQL query */
    //echo $ranking;
    /*
    echo $result->num_rows();
    if ($result->num_rows()) {
        while ($row = mysqli_fetch_array($result)) { 
            echo $ranking;
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
            echo $ranking;
            $ranking++;
            
        }
    }

    print_r($id_user_arr);
*/




// check if a score was already made for the day.
/*
// Get Total Questions
$query = "SELECT * FROM score_user where id_user_etr = ? and jour = ?";


//Get Results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
//fin index.php
echo $total;
*/



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
                        <label class="ScoreBoardName"><?php  echo $first_username;   ?></label>
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
                        <label class="ScoreBoardName"><?php echo $second_username; ?></label>
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
                        <label class="ScoreBoardName"><?php echo $third_username; ?></label>
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





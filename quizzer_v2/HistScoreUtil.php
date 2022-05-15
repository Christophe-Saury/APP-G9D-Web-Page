<?php include 'database.php'; ?>
<?php 


// Variable declaration
if(isset($_POST['submit'])){
    $id_user = $_POST['idsouhaite'];;
} else {
    $id_user = 1;
}



// Variable declaration
$datedujour = date('Y-m-d'); //'date('Y-m-d')';
/* First rank will be 1 and second be 2 and so on */
$ranking = 1;
$id_user = 1;
$i=1;


$Prenom_arr=array();
$Nom_arr=array();
$id_user_arr=array();
$ranking_arr=array();





  //Get number of scores for the day
  $sql="SELECT * FROM score_user where id_user_etr = ?";    // pour finalv3 :Check if : SELECT * FROM score_user where jour = ?

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("i", $id_user);
  if($stmt->execute())

  {
      $result = $stmt->get_result();
      $total = $result->num_rows;
  }
  else
  {
      error_log ("Didn't work");
  }





// queries

  // Get score for the current day and order them in descending order 
  $sql="SELECT * FROM `utilisateur`, score_user WHERE (utilisateur.id_user = score_user.id_user_etr AND utilisateur.id_user = ?) ORDER BY score_user.jour DESC";      
  //SELECT * FROM `utilisateur`, score_user WHERE utilisateur.id_user = score_user.id_user_etr AND score_user.jour = ? ORDER BY score_user.score DESC

  // pour faire lien entre les deux bases de données

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id_user);
    if($stmt->execute()){
        $result = $stmt->get_result();
        
        while($a = $result->fetch_array(MYSQLI_ASSOC)){
            $Prenom_arr[] = $a['Prenom'];
            $Nom_arr[] = $a['Nom'];
            $ranking_arr[] = $ranking;
            $score_arr[]=$a['score'];
            $date_arr[]=$a['jour'];
            $ranking++;
        }
    } else {
        error_log ("Didn't work");
    }



?>




<!DOCTYPE html>
<html>
<head>
<title> Résultats du jour QCM </title>
<link rel="stylesheet" href="css/GestionTicketsv2.css"/>
</head>
<body>
 <h1>Résultats du jour QCM</h1>
  <table class="tickets_support">
   <thead>
     <tr>
       <th>Prenom</th>
       <th>Nom</th>
       <th>Score</th>
       <th>Classement</th>
       <th>Jour</th>
     </tr>
   </thead>
   <tbody>
<?php
    while($i<=$total){
    ?>

     <tr>
       <td><?php echo $Prenom_arr[$i-1]; ?></td>
       <td><?php echo $Nom_arr[$i-1]; ?></td>
       <td><?php echo $score_arr[$i-1]; ?></td>
       <td><?php echo $ranking_arr[$i-1]; ?></td>
       <td><?php echo $date_arr[$i-1]; ?></td>
     </tr>


<?php $i++;} ?>

    </tbody>
    </table>
    </body>
</html>

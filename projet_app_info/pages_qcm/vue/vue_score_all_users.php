

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
       <?php echo "<td>".$Prenom_arr[$i-1]."</td>"; ?>
       <td><?php echo $Nom_arr[$i-1]; ?></td>
       <td><?php echo $score_arr[$i-1]; ?></td>
       <td><?php echo $ranking_arr[$i-1]; ?></td>
       <td><?php echo $datedujour; ?></td>
       <td></td>
     </tr>


<?php $i++;} ?>

    </tbody>
    </table>

    <form method="post" action ="Page_qcm.php?page=TableauScoreTsUtil">
    <label>Entrer la date souhaité : </label>
    <input type="date" name="datesouhaite" />   


    <input type="submit" name="submit" value="submit" />   
    </form>
</body>




<br><br>
<body>
 <h1>Résultats du jour QCM</h1>

 <br><br>
  <table class="tickets_support">
   <thead>
     <tr>
       <th>Prenom</th>
       <th>Nom</th>
       <th>Score</th>
      
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
     
       <td><?php echo $date_arr[$i-1]; ?></td>
     </tr>


<?php $i++;} ?>

    </tbody>
    </table>



<br> <br><br><br><br><br><br><br><br>


    <div class="Button_Row">

                


<form action ='' method ='GET'> 
<input type="hidden" name = "page" value ='Affiche_reponses'/>
<button class="Imp_Buttons" type="submit">Voir Réponses</button>
</form>


<button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Réessayer </button>

<form action ='' method ='GET'> 
<input type="hidden" name = "page" value ='Classement'/>
<button class="Imp_Buttons" type="submit">Voir Classement</button>
</form>

    </div>

    </body>


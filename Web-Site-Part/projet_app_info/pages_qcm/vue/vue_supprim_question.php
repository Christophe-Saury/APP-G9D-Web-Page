



    <body>
   
<h1> Gestion des questions</h1>
        <div>
            <br>
        <table class="tickets_support">
            <thead>
            <tr>
                <th class="row2">Question</th> <!-- identifiant du ticket -->
                <th class="row1">Choix 1</th> <!-- titre du ticket -->
                <th class="row1">Choix 2</th> <!-- priorité du ticket -->
                <th class="row1">Choix 3</th> <!-- état du ticket -->
                <th class ="row1">Choix 4</th>
                <th class ="row1">Choix 5</th>
                <th class ="row1">Choix 6</th>
                <th class ="row1">Bonne Réponse</th>
                <th class="row2">Actions possibles</th>
            </tr>
            </thead>
            <tbody>
            <?php // foreach ($liste as $element) { ?>
               <?php  while($i<=$total_quest){
                    if($iscorrect_arr[6*($i-1)]==1){
                        $correct_choice ="1";
                    } else if($iscorrect_arr[6*($i-1)+1]==1){
                        $correct_choice ="2";
                    } else if($iscorrect_arr[6*($i-1)+2]==1){
                        $correct_choice ="3";
                    }  else if($iscorrect_arr[6*($i-1)+3]==1){
                        $correct_choice ="4";
                    }  else if($iscorrect_arr[6*($i-1)+4]==1){
                        $correct_choice ="5";
                    }  else if($iscorrect_arr[6*($i-1)+5]==1){
                        $correct_choice ="6";
                    }
                ?>
            <tr>
                <td>
                <?php echo $question_text_arr[$i-1]; ?>
                </td>
                <td>
                <?php echo  $choices_text_arr[6*($i-1)]; ?><?php //echo $element['sujet']; ?>
                </td>
                <td>
                <?php echo  $choices_text_arr[6*($i-1)+1]; ?><?php //echo $element['sujet']; ?>
                </td>
                <td>
                <?php echo  $choices_text_arr[6*($i-1)+2]; ?>
                </td>
                <td>
                <p> <?php echo  $choices_text_arr[6*($i-1)+3]; ?><p>
                </td>
                <td>
                <p> <?php echo  $choices_text_arr[6*($i-1)+4]; ?><p>
                </td>
                <td>
                <p> <?php echo  $choices_text_arr[6*($i-1)+5]; ?><p>
                </td>
                <td>
                   <?php echo $correct_choice; ?>
                </td>
                <td>
             
                    <form method="post" id="supprimer<?php echo $i; ?>" action ="../controleur/Page_qcm.php?page=Gestion_question">
                        <input type="hidden" name="number" value="<?php  echo $question_nb_arr[$i-1]; ; ?>" />   
                     <!--   <input type="button" onclick="onclick_supprimer()" value="Supprimer Question">  -->
                      <input type="submit" value="Supprimer Question">
                          
                       
                    </form>
                   
                </td>
            </tr> 
            <?php  $i++;}  ?>
            <?php // } ?>
            <tbody>
        </table>
    </div>  
<br><br>

    
<script>
    function confirmer_supprimer_quest(){
    if (confirm ("Voulez vous vraiment supprimer cette question ? ")){ 
        return true;
    }else {
        return false; 
    }   
}  

    function onclick_supprimer(){
        var form = document.getElementById("supprimer");

        if(confirmer_supprimer_quest()){
            form.submit();
            
        }
    }

</script>

</body>



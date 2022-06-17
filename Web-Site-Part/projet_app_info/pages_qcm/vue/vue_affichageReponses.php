

        <body>
        <br> <br> <br> <br> <br> <br> <br>

<!--  Beginning of the body code  -->

<!-- Making of Flexboxes -->

    <!-- for later        <div class="blue_header">
            </div>

-->
        <div class="div_container">

        <?php
        while($i<=$total_quest){
            ?>
            <br>
            <div class ="div_row">
                <label class="Text_Question">Question <?php echo $i; ?> of <?php echo $total_quest; ?> : <?php echo $question_text_arr[$i-1]; ?></label>
            </div>

            <br>

            <div class="div_container">
                <div class="div_row">
                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div> 
                        <p> <?php echo  $choices_text_arr[6*($i-1)]; ?><p>
                        </div>

                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+1]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div> 
                        <p> <?php echo  $choices_text_arr[6*($i-1)+1]; ?><p>
                        </div>

                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+2]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+2]; ?><p></div>
                    </div>

                <div class="div_row">
                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+3]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+3]; ?><p>
                        </div>

                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+4]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+4]; ?><p>
                        </div>
                    
                    <div class="row"><div class="column">
                        <div class="<?php if($iscorrect_arr[6*($i-1)+5]==0){ echo "badcircle";} else { echo "goodcircle";} ?>"></div></div>
                        <p> <?php echo  $choices_text_arr[6*($i-1)+5]; ?><p>
                        </div>
                </div>
            </div>
            <br>

          <?php
    $i++;    
    } 
        ?>

 




        </div>
        

    <div class="Button_Row">

    <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Hist_score_util'/>
            <button class="Imp_Buttons" type="submit">Voir Score</button>
        </form>

        <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Réessayer </button>

        <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Classement'/>
            <button class="Imp_Buttons" type="submit">Voir Classement</button>
        </form>



    </div>
    </body>


        
  




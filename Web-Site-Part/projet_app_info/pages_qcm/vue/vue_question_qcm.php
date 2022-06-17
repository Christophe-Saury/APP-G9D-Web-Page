

    
<script>
function chbx(obj){
    var that = obj;
    if(document.getElementById(that.id).checked == true) {
      document.getElementById('id1').checked = false;
      document.getElementById('id2').checked = false;
      document.getElementById('id3').checked = false;
      document.getElementById('id4').checked = false;
      document.getElementById('id5').checked = false;
      document.getElementById('id6').checked = false;
      document.getElementById(that.id).checked = true;
    }
}
            </script>

<body>
  
    <main>
<br><br>
    <div class="div_container">
        <div class="Question_Container">
      
          
            <label class="current">Question <?php echo $quest_number; ?> of <?php echo $total_quest; ?> : </label>
            <label class="Question"><?php echo $question['text']; ?></label>   
        <br><br><br>
        
            <label class="Question_Expl">Sélectionner une réponse</label> <br>
       
               
        </div>           
        


        <form method="post" action="process.php">
        <div class="Answer_Container">

           

            <div class="Answer_Column">
                <div class = "Answer_Box">
                    <Input id='id1' name="choice" type='Checkbox' value ="<?php echo $choices_id_arr[0]; ?>" onclick="chbx(this)">
                    <label class = "Answer_text"><?php echo  $choices_text_arr[0]; ?></label>
           
                </div>
                <div class = "Answer_Box">
                    <Input id='id2' name="choice" type='Checkbox' value ="<?php echo $choices_id_arr[1]; ?>" onclick="chbx(this)">
                    <label class = "Answer_text"><?php echo  $choices_text_arr[1]; ?></label>
               
                </div>
                <div class = "Answer_Box">
                    <Input id='id3' type='Checkbox' Name ="choice" value ="<?php echo  $choices_id_arr[2]; ?>" onclick="chbx(this)">
                    <label class = "Answer_text"><?php echo  $choices_text_arr[2]; ?></label>
                  
                </div>
            </div>

            <div class="Answer_Column">
                <div class = "Answer_Box">
                    <Input id='id4' type='Checkbox' Name ="choice" value ="<?php echo $choices_id_arr[3]; ?>" onclick="chbx(this)">
                    <label class = "Answer_text"><?php echo  $choices_text_arr[3]; ?></label>                   
                </div>

                <div class = "Answer_Box">
                    <Input id='id5' type='Checkbox' Name ="choice" value ="<?php echo $choices_id_arr[4]; ?>" onclick="chbx(this)">
                    <label class = "Answer_text"><?php echo  $choices_text_arr[4]; ?></label>
                  
                </div> 
                
                <div class = "Answer_Box">
                    <Input id='id6' type='Checkbox' Name ="choice" value ="<?php echo $choices_id_arr[5]; ?>" onclick="chbx(this)">
                    <label class = "Answer_text"><?php echo  $choices_text_arr[5]; ?></label>
           
                </div>
            </div>
               
        </div>
          <!--  <input type="submit" value="Submit" />
               <input type="hidden" name="number" value="question_nb in php" />
            </form> -->
             

        <div class="Button_Container">
     

            <div class="Button_Column">
                <input class="Big_button" type="submit" value="Submit" />
                <input type="hidden" name="rand_quest_numb" value="<?php echo $act_quest_nb; ?>" />
                <input type="hidden" name="number" value="<?php echo $quest_number; ?>" />
                <input type="hidden" name="Prev_quests" value="<?php echo $qp; ?>" />
            </div>   
            </form>
                   <!-- <button class="Big_button" type="button"> Question Suivante </button>   -->

    </div>

     

            <!--
            <div class="Footer_Container">

            </div>
        -->




    <!-- ................................................................................................... -->




       
    </main>
    </body>
    
    <footer>

    </footer>





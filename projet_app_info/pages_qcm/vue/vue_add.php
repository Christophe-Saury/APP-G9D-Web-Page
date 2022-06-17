

<body>
    
    <main>


        <div class ="row">
            <h2>Ajouter une question</h2>
        </div>
           
        
        <div class="container">
        <br> 
            <form method="post" action ="../controleur/Page_qcm.php?page=add_question">
                
                <!-- <label>Question Number</label> _-->
                <input type="hidden" value="<?php echo $next; ?>" name="question_number" />    
                
                
         <!--   <label>Texte de la question</label>    -->
        <div class ="row">
                <div class="question_div"> <input type="text" name="question_text" value="Texte de la question" />  </div>  
                
        </div>

        <br>

        <br>

         <!--       <label>Choix #1</label>     -->
        <div class ="row">
                <div class="input_div"><input type="text" name="choice1" value="Choix #1"/></div>    
                        </div>      
        
        <br>

             <!--   <label>Choix #2</label> -->
             <div class ="row">
                <div class="input_div"> <input type="text" name="choice2" value="Choix #2" />    </div>  
                </div>        

                <br>

           <!--     <label>Choix #3</label> -->
           <div class ="row">
                <div class="input_div">  <input type="text" name="choice3" value="Choix #3" />    </div>  
                </div>

                <br>

        <!--        <label>Choix #4</label>     -->
        <div class ="row">
                <div class="input_div">   <input type="text" name="choice4" value="Choix #4" />    </div>  
                </div>

                <br>

         <!--       <label>Choix #5</label>     -->
         <div class ="row">
                <div class="input_div"> <input type="text" name="choice5" value="Choix #5" />    </div>  
                </div>
                
                <br>

          <!--      <label>Choix #6</label>     -->
          <div class ="row">
                <div class="input_div"> <input type="text" name="choice6" value="Choix #6" />    </div>  
                </div>

                <br>

                <div class ="lastrow">
                <label class="textcorrchoice">Numéro Bonne Réponse : </label>
                <div class="correct_div"> <input type="number" name="correct_choice" />   </div>  &nbsp; &nbsp;
                 <input type="submit" name="submit" value="submit" />   
                </div>
                <br> 

         
                
            </form>
        </div>
    </main>

    </body>



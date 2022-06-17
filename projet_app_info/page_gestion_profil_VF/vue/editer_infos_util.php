<br><br><br>
    <h1>Editer son mail</h1>             
    <br><br>
    <form method="post" id= "modifier" action="testprotectdonnee.php">
        <table class="add_ticket"> <!-- "tickets_support" -->
              
                 
                <tr>
            
                    <th class="titreat">NOM</th>
                
                    <td>
                        <?php echo $Nom; ?>
                    </td>
               
                </tr>
            
                <tr><th class="emptyrow"></th><td class="emptyrow"></td></tr>
             
                <tr> 
         
                    <th class="titreat">PRENOM</th>
              
                    <td>
                        <?php echo $Prenom; ?>
                    </td>
              
                </tr>
             
                <tr><th class="emptyrow"></th><td class="emptyrow"></td></tr>
            
                <tr>
               
                    <th class="titreat">ROLE</th>
                 
                    <td> 
                        <?php echo $Role; ?>
                    </td>
                 
                </tr>
             
                <tr><th class="emptyrow"></th><td class="emptyrow"></td></tr>

                <tr>     
          
                    <th class="titreat">MAIL</th>
                
                    <td>
                        <input type="email" name ="mail" value="<?php echo $Mail; ?>" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$">
                    </td>
                   
                </tr>
              
                <tr><th class="emptyrow"></th><td class="emptyrow"></td></tr>

                <tr>   
             
                    <th class="titreat">MDP</th>
                 
                    <td>
                        <input type="text" name ="mdp" value="<?php echo $MDP; ?>">
                    </td> 
                
                </tr>
             
                <tr><th class="emptyrow"></th><td class="emptyrow"></td></tr>
              
                <tr>
               
                
     
                    <th class="titreat">Modifier</th>
                  
                    <td>
                        <input class="Imp_Buttons" type="button" onclick="onclick_modifier()" value="Submit">
                    </td> 
                
                </tr>
         
</table>
</form>


<!--
            <tr>
                    <td>
                        
                    </td>
                    
                    <td>
                       
                    </td>
                    
                    <td> 
                      
                    </td>
                
                    <td>
                      
                        
                    </td> 
                    
                    <td>
                  
                        
                    </td> 

                    <td>
     
                    </td> 
                    
                </tr>



-->



<!--
                        
               <form method="post" id= "modifier" action="testprotectdonnee.php">
        
                <tr>
                    <td>
                        <?php // echo $Nom; ?>
                    </td>
                    
                    <td>
                        <?php // echo $Prenom; ?>
                    </td>
                    
                    <td> 
                        <?php //echo $Role; ?>
                    </td>
                
                    <td>
                        <input type="email" name ="mail" value="<?php //echo $Mail; ?>" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$">
                        
                    </td> 
                    
                    <td>
                        <input type="text" name ="mdp" value="<?php //echo $MDP; ?>">
                        
                    </td> 

                    <td>
                        <input type="button" onclick="onclick_modifier()" value="Submit">
                    </td> 
                    
                </tr>
                </form>
            </tbody>
        </table>   
                    
-->

        <script>
    function confirmer_modifier_mail(){
        if(confirm ("Voulez vous vraiment modifier vos informations ? ")){ 
            return true;
        }else {
            return false; 
        }   
    }  

    function onclick_modifier(){
        var form = document.getElementById("modifier");

        if(confirmer_modifier_mail()){
            form.submit();
            
        }
    }

</script>




    </body>

    <br><br><br><br><br><br>




    <body>
    <main>
<br><br><br><br>
    <div class = "div_column">

   

        <div class="Question_Container">
            <br>
            <br>
        
            <label class="current"></label>
            <label class="Question">Tester vos connaissances</label>   </div> <br><br><br>
            <br>
            <label class="Question_Expl">Ceci est un qcm à choix multiples, il n'y a qu'une seule bonne réponse par question.</label> <br><br>
            <br>
                  
            </div>
            <br>
          

        <div class="div_row">
            <ul>
                <li><strong>Nombre de questions : </strong><?php echo $total_quest; ?></li><br>
                <li><strong>Type: </strong>Plusieurs choix</li><br>
                <li><strong>Temps estimé: </strong><?php echo $total_quest * .5; ?> Minutes</li>
            </ul>


<!--
        <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Questions_qcm'/>
            <button class="Imp_Buttons" type="submit"> Commencer </button>
        </form>
--> <!--  <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Commencer </button>
-->   <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Commencer </button>



<br><br><br><br><br><br><br><br><br><br><br><br>
        </div>



    </div>



    </main>

    </body>



<br><br>
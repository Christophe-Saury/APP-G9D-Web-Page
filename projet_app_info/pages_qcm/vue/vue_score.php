




    <body>
<!--  Beginning of the body code  -->

<!-- Making of Flexboxes -->

    <!-- for later        <div class="blue_header">
            </div>

-->
        <div class="div_container">

            <br><br>
            <br><br><br>

            <div class="Score">
                <div class="Circle">
                <label class="Score_text">Votre score</label>
                <br><br>
                <label class="Score_text"><?php echo $score_prcent; ?>/100</label>
              </div>
            </div>

            <br><br> <br><br>

            <div class="AnswerRatio_Row">

                <div class="AnswerRatio_Column">
                    <div>
                        <button class="Resultats_Button" type="button">
                        <label class = "Resultats_text"> <?php echo $total_quest; ?> Questions Totales </label>
                        </button>
                    </div>
                    <div>
                        <button class="Resultats_Button" type="button">
                            <label class = "Resultats_text"> <?php echo $score; ?> Bonnes Réponses </label></button>
                    </div>
                    <div>
                        <button class="Resultats_Button" type="button">
                        <label class = "Resultats_text"> <?php echo $Mauv_Rep; ?> Mauvaises Réponses </label> </button>
                    </div>
                </div>
            </div>

            <br><br> <br><br><br>


            <div class="Button_Row">

                

                <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Hist_score_util'/>
            <button class="Imp_Buttons" type="submit">Historique Score</button>
        </form>


        <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Affiche_reponses'/>
            <button class="Imp_Buttons" type="submit">Voir Réponses</button>
        </form>


        <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Réessayer </button>

        <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Classement'/>
            <button class="Imp_Buttons" type="submit">Voir Classement</button>
        </form>

             <!--   <button class="Imp_Buttons" type="button" onclick="window.location.href =  'AffichageReponses.php'"> Voir Réponses </button>

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Réessayer </button>

                <button class="Imp_Buttons" type="button" onclick="window.location.href =  'Classementv4.php'"> Voir Classement </button>  -->


            </div>


        </div>

        </body>



<?php $_SESSION['score'] = 0; ?>

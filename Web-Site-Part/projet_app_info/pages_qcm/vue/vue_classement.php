
    <body>


<!--  Beginning of the body code  -->

<!-- Making of Flexboxes -->

    <!-- for later        <div class="blue_header">
            </div>

-->
        <div class="div_container">

            <br><br>
            

            <div class="ScoreBoard_Row">
                
                <div class="ScoreBoard_Column1">

                    <div class="imageBox1">
                        <img class="image1" src="../vue/Images/Photo.PNG">
                    </div>
                    <div class="ScoreBoardNameBox">
                        <label class="ScoreBoardName"><?php  echo $username_arr[1];   ?></label>
                    </div>
                    <div class="ScoreBoardNumber">
                        <label class="ScoreBoardNumber">2</label>
                    </div>

                </div> 

                <div class="ScoreBoard_Column2">

                    <div  class="imageBox2">
                        <img class="image2" src="../vue/Images/Photo.PNG">
                    </div>
                    <div class="ScoreBoardNameBox">
                        <label class="ScoreBoardName"><?php echo $username_arr[0]; ?></label>
                    </div>
                    <div class="ScoreBoardNumber">
                        <label class="ScoreBoardNumber">1</label>
                    </div>
                        
                </div> 

                <div class="ScoreBoard_Column3">

                    <div class="imageBox3">
                        <img class="image3" src="../vue/Images/Photo.PNG">
                    </div>
                    <div class="ScoreBoardNameBox">
                        <label class="ScoreBoardName"><?php echo $username_arr[2]; ?></label>
                    </div>
                    <div class="ScoreBoardNumber">
                        <label class="ScoreBoardNumber">3</label>
                    </div>
                        
                </div>         

            </div>


            <br><br> <br>


            <div class="MyPlacement">

                <div class="MyPlacement_Column">

                    <div>
                        <label class = "Placement_text"> Votre Classement </label>
                    </div>

                    <div class="MyPlacement_Row">
                  
                            <div class="NumberScoreBox">
                                <label class = "NumberScore_text"> <?php echo $ranking_user; ?> </label>
                            </div>
                            <div>
                                <img class="UserPhoto" src="../vue/Images/Photo.PNG">
                            </div>
                            <div class="NameScoreBox">
                                <label class ="NameScore"><?php echo $name_user; ?></label>
                            </div>
                            <div class="NameScoreBox">
                                <label class ="NameScore"><?php echo $score_user; ?></label>
                            </div>
                

                    </div>
                </div>



            </div>
            <br><br>
            
            

            <div class="Button_Row">

            <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Affiche_reponses'/>
            <button class="Imp_Buttons" type="submit">Voir Réponses</button>
        </form>

                <button class="Imp_Buttons" onclick="window.location.href =  'questionv3.php?n=1&qp='"> Réessayer </button>

                <form action ='' method ='GET'> 
            <input type="hidden" name = "page" value ='Hist_score_util'/>
            <button class="Imp_Buttons" type="submit">Historique Scores</button>
        </form>


            </div>



        </div>

    </body>



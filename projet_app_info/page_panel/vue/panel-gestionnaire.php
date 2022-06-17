

<head>

  <link rel="stylesheet" href="../vue/css/footer_menu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../vue/script.js"></script>
  <script src="https://kit.fontawesome.com/8db991785a.js" crossorigin="anonymous"></script>
  <link href="../vue/css/fa.css" rel="stylesheet">
  <link href="../vue/css/navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="../vue/css/StyleGestionnaire.css">
  <style>
.row{
    margin-left:0%;
    padding:8px;
}
      </style>
<script>
$(document).ready(function(){
$('.header').delay(4000).animate({opacity:0},1000)
})
    </script>

  </head>
<!-- HEDHY EL NAVBAR -->
<?php include
"navbar.php"; ?>
<body>
<div class="header">
    <p>Accès Gestionnaire</p>
    
    </div>
  <section id="section-feature" class="container">
    <div class="row home-menu">
        <ul>
            <li id="sf-innovation" class="col">
                <div class="sf-wrap">

                    <div class="sf-mdl-left">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-dice fa-5x"></i>
                        </div>
                        <h3>QCM</h3>
                    </div>


                    <div class="sf-mdl-right">
                        <div class="sf-icon"> 
                            <i class="iconcolor fa fa-fw fa-dice fa-5x"></i>
                        </div>
                        <h3>QCM</h3>
                    </div>


                    <a href= "../../pages_qcm/controleur/Page_qcm.php">
                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-dice fa-5x"></i>
                        </div>
                        <div>
                        <a href= "../../pages_qcm/controleur/Page_qcm.php">
                        <h3>QCM</h3>
                        </a>
                        </div>
                        <p>Rédaction et modification des QCM</p>
                    </div>
                    </a>

                    <a href= "../../pages_qcm/controleur/Page_qcm.php">
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-dice fa-5x"></i>
                        </div>
                        <a href= "../../pages_qcm/controleur/Page_qcm.php">
                        <h3>QCM</h3>
                        </a>
                        
                        <p>Rédaction et modification des QCM</p>
                    </div>
                    </a>


                </div>
            </li>






            <li id="sf-community" class="col">
                <div class="sf-wrap">

                    <div class="sf-mdl-left">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <h3>Gestion Profils</h3>
                    </div>

                    <div class="sf-mdl-right">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <h3>Gestion Profils</h3>
                    </div>

                    <a href= "../../page_gestion_profil_VF/controleur/gestion_profil.php">
                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <a href = "../../page_gestion_profil_VF/controleur/gestion_profil.php">
                        <h3>Gestion Profils</h3>
                        </a>
                        <p></p>
                    </div>
                    </a>

                    <a href= "../../page_gestion_profil_VF/controleur/gestion_profil.php">
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <a href = "../../page_gestion_profil_VF/controleur/gestion_profil.php">
                        <h3>Gestion Profils</h3>
                        </a>
                        <p></p>
                    </div>
                    </a>

                    
                </div>
            </li>

            <li id="sf-academy" class="col">
                
                <div class="sf-wrap">


             
                    <div class="sf-mdl-left">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-award fa-5x"></i>
                        </div>
                        <h3>Résultats</h3>
                    </div>
                

             
                    <div class="sf-mdl-right">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-award fa-5x"></i>
                        </div>
                        <h3>Résultats</h3>
                    </div>
              

                    <a href= "../../pages_resultats_capt/C/index.php">
                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-award fa-5x"></i>
                        </div>
                        <div>
                        <a href = "../../pages_resultats_capt/C/index.php">    
                        <h3>Résultats</h3>
                        </a>
                        </div>
                        <a href = "../../pages_resultats_capt/C/index.php">    
                        <p>Affichage des résultats des capteurs</p>
                        </a>
                    </div>
                    </a>

                    <a href= "../../pages_resultats_capt/C/index.php">
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-award fa-5x"></i>
                        </div>
                        <div>
                        <a href = "../../pages_resultats_capt/C/index.php">    
                        <h3>Résultats</h3>
                        </a>
                        </div>
                        <a href = "../../pages_resultats_capt/C/index.php">    
                        <p>Affichage des résultats des capteurs</p>
                        </a>
                        
                    </div>
                    </a>


                </div>
            </li>

            <li id="sf-opportunity" class="col">
                <div class="sf-wrap">
                


                    <div class="sf-mdl-left">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-triangle-exclamation fa-5x"></i>
                
                        </div>
                        
                        <h3>Tickets</h3>
                        
                    </div>
           


                 
                    <div class="sf-mdl-right">
                        
                        <div class="sf-icon">
                        
                            <i class="iconcolor fa fa-fw fa-triangle-exclamation fa-5x"></i>
                        
                        </div>
                        
                        <h3>Tickets</h3>
                        
                    </div>
               




                    <a href = "../../pages_ticketing_VF/controleur/tickets.php">
                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                         <i class="iconcolor fa fa-fw fa-triangle-exclamation fa-5x"></i>
                        </div>
                        <a href = "../../pages_ticketing_VF/controleur/tickets.php">
                        <h3>Tickets</h3>
                        </a>
                        <a href = "../../pages_ticketing_VF/controleur/tickets.php">
                        <p>Gérer le ticketing</p>
                        </a>
                    </div>
                    </a>


                    <a href = "../../pages_ticketing_VF/controleur/tickets.php">
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-triangle-exclamation fa-5x"></i>
                        </div>
                        <a href = "../../pages_ticketing_VF/controleur/tickets.php">
                        <h3> Tickets</h3>
                        </a>
                        <a href = "../../pages_ticketing_VF/controleur/tickets.php"> <p>Gérer le ticketing</p>
                        </a>
                    </div>
                    </a>



                </div>
            </li>
        </ul>
    </div>
</section>
  </div>
      
</section>
  </div>
</body>
  <footer>
  <?php include "footer_menu.php"; ?>
</footer>

   
</div>
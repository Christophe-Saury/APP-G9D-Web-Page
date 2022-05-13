<?php

	session_start();

    if (!isset($_SESSION['connected'])) {
		echo "Vous n'avez pas acces à cette page, veuillez vous connecter";
		?>
			<a href="./login.php">Ici</a>
		<?php
		die();
	}

?>

<head>
  <link rel="stylesheet" href="./styleadmin.css">
  <link rel="stylesheet" href="./footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./script.js"></script>
  <script src="https://kit.fontawesome.com/8db991785a.js" crossorigin="anonymous"></script>
  <link href="fa.css" rel="stylesheet">
  <style>
.home-menu{
padding:0px;
}
  </style>
<script>
$(document).ready(function(){
$('.header').delay(4000).animate({opacity:0},1000)
})
    </script>

  </head>
<!-- HEDHY EL NAVBAR -->
<?php include "navbar.php"; ?>
<div class="header">
    <p>Accès Administrateur</p>
    
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

                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-dice fa-5x"></i>
                        </div>
                        <h3>QCM</h3>
                        <p>Rédaction et modification des QCM</p>
                    </div>
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-dice fa-5x"></i>
                        </div>
                        <h3>QCM</h3>
                        <p>Rédaction et modification des QCM</p>
                    </div>
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

                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <h3>Gestion Profils</h3>
                        <p></p>
                    </div>
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <h3>Gestion Profils</h3>
                        <p></p>
                    </div>
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

                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-award fa-5x"></i>
                        </div>
                        <h3>Résultats</h3>
                        <p>Affichage des résultats des QCM</p>
                    </div>
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-award fa-5x"></i>
                        </div>
                        <h3>Résultats</h3>
                        <p>Affichage des résultats des QCM</p>
                    </div>
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

                    <div class="sf-mdl-left-full">
                        <div class="sf-icon">
                         <i class="iconcolor fa fa-fw fa-triangle-exclamation fa-5x"></i>
                        </div>
                        <h3>Tickets</h3>
                        <p></p>
                    </div>
                    <div class="sf-mdl-right-full">
                        <div class="sf-icon">
                            <i class="iconcolor fa fa-fw fa-triangle-exclamation fa-5x"></i>
                        </div>
                        <h3>Tickets</h3>
                        <p></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
  </div>
  <?php include "footer.php"; ?>

  
</div>
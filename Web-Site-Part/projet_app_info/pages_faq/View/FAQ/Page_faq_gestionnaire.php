<!Doctype html>
<html>

	<head>

		<title> FAQ Gestionnaire </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width , initial-scale = 1.0">
		<link href ="../View/css/Styles_FAQ.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../../headers-footer/navbar.css">
		<link rel="stylesheet" href="../../headers-footer/footer.css">
		<link rel="stylesheet" href="../../headers-footer/buttons.css">
		<?php include 'headers-footer/navbar.php'; ?>


		<?php
		include('..\\Model\\connexion.php'); 
		include ("..\\Model\\fonctions_faq.php"); ?>

	</head>
<br><br><br><br>



	<body>
		

        <!-- Boutton Ajouter une question et Boutton modifier une question et Boutton répondre à une question -->

        <a href="../../../../projet_app_info/pages_faq/View/FAQ/Page_visualiser_FAQ.php"> <button class="butt1" id="ajouterbutton"> Modifier FAQ </button> </a>

		<div class="div0">

			<h1>  <b>  <p class="para1" id="togg"> Questions fréquentes  </p>  </b> </h1>

			<!-- /////////////////////////////////////////// 
				Catégorie Profil 
			////////////////////////////////////////////////
			Affichage de toutes les questions contenues dans cette catégorie
			-->

			<p  id="togg1" class="para2" > 1-Profil   </p> 

			<div id ="d1" class="textarea">    <!-- Zone de texte coulissante et apparaissant lorsqu'on click -->
				
			<?php list($stmt1) = select_categorie($pdo,'Profil') ; ?> 

			</div>

			<!-- /////////////////////////////////////////// 
				Catégorie QCM 
			////////////////////////////////////////////////
			Affichage de toutes les questions contenues dans cette catégorie
			-->     
						<p id="text1"> 2- QCM </p>  

			<div id="d2" class="textarea">      <!-- Zone de texte coulissante et apparaissant lorsqu'on click -->

			<?php list($stmt2) = select_categorie($pdo,'QCM') ; ?>

			</div>

			<!-- /////////////////////////////////////////// 
				Catégorie Capteurs
			////////////////////////////////////////////////
			Affichage de toutes les questions contenues dans cette catégorie
			--> 

				<div id="mouv">
				
					<p id="togg3" class="para4">  3- Capteurs  </p>

					<div id="d3" class="textarea">

					<?php list($stmt3) = select_categorie($pdo,'Capteurs') ; ?>
				
					</div>

			<!-- /////////////////////////////////////////// 
				Catégorie Environnement
			////////////////////////////////////////////////
			Affichage de toutes les questions contenues dans cette catégorie
			--> 
					<p id="togg4" class="para5"> 4- Environnement </p>
					<div id="d4" class="textarea">

					<?php list($stmt4) = select_categorie($pdo,'Environnement'); ?>

					</div>  


				</div>

			</div>

<br><br><br><br><br><br><br>
			<?php include 'headers-footer/footer.php'; ?>


        <script type="text/javascript" src="fonction_faq.js"> </script>
	</body>

	
</html>



<!DOCTYPE html>
<html>

    <head>


		<title> Ajouter FAQ </title>
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width , initial-scale = 1.0">
		<link href ="..\\css\\Editer_FAQ.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
		<link rel="stylesheet" href="headers-footer2/navbar.css">
		<link rel="stylesheet" href="headers-footer2/footer.css">
		<link rel="stylesheet" href="headers-footer2/buttons.css">
		<script src="../../Model/fonctionsjavascript.js"> </script>
		

	</head>

	<?php include 'headers-footer2/navbar.php'; ?>

<br><br>
    <body>

		<a href='../FAQ/Page_visualiser_FAQ.php'> 
			<button> 

				<span class="material-symbols-outlined">
				keyboard_return
				</span> 
				
			</button> 
		</a>


			<div class="carre" id="div1">	

        		<!-- Début du formulaire servant à ajouter une question et une réponse , méthode post -->

				<form action="../../Model/ajouter_faq.php" method="post" id="addq">

				    <table class="updatefaq">
                        
					    <tr> 
						<!-- Choix de la catégorie de la question 
						Profil, QCM, Capteurs ou ENvironnement
						-->

						    <th class="titreat"> Categorie: </th>
						    <td>
							    <select id="categorie" type="text" name="Categorie">
									<option  value="Profil">Profil</option>
									<option  value="QCM">QCM</option>
									<option  value="Capteurs">Capteurs</option>
									<option  value="Environnement">Environnement</option>
								</select> 
						    </td>
					    </tr>

					    <tr>  
							<!-- Zone de texte à remplir pour ajouter 
							le libelé de la question -->

						    <th class="titreat"> Contenu de la question: </th>
						    <td> <textarea name="Contenu_question" style="width:400px;height:200px;" required> Question ici </textarea> </td>
					    </tr>

						<tr>
							<!-- Zone de texte à remplir pour ajouter 
							le libelé de la réponse -->

							<th class="titreat"> Contenu de la réponse: </th>

							<td> <textarea name="Contenu_reponse"  style="width:400px;height:200px;" required> Reponse ici </textarea> </td>

						</tr>

						<tr>
							<!-- Boutton Enregistrer pour faire un sublit du formulaire -->
							<td><input type="submit" name="modEnregistrer" onclick="confirmation_ajout()" value="Enregistrer" /></td>
		
						</tr>

				    </table>
			</form> <!-- Fin du formulaire -->			

    		</div>
			<!--<script src="../../Model/fonctionsjavascript.js"> </script> -->
        </body>
		

            
		<br><br>
		<?php include 'headers-footer/footer.php'; ?>



</html>





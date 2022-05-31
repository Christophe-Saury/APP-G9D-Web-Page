<?php include("..//..//Model//Receve_data_from_faq.php") ;?> 


<!DOCTYPE html>
<html>
    <head>

        <title> Modifier la faq</title>
        <meta charset = "utf8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
        <link rel="stylesheet" href="../css/Editer_FAQ.css"/>
        <link rel="stylesheet" href="../../headers-footer/navbar.css">
		<link rel="stylesheet" href="../headers-footer/footer.css">
		<link rel="stylesheet" href="../headers-footer/buttons.css">
    </head>

	<?php include '../headers-footer/navbar.php'; ?>

    <body>
        <a href="../FAQ/Page_visualiser_FAQ.php">
            <button><span class="material-symbols-outlined">
            keyboard_return
            </span> 
        </button>
        </a>

        <form id="modif" action = "../../Model/mod_faq.php" method="post">

        <!-- Formulaire pour la modification -->
        <div id="div1">

        <table>
    
        <tr>
            <input type="hidden" value="<?= $row['id_FAQ']?>"  name="id"/>
        <th class="titreat"> Categorie: </th>
            <td>
            <select id="newcategorie" type="text" name="Categorie">
                <option  value="Profil">Profil</option>
                <option  value="QCM">QCM</option>
                <option  value="Capteurs">Capteurs</option>
                <option  value="Environnement">Environnement</option>
            </select> 
            </td>
        </tr>

        <tr>  <!-- Deuxième ligne du texte -->
            <th class="titreat"> Contenu de la question: </th>
            <td> <textarea id ="newquest" name="Contenu_question" style="width:400px;height:200px;"> <?= $row['Questions'] ?> </textarea> </td>
        </tr>

        <tr>
        <!-- Quatrième ligne de la table -->
        <th class="titreat"> Contenu de la réponse: </th>

        <td> <textarea  id="newrep" name="Contenu_reponse" style="width:400px;height:200px;"> <?= $row['Reponses'] ?> </textarea> </td>

        </tr>

         <tr>
        <!-- Cinquième ligne de la table -->
        <td><input type="submit" name="modEnregistrer"  value="Enregistrer" /></td>

        </tr>

        </table>

        </div>


    </body>
    
    </form>


	<?php include '../headers-footer/footer.php'; ?>
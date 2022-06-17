<?php
include("..\\..\\Controller\\connexion.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title> Gestion des profils </title>

    
<link href ="../css/StylesGestionDesProfils.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="https://malsup.github.io/jquery.form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<link rel="stylesheet" href="headers-footer2/navbar.css">
<link rel="stylesheet" href="headers-footer2/footer.css">
<link rel="stylesheet" href="headers-footer2/buttons.css">


</head>


<?php include 'headers-footer2/navbar.php'; ?>



<body>
<br>
    <!--  1 er boutton Lien retour vers la page faq gestionnaire        
    Deuxième boutton lien vers la rubrique ajouter une question et une réponse
    -->

    <a href= "../../Controller/controleur_faq.php"> <button> 
    <span class="material-symbols-outlined"> keyboard_return </span>
    </button></a>
    <a href="../FAQ/Page_questions_reponses.php"><button> + Ajouter </button></a>
    
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    
    <!-- Visualisation de la faq et tableau de visualisation 
    5 colonnes, ID, QUESTION, REPONSE , CATEGORIE,ACTIONS   
    -->

    <p class=""><h1> Visualiser FAQ </h1></p>

        <!-- Petit script php pour afficher tous les élements de la faq -->
        <?php 
            $stmt = $pdo->prepare("SELECT * FROM `faq`");
            $stmt->execute();
             
            if ($stmt ->rowCount()>0){
            $counter =1;
        ?> 
        <!-- Fin du petit script Php -->

    
                
        <table class="tickets_support">
            <thead>
                <tr class="row1">
                    <th> ID</th>
                    <th>QUESTION</th>
                    <th>REPONSE</th>
                    <th>CATEGORIE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>

            <tbody>   

            <?php foreach($stmt as $row){ ?>
               
            <!-- 
                Affichage des ID, des QUESTIONS, des REPONSES,
                des CATEGORIES ET DES ACTIONS
            -->


                <tr class= "<?php echo("row".$count) ?>">


                    <td id= "<?php echo("id".$row['id_FAQ']) ?>" >
                    
                   <?php echo($row['id_FAQ']);?>        <!-- affiche l'ID-->
                    
                    </td>
                    <td id= "<?php echo("quest".$row['id_FAQ']) ?>" >
                     

                    <?php echo($row['Questions']); ?>  <!-- Affiche les questions -->

                    </td>
                    <td id= "<?php echo("rep".$row['id_FAQ']); ?>" >    

                    <?php echo($row['Reponses']); ?>   <!-- Affiche les réponses  -->
               
                    </td>
                    <td id= "<?php echo("cat".$row['id_FAQ']) ?>" >
                    

                    <?php echo($row['categories']);  ?>  <!-- Affichage des catégories -->

                    </td>
                    
                    <td>

                       <!-- <a href="http://localhost/ISEPAPP1/William/View/FAQ/Page_modifier_faq.php?ID=<?= $row['id_FAQ'] ?>"> <i class="fas fa-pen"> </i></a>  -->
                        <a href="../FAQ/Page_modifier_faq.php?ID=<?= $row['id_FAQ'] ?>"> <i class="fas fa-pen"> </i></a>
                        <br/><br/>
                        <button> <a href="../../Model/supprimer.php?ID=<?= $row['id_FAQ'] ?>"><i class="fas fa-trash"> </i> </a>  </button>
                        
                        <?php
                        $counter = $counter +1 ; } ?>
                        

                    </td>

                    </tr>

                </tbody>
               
                </table> 
                <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


            <?php } else{echo("table vide");} ?>
    
            
            <br><br>
			<?php include 'headers-footer/footer.php'; ?>

            

<script src="..\..\Model\fonctionsjavascript.js"> </script> 
</body>
</html>
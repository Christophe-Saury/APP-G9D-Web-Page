<h1> Visualisation des profils</h1>
    <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='creer_profil'/>
            <button type ='submit'class="button_add"> Creer un nouveau profil</button>
    </form> 
    <br>
    <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='voir_chantier'/>
            <button type ='submit'class="button_add"> Voir les Chantiers</button>
    </form> 
    <h2>Recherche</h2>
    <!--<form name='recherche' method="GET" action="" >-->
    <form name='recherche' method="GET" action="" onsubmit="return test_recherche();">
        <input type="hidden" name = "fonction" value ='rechercher'/>
        <table class="tickets_support">
        <thead>
        <th>
        <label>par nom :</label>
            <input type="search" name='prenom' placeholder=""><br><br>
        <label>par role:</label>
            <select name="role" >
                            <option  value="2">Utilisateur</option>
                            <option  value="1">Gestionnaire</option>
                            <?php if ($role_utilisateur =='0' )
                            { ?>
                            <option value="0">Administrateur</option> <?php
                            }?>
            </select><br><br>
        <input type="submit">
        </th>
        </thead> 
        </table>
    </form>

    <h2>Liste de tous les profils</h2>
    <?php  if ($role_utilisateur == '0'){?>
    <p> il y a actuellement <?php foreach ($nbProfil as $element){echo $element['COUNT(id_utilisateur)'];} ?> profils </p>
    <?php } ?>
    <br>
    <div>
        <table class="tickets_support">
            <thead>
            <tr>
                <th class="row1">ID utilisateur</th>
                <th class="row2">Nom</th> 
                <th class="row3">Prenom</th> 
                <th class="row4">Adresse mail</th>
                <th class="row4">Role</th>
                <th class="row5">chantier associe</th>   
                <th class="row5">Actions possibles</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($liste as $element) { ?>
            <tr>
                <td>
                    <?php echo $element['id_utilisateur'];?>
                </td>
                <td>
                    <?php echo $element['nom']; ?>
                </td>
                <td>
                    <?php echo $element['prenom']; ?>
                </td>
                <td>
                    <?php echo $element['adresse_mail']; ?>
                </td>
                <td>
                    <?php 
                    $ArrayPriorites = array(//Servira à afficher la définition du champ "priorite" dans la table HTML
                        0 => "Administrateur",
                        1 => "Gestionnaire",
                        2 => "Utilisateur",
                        );
                    echo $ArrayPriorites[$element['role']]; ?>
                </td>
                <td>
                    <?php 
                     $id_chantier = $element['chantier'];
                     $nom_chantier = recupereNomChantier ($bdd, $id_chantier);
                     foreach ($nom_chantier as $var)
                     echo $var['nom'];
                     ?>
                </td>
                <td>
                    </form>
                    <form action ='' method ='GET' onsubmit="return confirmer_supprimer();"> 
                        <input type="hidden" name = "action" value ='supprimer'/>
                        <input type ="hidden" name="id_utilisateur_recherche" value ='<?php echo $element['id_utilisateur'];?>'/>
                        <button type="submit">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    </form>
                    <form action = '' method = 'GET'> 
                        <input type="hidden" name ="fonction" value ='editer'/>
                        <input type ="hidden" name="id_utilisateur_recherche" value ='<?php echo $element['id_utilisateur'];?>'/> 
                        <input type ="hidden" name="id_chantier_recherche" value ='<?php echo $element['chantier'];?>'/> 
                        <button type = "submit">
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                </td>
            </tr> 
            <?php } ?>

            <tbody>
        </table>
    </div>  
    <br><br>    

<script>
function confirmer_supprimer(){
    if (confirm ("Voulez vous vraiment supprimer ce profil ? ")){ 
        return true;
    }else {
        return false; 
    }   
}  

</script>

<script>
        function test_recherche(){

    var prenom = document.forms["recherche"]["prenom"];

    if (prenom.value == ""){ 
        alert("Remplissez la barre de recherche"); 
        prenom.focus(); 
        return false;
    } 

    return true; 
}  
    </script>
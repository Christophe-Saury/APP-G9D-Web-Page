<h1> Résultat de la recherche</h1>
    <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='voir_all_profils'/>
            <button type ='submit'class="button_add"> Voir tous les profils</button>
    </form> 

    <div>
    <br>
        <table class="tickets_support">
            <thead>
            <tr>
                <th class="row1">ID utilisateur</th>
                <th class="row2">Nom</th> 
                <th class="row3">Prenom</th> 
                <th class="row4">Adresse mail</th>
                <th class="row4">Role</th>  
                <th class="row5">Actions possibles</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($stmt as $element)
             { ?>
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
        
<script>
    function confirmer_supprimer(){
    if (confirm ("Voulez vous vraiment supprimer ce ticket ? ")){ 
        return true;
    }else {
        return false; 
    }   
}  
function confirmer_fermer(){
    if (confirm ("Voulez vous vraiment fermer ce ticket ? Votre action sera irrémédiable ")){ 
        return true;
    }else {
        return false; 
    }   
} 
</script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h1>Vos tickets</h1>
        <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='ajout'/>
            <button type ='submit'class="button_add"><i class="fas fa-plus"></i> Ajouter un nouveau ticket</button>
        </form> 
        <div>
            <br>
        <table class="tickets_support">
            <thead>
            <tr>
                <th class="row1">Ticket ID</th> <!-- identifiant du ticket -->
                <th class="row2">Sujet</th> <!-- titre du ticket -->
                <th class="row3">Priorité</th> <!-- priorité du ticket -->
                <th class="row4">&Eacute;tat</th> <!-- état du ticket -->
                <th class="row5">Actions possibles</th>
            </tr>
            <thead>
            <tbody>
            <?php foreach ($liste as $element) { ?>
            <tr>
                <td>
                    <?php echo $element['id_ticket'];?>
                </td>
                <td>
                    <?php echo $element['sujet']; ?>
                </td>
                <td>
                    <?php 
                    $ArrayPriorites = array(//Servira à afficher la définition du champ "priorite" dans la table HTML
                        1 => "<span style='color:green;font-weight:bold'>Faible</span>",
                        2 => "<span style='color:orange;font-weight:bold'>Normale</span>",
                        3 => "<span style='color:red;font-weight:bold'>Haute</span>",
                        );
                    echo $ArrayPriorites[$element['priorite']]; ?>
                </td>
                <td>
                <?php
                    $ArrayEtat = array(//servira à afficher la définition du champ "etat" dans la table HTML
                        0 => "<span style='color:red;font-weight:bold'>Fermé</span>",
                        1 => "<span style='color:green;font-weight:bold'>Ouvert</span>",
                        );
                    echo $ArrayEtat[$element['etat']]; ?>
                </td>
                <td>
                    <form action ='' method ='GET'> 
                        <input type="hidden" name = "fonction" value ='voir'/>
                        <input type ="hidden" name="id_ticket_recherche" value ='<?php echo $element['id_ticket'];?>'/>
                        <button type="submit">
                            <i class="fas fa-eye"></i>
                        </button> 
                    </form>
                    <form action ='' method ='GET' onsubmit="return confirmer_supprimer();"> 
                        <input type="hidden" name = "action" value ='supprimer'/>
                        <input type ="hidden" name="id_ticket_recherche" value ='<?php echo $element['id_ticket'];?>'/>
                        <button type="submit" >
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <form action ='' method ='GET'onsubmit="return confirmer_fermer();">
                        <input type="hidden" name = "action" value ='fermer'/>
                        <input type ="hidden" name="id_ticket_recherche" value ='<?php echo $element['id_ticket'];?>'/> 
                        <button type = 'submit'>
                            <i class="fa fa-lock"></i>
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
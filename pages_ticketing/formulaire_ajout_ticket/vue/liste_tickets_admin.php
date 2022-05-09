<h1> Tous les tickets (Administrateur)</h1>
        <div>
            <br>
        <table class="tickets_support">
            <thead>
            <tr>
                <th class="row1">Ticket ID</th> <!-- identifiant du ticket -->
                <th class="row2">Sujet</th> <!-- titre du ticket -->
                <th class="row3">Priorité</th> <!-- priorité du ticket -->
                <th class="row6">&Eacute;tat</th> <!-- état du ticket -->
                <th class ="row7">Auteur</th>
                <th class="row5">Actions possibles</th>
            </tr>
            </thead>
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
                    $ArrayPriorites = array( // servira à afficher la définition du champ "priorite" dans la table HTML
                        1 => "<span style='color:green;font-weight:bold'>Faible</span>",
                        2 => "<span style='color:orange;font-weight:bold'>Normale</span>",
                        3 => "<span style='color:red;font-weight:bold'>Haute</span>",
                        );
                    echo $ArrayPriorites[$element['priorite']]; ?>
                </td>
                <td>
                <?php
                    $ArrayEtat = array( // servira à afficher la définition du champ "etat" dans la table HTML
                        0 => "<span style='color:red;font-weight:bold'>Fermé</span>",
                        1 => "<span style='color:green;font-weight:bold'>Ouvert</span>",
                        );
                    echo $ArrayEtat[$element['etat']]; ?>
                </td>
                <td>
                    <?php 
                    $auteur = $element['id_auteur'];
                    $nom = recupereNomPrenom($bdd, $auteur);
                    foreach ($nom as $element4){
                        echo $element4['nom'];?>
                        <br>
                        <?php echo $element4['prenom'];
                    }?>
                </td>
                <td>
                    <form action ='' method ='GET'> 
                        <input type="hidden" name = "fonction" value ='voir'/>
                        <input type ="hidden" name="id_ticket_recherche" value ='<?php echo $element['id_ticket'];?>'/>
                        <button type ="submit" id="voir">
                            <i class="fas fa-eye"></i>
                        </button> 
                    </form>
                    <form action ='' method ='GET'> 
                        <input type="hidden" name = "action" value ='supprimer'/>
                        <input type ="hidden" name="id_ticket_recherche" value ='<?php echo $element['id_ticket'];?>'/>
                        <button type="submit" >
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <form action ='' method ='GET'>
                        <input type="hidden" name = "action" value ='fermer'/>
                        <input type ="hidden" name="id_ticket_recherche" value ='<?php echo $element['id_ticket'];?>'/> 
                        <button type = 'submit'>
                            <i class="fa fa-lock"></i>
                        </button>
                    </form>
                    <form action = '' method = 'GET'> 
                        <input type="hidden" name = "fonction" value ='ajouter_reponse'/>
                        <input type ="hidden" name="id_ticket_recherche" value ='<?php echo $element['id_ticket'];?>'/> 
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
        
    
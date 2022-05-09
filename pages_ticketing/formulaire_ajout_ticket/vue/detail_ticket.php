<div id="a_masquer" style="display:none;">
    <h1>Visualisation du ticket</h1>
    <?php foreach  ( $ligne as $test)?>
        <table class="view_ticket">  
            <tr>
                <th class="titre">Ticket ID:</th>
                <td>
                    <?php echo $test['id_ticket'];?>
                </td>
            </tr>
            <tr>
                <th class="titre">Sujet:</th>
                <td>
                    <?php echo $test ['sujet']; ?> 
                </td>
            </tr>
            <tr>
                <th class="titre">Message:</th>
                <td>
                    <?php  echo nl2br($test ['message']);?>
                </td>
            </tr>
            <tr>
                <th class="titre">Priorité du message:</th>
                <td>
                <?php $ArrayPriorites = array( // servira à afficher la définition du champ "priorite" dans la table HTML
                        1 => "<span style='color:green;font-weight:bold'>Faible</span>",
                        2 => "<span style='color:orange;font-weight:bold'>Normale</span>",
                        3 => "<span style='color:red;font-weight:bold'>Haute</span>",
                        );
                     echo $ArrayPriorites[$test ['priorite']];?>
                </td>
            </tr>
            <tr>
            <th class="titre">Réponses:</th>
                <td>
                    <?php foreach ($ligne2 as $element2) { ?>
                    <table>
                        <tr>
                            <td>
                                Ajoutée le : <?php echo $element2['date_ajout']; ?>
                                <br />
                                Sujet : <?php echo $element2['sujet'];?>
                                <br />
                                <br />
                                Message : 
                                <br /> <?php echo nl2br($element2['message']);?>
                            </td>
                                                    
                        </tr>
                    </table>
                    <?php }?>
                </td>
            </tr>
            <tr>
            <th class="titre">Ouvert le :</th>
                <td>
                    <?php echo $test ['date_ouverture'];?>
                </td>
            </tr>
            <tr>
            <th class="titre">AUteur :</th>
                <td>
                <?php 
                    $auteur = $test['id_auteur'];
                    $nom = recupereNomPrenom($bdd, $auteur);
                    foreach ($nom as $element4){
                        echo $element4['nom'];?>
                        <br>
                        <?php echo $element4['prenom'];
                    }?>
                </td>
            </tr>
        </table>
        </div>

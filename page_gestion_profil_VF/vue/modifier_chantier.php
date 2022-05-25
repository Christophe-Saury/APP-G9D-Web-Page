<h1>Modifier le chantier selectionné</h1>
    <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='voir_chantier'/>
            <button type ='submit'class="button_add"><span class="material-symbols-outlined">keyboard_return</span></button>
    </form> 
    <br>
    <?php foreach ($liste_chantier as $element) { ?>
    <form method="POST" action ="" name="editer_chantier" onsubmit="return test_ajout_ticket();">
        <table class="add_ticket">
            <tr>
                <th class="titreat">Nom:</th>
                <td>
                    <input type="text" name="nom" value ="<?php echo $element['nom'];?>"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Lieux: </th>
                <td>
                    <input type="text" name="lieux"value ="<?php echo $element['lieux'];?>"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">date de début:</th>
                <td>
                    <input type="date" name="date_debut" value ="<?php echo $element['date_debut'];?>"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">date de fin:</th>
                <td>
                    <input type="date" name="date_fin" value ="<?php echo $element['date_fin'];?>"/> 
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type ="submit" name= "submit">
                </td>
            </tr>
            <?php } ?>
        </table>
    </form>

    <script>
        function test_ajout_ticket(){
    var nom = document.forms["editer_chantier"]["nom"];
    var lieux = document.forms["editer_chantier"]["lieux"];


    if (nom.value == ""){ 
        alert("remplissez le champ Nom"); 
        nom.focus(); 
        return false;
    } 
    if (lieux.value == ""){ 
        alert("remplissez le champ Lieux"); 
        lieux.focus(); 
        return false;
    } 
    return true; 
}  
    </script>


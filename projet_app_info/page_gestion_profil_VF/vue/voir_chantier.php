<br>
<h2>Liste de tous les chantiers</h2>

<form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='voir_all_profils'/>
            <button type ='submit'class="button_add"><span class="material-symbols-outlined">keyboard_return</span></button>
</form> 
<br>
<form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='ajouter_chantier'/>
            <button type ='submit'class="button_add"> Ajouter un nouveau Chantier</button>
</form> 
    <br>
    <div>
        <table class="tickets_support">
            <thead>
            <tr>
                <th class="row1">ID chantier</th>
                <th class="row2">Nom</th> 
                <th class="row3">lieux</th> 
                <th class="row4">date de debut</th>
                <th class="row4">date de fin</th>  
                <th class="row5">Actions possibles</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($liste_chantier as $element) { ?>
            <tr>
                <td>
                    <?php echo $element['id_chantier'];?>
                </td>
                <td>
                    <?php echo $element['nom']; ?>
                </td>
                <td>
                    <?php echo $element['lieux']; ?>
                </td>
                <td>
                    <?php echo $element['date_debut']; ?>
                </td>
                <td>
                    <?php echo $element['date_fin']; ?>
                </td>
                <td>
                    </form>
                    <form action ='' method ='GET' onsubmit="return confirmer_supprimer();"> 
                        <input type="hidden" name = "action" value ='supprimer_chantier'/>
                        <input type ="hidden" name="id_chantier_recherche" value ='<?php echo $element['id_chantier'];?>'/>
                        <button type="submit">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    </form>
                    <form action = '' method = 'GET'> 
                        <input type="hidden" name ="fonction" value ='editer_chantier'/>
                        <input type ="hidden" name="id_chantier_recherche" value ='<?php echo $element['id_chantier'];?>'/> 
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
    if (confirm ("Voulez vous vraiment supprimer ce chantier ? ")){ 
        return true;
    }else {
        return false; 
    }   
}  

</script>
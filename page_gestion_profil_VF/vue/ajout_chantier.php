<h1>Ajouter un chantier</h1>
<form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='voir_chantier'/>
            <button type ='submit'class="button_add"> <span class="material-symbols-outlined">keyboard_return</span></button>
</form> 
<br>

<form method="POST" action ="" name="editer_profil" onsubmit="return test_ajout_ticket();">
        <table class="add_ticket">
            <tr>
                <th class="titreat">Nom:</th>
                <td>
                    <input type="text" name="nom"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Ville </th>
                <td>
                    <input type="text" name="lieux"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Date de début</th>
                <td>
                    <input type="date" name="date_debut" /> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Date de fin</th>
                <td>
                    <input type="date" name="date_fin"/> 
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type ="submit" name= "submit">
                </td>
            </tr>
    </table>
</form>

<script>
    function test_ajout_ticket(){
    var nom = document.forms["editer_profil"]["nom"];
    var prenom = document.forms["editer_profil"]["lieux"];

    if (nom.value == ""){ 
        alert("remplissez le champ Nom"); 
        nom.focus(); 
        return false;
    } 
    if (prenom.value == ""){ 
        alert("remplissez le champ Prenom"); 
        prenom.focus(); 
        return false;
    } 
    return true; 
}  
</script>


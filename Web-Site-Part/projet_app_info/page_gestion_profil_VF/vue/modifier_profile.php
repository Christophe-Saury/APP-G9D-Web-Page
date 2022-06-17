<h1>Modifier le profil selectionné</h1>
    <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='voir_all_profils'/>
            <button type ='submit'class="button_add"> Voir tous les profils</button>
    </form> 
    <br>
    <?php foreach ($liste as $element) { ?>
    <form method="POST" action ="" name="editer_profil" onsubmit="return test_ajout_ticket();">
        <table class="add_ticket">
            <tr>
                <th class="titreat">Nom:</th>
                <td>
                    <input type="text" name="nom" value ="<?php echo $element['nom'];?>"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Prenom: </th>
                <td>
                    <input type="text" name="prenom"value ="<?php echo $element['prenom'];?>"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Adresse mail:</th>
                <td>
                    <input type="text" name="adresse_mail" value ="<?php echo $element['adresse_mail'];?>"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Role : </th>
                <td>
                    <select name="role" value ="<?php echo $element['role'];?>">
                        <option  value="2">Utilisateur</option>    
                        <option  value="1">Gestionnaire</option>
                        <?php if ($role_utilisateur =='0'  )
                        { ?>
                        <option value="0">Administrateur</option> <?php
                        }?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="titreat">Chantier : </th>
                <td>
                <select name="chantier">
                    <?php
                    foreach ($liste_chantier as $element){ ?>
                    <option value="<?php echo ($element['nom']); ?>"><?php echo ($element['nom']); ?></option> 
                    <?php } ?>
                </select>

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
    var nom = document.forms["editer_profil"]["nom"];
    var prenom = document.forms["editer_profil"]["prenom"];
    var mail = document.forms["editer_profil"]["adresse_mail"];

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
    if (mail.value == ""){ 
        alert("remplissez le champ Adresse mail"); 
        mail.focus(); 
        return false;
    }
    return true; 
}  
    </script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h1>Envoyer une réponse</h1>
    <form method='GET' action ='' >
        <input type ="hidden" name= "fonction" value='tickets_admin'/>
        <button type ='submit'class="button_add"> Voir tous les tickets</button>
    </form> 
    <br>
    <form method ='POST' action =''name="ajout_reponse" onsubmit="return test()">
        <table class="add_ticket">
            <tr>
                <th class="titreat">Sujet:</th>
                <td>
                    <input type="text" name="sujet_reponse" value=""/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Réponse:</th>
                <td><textarea name="message_reponse" style="width:400px;height:200px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="ajouter" value="Envoyer" /></td>
            </tr>
        </table>
    </form>

    <script>
    function test(){
    var sujet_reponse = document.forms["ajout_reponse"]["sujet_reponse"];
    var message_reponse = document.forms["ajout_reponse"]["message_reponse"];

    if (sujet_reponse.value == "")                                 
    { 
        alert("remplissez le sujet"); 
        sujet_reponse.focus(); 
        return false;
    } 
    if (message_reponse.value == "")                                 
    { 
        alert("remplissez le message"); 
        message_reponse.focus(); 
        return false;
    } 
    return true; 
}  
</script>
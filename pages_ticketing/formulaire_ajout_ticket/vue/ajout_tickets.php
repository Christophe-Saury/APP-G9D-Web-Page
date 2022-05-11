<h1>Envoyer un nouveau ticket au support</h1>
    <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='tickets'/>
            <button type ='submit'class="button_add"> Voir vos tickets</button>
    </form> 
    <br>
    <form method="POST" action ="" name="ajouter_ticket" onsubmit="return test();">
        <table class="add_ticket">
            <tr>
                <th class="titreat">Sujet:</th>
                <td>
                    <input type="text" name="sujet"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Message:</th>
                <td>
                    <textarea name="message" class="champ"></textarea>
                </td>
            </tr>
            <tr>
                <th class="titreat">Priorité de votre message:</th>
                <td>
                    <select class="vert" name="priorite">
                        <option class="vert" value="1">Faible</option>
                        <option class="orange" value="2">Normale</option>
                        <option class="rouge" value="3">Haute</option>
                    </select>
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
    function test(){
    var sujet = document.forms["ajouter_ticket"]["sujet"];
    var message = document.forms["ajouter_ticket"]["message"];

    if (sujet.value == "")                                 
    { 
        alert("remplissez le sujet"); 
        sujet.focus(); 
        return false;
    } 
    if (message.value == "")                                 
    { 
        alert("remplissez le message"); 
        message.focus(); 
        return false;
    } 
    return true; 
}  
</script>
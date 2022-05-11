<h1>Envoyer une réponse</h1>
    <form method='GET' action =''>
        <input type ="hidden" name= "fonction" value='tickets_admin'/>
        <button type ='submit'class="button_add"> Voir tous les tickets</button>
    </form> 
    <br>
    <form method ='POST' action =''>
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
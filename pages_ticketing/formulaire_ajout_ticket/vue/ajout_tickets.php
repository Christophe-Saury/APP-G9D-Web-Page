<h1>Envoyer un nouveau ticket au support</h1>
    <form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='tickets'/>
            <button type ='submit'class="button_add"> Voir vos tickets</button>
    </form> 
    <br>
    <form method ="POST" action ="">
        <table class="add_ticket">
            <tr>
                <th class="titreat">Sujet:</th>
                <td>
                    <input type="text" name="sujet"/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Message:</th>
                <td><textarea name="message" class="champ"></textarea></td>
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
                <th class="titreat">Votre email:</th>
                <td><input type="text" name="mail" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type ="submit" name= "submit">Envoyer</button>
                </td>
            </tr>
        </table>
    </form>
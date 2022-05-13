<!-- form connexion -->
<form method='GET' action =''>
    <input type ="hidden" name= "fonction" value='tickets'/>
    <button type ='submit'class="button_add"> accedez à vos tickets</button>
</form> 

<form method='GET' action =''>
    <input type ="hidden" name= "fonction" value='inscription'/>
    <button type ='submit'class="button_add"> inscrivez-vous</button>
</form> 

<form action='' method="POST">
    <div>
        <label for="email">Email</label>
        <input type="tetx" name="adresse_mail_co">
    </div>
    <div >
        <label for="password" >Mot de passe</label>
        <input type="text" name="mdp_co"> 
        
    </div>  
    <button type="submit">Envoyer</button>
</form>



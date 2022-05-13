<!-- form inscription -->
<form method='GET' action =''>
    <input type ="hidden" name= "fonction" value='connexion'/>
    <button type ='submit'class="button_add"> retour à la connexion</button>
</form> 

<form action='' method="post">
    <div>
        <label for="email">Email</label>
        <input type="tetx" name="adresse_mail">
    </div>
    <div >
        <label for="password" >Mot de passe</label>
        <input type="text" name="mdp">
    </div>
    <div >
        <select name="role">
            <option class="vert" value="0">admin</option>
            <option class="orange" value="1">gestionnaire</option>
            <option class="rouge" value="2">utilisateur</option>
        </select> 
    </div>
    <button type="submit">Envoyer</button>
</form>
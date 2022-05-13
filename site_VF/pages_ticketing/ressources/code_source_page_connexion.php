<!-- form connexion -->
<form action='' method="post">
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

<!-- form inscription -->
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


<?php
include('C:\xampp\htdocs\pages_ticketing\formulaire_ajout_ticket\modele\requetes.generiques.php');
// Validation du formulaire d'inscription
if (isset($_POST['adresse_mail']) &&  isset($_POST['mdp']) &&  isset($_POST['role'])) {
    $values =  [
        'adresse_mail' => ($_POST['adresse_mail']),
        'mdp' => ($_POST['mdp']),
        'role'=>($_POST['role'])
    ];                  
    // Appel à la BDD à travers une fonction du modèle.
    $table_utilisateur = 'utilisateur';
    insertion($bdd, $values, $table_utilisateur);
    echo ('vous etes inscrit!');
    
}
//formulaire de connexion
echo ('identifiez-vous');
if (isset($_POST['adresse_mail_co']) &&  isset($_POST['mdp_co'])){
    $mail = $_POST['adresse_mail_co'];
    echo ($mail);
    $res =recupereUnUtilisateur($bdd,$mail);
    foreach  ( $res as $test)
    $var = $test['adresse_mail'];
        echo $var;
        if($res = $var){
            echo ('vous etes deja inscrit');
        }else{
            echo ('vous devez vous inscrire');
        }
}
?>




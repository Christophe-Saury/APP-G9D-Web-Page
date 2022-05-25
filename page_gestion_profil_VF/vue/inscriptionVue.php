<form method='GET' action =''>
            <input type ="hidden" name= "fonction" value='voir_all_profils'/>
            <button type ='submit'class="button_add"> <span class="material-symbols-outlined">keyboard_return</span></button>
</form> 

<div class ='inscription'>

    <form class="formulaire" action="" method="POST">
        <h2 class = "titre2">INSCRIPTION</h2>
        <div class="conteneur">
 
            <div class="left_side">
                <label for="name">Email: </label>
                <input class ="in" for="pseudo" type="text" name="email" id="name" required placeholder="Email" maxlength="40">
                <i class="fas fa-user"></i>
            </div>

            <div class="left_side">
                <label for="name">Nom et Prénom: </label>
                <input class ="in"  for="pseudo" type="text" name="pseudo" id="name" required placeholder="Nom et Prénom" maxlength="20">
                <i class="fas fa-user"></i>
            </div>
 
            <div class="left_side">
                <label for="name">Mot de passe: </label>
                       
                <input class ="in"  type="password" name="mdp" id="mdp" required maxlength="20">
                <i class="fas fa-eye"></i>
                <div1>Le mot de passe doit contenir au moins 8 caractères,</div1>
                <div1> avec une majuscule, une minuscule, une lettre, et un chiffre </div1>
            </div>

            <div class="left_side">
                <label for="role">Role: </label>
                <select class ="in"   name="role" id="role">
                    <option value="2">Utilisateur</option>
                    <option value="1">Gestionnaire</option>
                    <?php
                     if (isset($_SESSION['connected']) && $_SESSION['role']=='0'  )
                     { ?>
                    <option value="0">Administrateur</option> <?php

                     }
                    ?>
                </select>
                <i class="fas fa-eye"></i>
            </div>

            <div class="left_side">
                <label for="chantier">chantier: </label>
                <select class ="in"   name="chantier" id="chantier">
                    <option value="NULL">Aucun</option>
                    <?php
                     foreach ($liste_chantier as $element){ ?>
                    <option value="<?php echo ($element['nom']); ?>"><?php echo ($element['nom']); ?></option> 
                    <?php } ?>
                </select>
                <i class="fas fa-eye"></i>
            </div>
 
 
 
            <div class="botom">
                <div class="envoyer">
                    <button type="submit">Soumettre</button>
                </div>
 
                
            </div>
        </div>
    </form>
</div>
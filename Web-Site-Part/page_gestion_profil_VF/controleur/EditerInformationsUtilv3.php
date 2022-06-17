<?php   

include('../modele/database.php');
require('../modele/requetes.php');



$id_user =1; //$_SESSION['id_utilisateur']





if($_POST){
    $NewMail=valid_donnees($_POST['mail']);
    $NewMDP=valid_donnees($_POST['mdp']);


    if($NewMail==""){
        echo "<script language='javascript'> alert('Le champ pour l'email est vide.');</script>";

    } else if ($NewMDP==""){
        echo "<script language='javascript'> alert('Le champ pour le mot de passe est vide.');</script>";

    } else {

        updateInfoUtil($mysqli, $NewMail, $NewMDP, $id_user);

       
    }





}


function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}













// remplacer les inputs par des labels et avoir seulement le mail en input

$result = get_user_info($mysqli, $id_user);
        
    $a = $result->fetch_array(MYSQLI_ASSOC);
    if($a!=null){
        $Prenom = $a['prenom'];
        $Nom = $a['nom'];
        if($a['role']==0){
            $Role="Administrateur";
        } else if ($a['Role']==1){
            $Role="Gestionnaire";
        } else if($a['Role']==2){
            $Role = "Utilisateur";
        }
      
        $Mail = $a['adresse_mail'];
        $MDP=$a['mdp'];


    
    } else {
        echo "No user with id_user in db";
    }


//$question = $result->fetch_assoc();







include('../vue/headeredit.php');
include('../vue/headers-footer/navbar.php');

include('../vue/editer_infos_util.php');
include('../vue/headers-footer/footer.php');




?>














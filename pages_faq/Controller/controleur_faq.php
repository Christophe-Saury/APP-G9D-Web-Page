
<?php
include "connexion.php";
session_start ();
if (isset($_SESSION['role'])){
    $role_utilisateur = $_SESSION['user_id'];
}
else{
    $role_utilisateur =1; 
}



//Controleur des fonctionalités qui nécessitent une gestion d'affichage l'affichage

    if ($role_utilisateur == 1 || $role_utilisateur ==0){
        include "../View/FAQ/Page_faq_gestionnaire.php";
    }else {
        include "../View/FAQ/Page_faq_utilisateur.php" ;
    }   

?>


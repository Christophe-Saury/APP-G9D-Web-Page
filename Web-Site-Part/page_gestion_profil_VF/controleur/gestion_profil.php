<?php
//On récupère les requêtes génériques

require '../modele/requetes.php';
require '../modele/inscrptionModel.php';

//Constantes
session_start ();
$table = 'utilisateur';
$table2 = 'chantier';
$id_utilisateur = $_SESSION['user_id']; //$_SESSION['user_id'];
$role_utilisateur = $_SESSION['role']; //$_SESSION['role'];
//$chantier_utilisateur=1;

//Controleur des fonctionalités qui nécessitent une gestion d'affichage l'affichage
if (isset($_GET['fonction'])){
    $function = ($_GET['fonction']);
}else{
    $function = 'voir_all_profils';
}

//Controleur des fonctionalités des boutons
if(isset($_GET['action'])) {
    $action =$_GET['action'];
    
}else {
    $action='';
}

//Differents cas des deux controleurs d'actions
switch ($action) {
    case 'supprimer' :
        $IDUtilisateur =$_GET ['id_utilisateur_recherche'];
        supprimeUtilisateur ($bdd, $IDUtilisateur);
    break;
    case 'supprimer_chantier' :
        $IDChantier=$_GET['id_chantier_recherche'];
        supprimeChantier ($bdd, $IDChantier);
        $function = 'voir_chantier';
    break;
}

switch ($function) {
    case 'voir_all_profils' :
        $vue = 'affichage_recherche';
        $liencss = "";
        if ($role_utilisateur == '0'){ 
            $liste = recupereTous($bdd,$table);
            $nbProfil= nombreProfil ($bdd);
        }
        elseif ($role_utilisateur == '1'){
            $chantier_utilisateur = recupereChantierUtilisateur($bdd, $id_utilisateur);
            foreach ($chantier_utilisateur as $var){
                $chantier_utilisateur = $var['chantier'];   
            }
            $liste = recupereTousUtilisateurSelontChantier($bdd, $chantier_utilisateur);
            $nbProfil= nombreProfil ($bdd);

        }

    break;
    case 'editer':
        $vue='modifier_profile';
        $liencss = "";
        $id_utilisateur =$_GET['id_utilisateur_recherche'];
        $liste = recupereTousSelontUtilisateur($bdd, $id_utilisateur);
        $table4 = 'chantier';
        $liste_chantier = recupereTous($bdd,$table4);
        //Code appelé si le formulaire a été posté
        if (isset($_POST['nom']) and isset( $_POST ['prenom']) and isset($_POST ['adresse_mail'])and isset($_POST ['role'])) {
            $nom = $_POST ['nom'];
            $prenom = $_POST ['prenom'];
            $adresse_mail = $_POST ['adresse_mail'];
            $role = $_POST ['role'];
            $chantier = $_POST['chantier'];
            $chantier = recupereIDChantier ($bdd, $chantier);
            foreach ($chantier as $element){
                $chantier = $element['id_chantier'];
            }   
        }
        if (isset($nom) and isset($prenom) and isset($adresse_mail)and isset($role)) {
            modifierUtilisateur ($bdd, $nom, $prenom, $adresse_mail, $role, $id_utilisateur,$chantier);
            $liste = recupereTousSelontUtilisateur($bdd, $id_utilisateur);
        }
    break;
    case 'editer_chantier':
        $vue='modifier_chantier';
        $liencss = "";
        $id_chantier =$_GET['id_chantier_recherche'];
        $liste_chantier = recupereTousSelontChantier($bdd, $id_chantier);
        //Code appelé si le formulaire a été posté
        if (isset($_POST['nom']) and isset( $_POST ['lieux']) and isset($_POST ['date_debut'])and isset($_POST ['date_fin'])) {
            $nom = $_POST ['nom'];
            $lieux = $_POST ['lieux'];
            $date_debut = $_POST ['date_debut'];
            $date_fin= $_POST ['date_fin'];
        }
        if (isset($nom) and isset($lieux) and isset($date_debut)and isset($date_fin)) {
            modifierChantier ($bdd,$nom, $lieux, $date_debut,$date_fin, $id_chantier);
            $liste_chantier = recupereTousSelontChantier($bdd, $id_chantier);
        }
    break;
    case 'rechercher' : 
        $vue = 'resultat_recherche';
        $liencss = "";
        $role= $_GET['role'];
         
        if (isset($_GET['prenom']) AND ($_GET['prenom'])!=null){
            $prenom = $_GET['prenom'];
            $prenom = '%'.$prenom.'%';
            $role= $_GET['role'];
            $role =  (int)$role;
            $stmt = multicrit_search($bdd,$prenom,$role);
        }
    break; 
    case 'creer_profil' :
        $liste_chantier = recupereTous($bdd,$table2);
        $liencss = "";
        include 'inscriptionControl.php';
    break;
    case 'voir_chantier': 
        $vue ='voir_chantier';
        $liencss = "";

        $liste_chantier = recupereTous($bdd,$table2);
        
    break; 
    case 'ajouter_chantier' : 
        $vue='ajout_chantier';
        $liencss = "_abs";

        //Code appelé si le formulaire a été posté
        if (isset($_POST['nom']) and isset($_POST['lieux']) and isset($_POST['date_debut'])and isset($_POST['date_fin'])) {
            $values =  [
                'nom' => ($_POST['nom']),
                'lieux' => ($_POST['lieux']),
                'date_debut' => ($_POST['date_debut']),
                'date_fin'=> ($_POST['date_fin'])
            ];                  
            // Appel à la BDD à travers une fonction du modèle.
            insertion($bdd, $values, $table2);
        }
    break; 
}

include '../vue/head/header.php';
include '../vue/headers-footer/navbar.php';
include '../vue/' . $vue . '.php';
include '../vue/headers-footer/lien_footer'.$liencss.'.php';
include '../vue/headers-footer/footer.php';
?>

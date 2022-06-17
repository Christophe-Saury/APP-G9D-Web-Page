<?php
//On récupère les requêtes génériques
include '../modele/requetes_generiques.php';

session_start ();

//Constantes
$table = "tickets";
$table_reponse ='reponse';
$id_utilisateur = $_SESSION['user_id'];//$_SESSION['user_id'];
$role_utilisateur =$_SESSION['role'];// $_SESSION['role'];

//Controleur des fonctionalités qui nécessitent un nouvel affichage
if (isset($_GET['fonction'])){
        $function = ($_GET['fonction']);
}else{
    
    if ($role_utilisateur == 1){
        $function='tickets';
    }else {
        $function='tickets_admin';
    }   
}

//Controleur des fonctionalités qui ne necessitent pas d'affichage
if(isset($_GET['action'])) {
    $action =$_GET['action'];
    $IDTicket =$_GET ['id_ticket_recherche'];
}else {
    $action='';
}

//Differents cas des deux controleurs d'actions
switch ($action) {
    case 'supprimer' :
        supprimeTicket ($bdd, $IDTicket);
    break;

    case 'fermer' : 
        $res = demanderEtat($bdd, $IDTicket);
        changerEtat($bdd, $IDTicket, $res);
    break; 
}

switch ($function) {
    case 'tickets':
        //Afficher la liste des tickets ouverts
        $vue = "liste_tickets";
        $liste = recupereTousSelontUtilisateur($bdd, $id_utilisateur);
    break;

    case 'tickets_admin' : 
        $vue = 'liste_tickets_admin';
        $liste = recupereTous($bdd,$table);
    break;

    case 'ajout': 
        //Ajouter un ticket
        $vue = 'ajout_tickets';
        //Code appelé si le formulaire a été posté
        if (isset($_POST['sujet']) and isset($_POST['message']) and isset($_POST['priorite'])) {
            $values =  [
                'sujet' => ($_POST['sujet']),
                'message' => ($_POST['message']),
                'priorite' => ($_POST['priorite']),
                'id_auteur'=> ($id_utilisateur)
            ];                  
            // Appel à la BDD à travers une fonction du modèle.
            insertion($bdd, $values, $table);
        }
    break;  

    case 'ajouter_reponse':
        $vue ='ajout_reponse';
        if (isset($_POST['sujet_reponse']) and isset($_POST['message_reponse'])) {
            $values =  [
                'sujet' => ($_POST['sujet_reponse']),
                'message' => ($_POST['message_reponse']),
                'id_auteur'=> ($id_utilisateur),
                'ticket_associe'=>($_GET ['id_ticket_recherche'])
            ];                  
            // Appel à la BDD à travers une fonction du modèle.
            insertion($bdd, $values, $table_reponse);
        }
    break;

    case 'voir' :
        $IDTicket =$_GET ['id_ticket_recherche'];
        $ligne= afficheUnTicket ($bdd, $IDTicket);
        $ligne2= recupereReponse($bdd, $IDTicket);
        $vue = "detail_ticket";
    break;

    case 'voir_admin' :
        $IDTicket =$_GET ['id_ticket_recherche'];
        $ligne= afficheUnTicket ($bdd, $IDTicket);
        $ligne2= recupereReponse($bdd, $IDTicket);
        $vue = "detail_ticket_admin";
    break;
}  

//Affichage
include '../vue/head/header.php';
include '../vue/headers-footer/navbar.php';

include '../vue/' . $vue . '.php';
include '../vue/headers-footer/footer.php';

?>



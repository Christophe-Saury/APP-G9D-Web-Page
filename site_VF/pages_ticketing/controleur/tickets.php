<?php
//On récupère les requêtes génériques
include "modele/requetes.generiques.php";
//0n définit le nom de la table
$table = "tickets";
$table_reponse ='reponse';

//On recupère les infos de la personne qui se connecte 
//à completer plus tard avec la partie de @Yassine
$id_utilisateur = 21;//$_SESSION['user_id'];
$role_utilisateur =1;//$_SESSION['role'];
//Controleur des fonctionalités qui nécessitent une gestion d'affichage l'affichage
if (isset($_GET['fonction'])){
        $function = ($_GET['fonction']);
}else{
    if ($role_utilisateur == 1){
        $function='tickets';
    }else {
        $function='tickets_admin';
    }   
}

//Controleur des fonctionalités des boutons
if(isset($_GET['action'])) {
    $action =$_GET['action'];
    $IDTicket =$_GET ['id_ticket_recherche'];
}else {
    $action='';
}
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
        //Afficher la liste des tickets ouvverts
        $vue = "liste_tickets";
        $liste = recupereTousSelontUtilisateur($bdd, $id_utilisateur);
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
    
    case 'tickets_admin' : 
        $vue = 'liste_tickets_admin';
        $table = 'tickets';
        $liste = recupereTous($bdd,$table);
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


include (':/pages_ticketing/formulaire_ajout_ticket/vue/header.php');
include (':/pages_ticketing/formulaire_ajout_ticket/vue/' . $vue . '.php');
include (':/pages_ticketing/formulaire_ajout_ticket/vue/footer.php');
?>
<?php
// Requêtes génériques pour récupérer les données de la BDD
// Appel du fichier déclarant PDO
include("connexion.php"); 

/**
 * Récupère tous les éléments d'une table
 * @param PDO $bdd
 * @param string $table
 * @return array
 */
function recupereTous(PDO $bdd, string $table): array {
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();
}

/**
 * Insère un nouvel élément dans une table
 * @param PDO $bdd
 * @param array $values
 * @param string $table
 * @return boolean
 */
function insertion(PDO $bdd, array $values, string $table): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 2);

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    
    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }

    return $donnees->execute();
}


//Supprime un élément dans la table ticket
function supprimeTicket(PDO $bdd,$id){
    $deleteTicket = $bdd->prepare('DELETE FROM tickets WHERE id_ticket = :id');
    $deleteTicket->execute([
    'id' => $id,
    ]);
}

//Demande l'etat d'un ticket
function demanderEtat(PDO $bdd,$id){
    $valeurEtat = $bdd->prepare('SELECT etat FROM tickets WHERE id_ticket = :id');
    $res= $valeurEtat -> execute([
        'id' => $id,
        ]);

    echo ($res);
}

//Change l'etat d'un ticket
function changerEtat (PDO $bdd,$id,$res) {
    if ($res = 1){
        $etat = 0;
        echo ('if');
    } else {
        $etat = 1;
        echo ('else');
    }

    $changerEtat = $bdd->prepare('UPDATE tickets SET etat = :etat WHERE id_ticket = :id'  );
    $changerEtat->execute([
        'id' => $id,
        'etat' => $etat
        ]);
}

//Recupère une ligne dans ticket selon son ID
function afficheUnTicket ($bdd, $IDTicket){
    $var = $bdd->prepare ('SELECT * FROM tickets WHERE id_ticket = :id');
    $var ->execute([
        'id' => $IDTicket
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

//Récupère la réponse associée à un ticket
function recupereReponse ($bdd, $id_ticket_associe){
    $var = $bdd->prepare ('SELECT * FROM reponse WHERE ticket_associe= :id_ticket_associe');
    $var -> execute ([
        'id_ticket_associe' => $id_ticket_associe
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

//Récupère le nom et prénom de l'auteur d'un ticket
function recupereNomPrenom($bdd, $id_auteur){
    $var = $bdd->prepare ('SELECT nom, prenom FROM utilisateur WHERE id_utilisateur= :id_auteur');
    $var -> execute ([
        'id_auteur' => $id_auteur
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}
//Recupere les tickets d'un utilisateur
function recupereTousSelontUtilisateur(PDO $bdd, string $id_auteur): array {
    $var = $bdd->prepare ('SELECT * FROM tickets WHERE id_auteur = :id_auteur');
    $var ->execute([
        'id_auteur' => $id_auteur
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}
?>
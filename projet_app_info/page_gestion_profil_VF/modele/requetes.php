<?php
// Requêtes génériques pour récupérer les données de la BDD
// Appel du fichier déclarant PDO
include 'connexion.php'; 
include 'database.php';

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

//Supprime un élément dans la table utilisateur
function supprimeUtilisateur(PDO $bdd,$id){
    $deleteTicket = $bdd->prepare('DELETE FROM utilisateur WHERE id_utilisateur = :id');
    $deleteTicket->execute([
    'id' => $id,
    ]);
}

//Supprime un élément dans la table chantier
function supprimeChantier(PDO $bdd,$id_chantier){
    $deleteTicket = $bdd->prepare('DELETE FROM chantier WHERE id_chantier = :id_chantier');
    $deleteTicket->execute([
    'id_chantier' => $id_chantier,
    ]);
}

//Recupere les tickets d'un utilisateur
function recupereTousSelontUtilisateur(PDO $bdd, string $id_utilisateur): array {
    $var = $bdd->prepare ('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur');
    $var ->execute([
        'id_utilisateur' => $id_utilisateur
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}


//Recupere les tickets d'un utilisateur
function recupereTousSelontChantier(PDO $bdd, string $id_chantier): array {
    $var = $bdd->prepare ('SELECT * FROM chantier WHERE id_chantier = :id_chantier');
    $var ->execute([
        'id_chantier' => $id_chantier
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

//Recupère une ligne dans ticket selon son ID
function modifierUtilisateur ($bdd, $nom, $prenom, $adresse_mail, $role, $id_utilisateur, $chantier){
    $var = $bdd->prepare ('UPDATE utilisateur SET nom = :nom, prenom = :prenom, adresse_mail = :adresse_mail, role = :role, chantier = :chantier WHERE id_utilisateur= :id_utilisateur');
    $var ->execute([
        'nom' => $nom,
        'prenom'=> $prenom,
        'adresse_mail'=> $adresse_mail,
        'role' => $role,
        'chantier' => $chantier, 
        'id_utilisateur'=> $id_utilisateur

    ]);
}

//Recupère une ligne dans ticket selon son ID
function modifierChantier ($bdd,$nom, $lieux, $date_debut,$date_fin, $id_chantier){
    $var = $bdd->prepare ('UPDATE chantier SET nom = :nom, lieux = :lieux, date_debut = :date_debut, date_fin = :date_fin WHERE id_chantier= :id_chantier');
    $var ->execute([
        'nom' => $nom,
        'lieux'=> $lieux,
        'date_debut'=> $date_debut,
        'date_fin' => $date_fin,
        'id_chantier'=> $id_chantier
    ]);
}

function nombreProfil ($bdd) {
    $query = 'SELECT COUNT(id_utilisateur) FROM utilisateur;';
    $var = $bdd->query($query);
    $var = $var ->fetchAll();
    return $var;
}

function multicrit_search($bdd, string $prenom, int $role){
    $stmt = $bdd->prepare("SELECT * FROM `utilisateur` WHERE prenom LIKE :prenom AND role LIKE :role ;");
    $stmt->execute([
        ':prenom' => $prenom,
        ':role'=> $role
    ]);
    return $stmt;
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

function recupereIDChantier($bdd, $nom) {
    $var = $bdd->prepare ('SELECT id_chantier FROM chantier WHERE nom= :nom');
    $var -> execute ([
        'nom' => $nom
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

function recupereNomChantier($bdd, $id_chantier) {
    $var = $bdd->prepare ('SELECT nom FROM chantier WHERE id_chantier= :id_chantier');
    $var -> execute ([
        'id_chantier' => $id_chantier
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

function recupereChantierUtilisateur ($bdd,$id_utilisateur){
    $var = $bdd->prepare ('SELECT chantier FROM utilisateur WHERE id_utilisateur= :id_utilisateur');
    $var -> execute ([
        'id_utilisateur' => $id_utilisateur
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

function recupereTousUtilisateurSelontChantier ($bdd, $chantier_utilisateur){
    $var = $bdd->prepare ('SELECT * FROM utilisateur WHERE chantier = :chantier');
    $var -> execute ([
        'chantier' => $chantier_utilisateur
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}



function updateInfoUtil(mysqli $mysqli, string $NewMail, string $NewMDP, string $id_user){
    $query="UPDATE utilisateur SET adresse_mail = ?, mdp=? WHERE id_utilisateur= ?" ;
    $stmt2 = $mysqli->prepare($query);
    $stmt2->bind_param("ssi", $NewMail, $NewMDP, $id_user);
    $stmt2 ->execute() or die($mysqli->error.__LINE__);
}

function get_user_info(mysqli $mysqli, string $id_user){
    $query = 'SELECT * FROM utilisateur WHERE id_utilisateur=?';
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_user);

    $stmt->execute() or die($mysqli->error.__LINE__);

   $result = $stmt->get_result();
   return $result;
}




?>
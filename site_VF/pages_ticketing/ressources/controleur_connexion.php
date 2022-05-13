
<?php
//Formulaire de connexion
$vue = 'page_connexion';
if (isset($_POST['adresse_mail_co']) &&  isset($_POST['mdp_co'])){
    $mail = $_POST['adresse_mail_co'];
    echo ($mail);
    $res =recupereUnUtilisateur($bdd,$mail);
    foreach  ( $res as $test)
    $var = $test['adresse_mail'];
    echo $var;
    if($res = $var){
        echo 'vous etes inscrits';             
    }else{
        echo ('vous devez vous inscrire');
    }
}


case 'inscription' : 
    $vue = "page_inscription";
    if (isset($_GET['adresse_mail']) &&  isset($_GET['mdp']) &&  isset($_GET['role'])) {
        $values =  [
            'adresse_mail' => ($_GET['adresse_mail']),
            'mdp' => ($_GET['mdp']),
            'role'=>($_GET['role'])
        ];                  
        // Appel à la BDD à travers une fonction du modèle.
        $table_utilisateur = 'utilisateur';
        insertion($bdd, $values, $table_utilisateur);
        echo ('vous etes inscrit!'); 
    }
break; 


//Recupère une ligne dans utilisateur selon son mail
function recupereUnUtilisateur ($bdd, $mail){
    $var = $bdd->prepare ('SELECT * FROM utilisateur WHERE adresse_mail = :mail');
    $var ->execute([
        'mail' => $mail
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

function recupereUnMdp ($bdd, $mdp){
    $var = $bdd->prepare ('SELECT * FROM utilisateur WHERE mdp = :mdp');
    $var ->execute([
        'mdp' => $mdp
    ]);
    $ligne = $var ->fetchAll();
    return $ligne;
}

?>
<?php
//cette page doit être encoidée en UTF-8 pour fonctionner correctement
session_start();//pour garder en mémoire la session
    //--------------------
    //SECTION A PARAMETRER
    //--------------------
    
    // connexion à la bdd:
    $mysqli=mysqli_connect('localhost','root','','tickets_support');//'serveur','nom d'utilisateur','pass','nom de la table'
    if(!$mysqli) {
        echo "Erreur connexion BDD";
        exit;//arrêt du reste de l'excution du reste de la page
    }
    //fin de connexion à la bdd
    $IdAdmin=1;//mettre ici votre identifiant unique dans la base de données des membres
    $MailAdmin="votre@mail";//mettre votre adresse pour la réception d'un mail lors d'une réponse ou un nouveau ticket
    $AlerteMail=0;//mettre 1 si vous souhaitez recevoir une alerte par mail lors d'un ajout de ticket
    $NomDeSessionPourId="id_membre";//nom de session qui contient l'id du membre (à adapter avec votre script).
    $UrlPage = "tickets.php"; // cette variable vous permet de modifier les lien de cette page très facilement au cas où vous utiliseriez le script sur une autre page
    $Retour = '<p><a href="'.$UrlPage.'">Retour aux tickets</a></p>'; // quand une action est demandée, on affiche ce lien pour que le membre puisse revenir en arrière
    
    //--------------
    //FIN DE SECTION
    //--------------
$_SESSION[$NomDeSessionPourId]=1;
if(!isset($_SESSION[$NomDeSessionPourId])){
    echo "Vous devez être connecté pour utiliser ce service.";
    exit;
}
$IdMembre=$_SESSION[$NomDeSessionPourId];
$TypeCompte=$IdMembre==$IdAdmin?"Support":"Membre";
$ArrayPriorites = array( // servira à afficher la définition du champ "priorite" dans la table HTML
                        1 => "<span style='color:green;font-weight:bold'>Faible</span>",
                        2 => "<span style='color:orange;font-weight:bold'>Normale</span>",
                        3 => "<span style='color:red;font-weight:bold'>Haute</span>",
                        );
function htmlent($texte){
    return htmlentities($texte,ENT_QUOTES,"UTF-8");//pour sécuriser les champs du formulaire lors de l'insertion dans la bdd
}
function envoyerMail($mail,$sujet,$message){
    global $AlerteMail;
    return $AlerteMail==1?mail($mail,$sujet,$message):0;//vous pouvez adapter mon script formulaire de contact ici: https://www.c2script.com/scripts/formulaire-de-contact-en-php-s6.html
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Vos tickets</title>
    <style>
    table th { border:1px solid black; padding:5px;}
    table td { border:1px solid black; padding:5px;}
    table.tickets_support th { border:1px solid black; padding:5px; text-align:center;}
    table.tickets_support td { border:1px solid black; padding:5px; text-align:center;}
    </style>
</head>
<body>
    <?php
    $AfficherLesTickets = 1; // par défaut on affiche les tickets du membre
    // si une action à été demandée par le membre:
    if(isset($_GET['action'])) {
        if($_GET['action'] == "ajouter"){
            ?>
            <h1>Envoyer un nouveau ticket au support</h1>
            <?php
            $AfficherFormulaire = 1; // par défaut on affiche le formulaire (si ensuite le ticket est envoyé, on le cache en mettant cette variable à 0)
            if(isset($_POST['ajouter'])){
                // si le bouton "Envoyer" à été cliqué, on vérifie que les champs ne soit pas vide ou incorrect:
                if(empty($_POST['sujet']) OR empty($_POST['message']) OR empty($_POST['priorite']) OR empty($_POST['mail'])){
                    echo "<p>Tous les champs doivent être renseignés.</p>";
                } else {
                    // on vérifie si le choix de la priorité est correcte:
                    if(!preg_match("#^(1|2|3)$#",$_POST['priorite'])){
                        echo "<p>Le choix de la priorité est incorrect.</p>";
                    } else {
                        //on vérifie l'adresse mail (voir le script suivant pour plus d'information sur cette regex: https://www.c2script.com/scripts/verifier-une-adresse-mail-en-php-s2.html
                        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail'])){
                            echo "<p>Le mail est incorrect.</p>";
                        } else {
                            // tous les champs sont correctement renseignés, on insère le message dans la bdd et on informe l'administrateur (vous) qu'un nouveau ticket est ouvert:
                            // on sécurise les champs avant de les insérer:
                            $Sujet = trim(htmlent($_POST['sujet']));//trim() permet d'enlever les espaces devant et derrière la chaine de caractères
                            $Message = htmlent($_POST['message']);
                            $Priorite = $_POST['priorite'];
                            $Mail = htmlent($_POST['mail']);
                            if(mysqli_query($mysqli,
                            "INSERT INTO tickets SET
                            id_membre = ".$IdMembre.",
                            mail_du_membre='".$Mail."',
                            sujet = '".$Sujet."',
                            message = '".$Message."',
                            priorite = ".$Priorite.",
                            etat = 1")){
                                echo "<p>Ticket ajouté avec succès!
                                <br />
                                Une réponse vous sera délivrée dans les plus brefs délais.</p>";
                                envoyerMail($MailAdmin, 'Nouveau ticket', 'Nouveau ticket disponible');
                                $AfficherFormulaire = 0;
                            } else {
                                echo "<p>Une erreur s'est produite, merci de réessayer.</p>";
                            }
                        }
                    }
                }
            }
            if($AfficherFormulaire == 1) {
                ?>
                <form action="<?php echo $UrlPage; ?>?action=ajouter" method="post">
                    <table>
                        <tr>
                            <th style="text-align:right;">Sujet:</th>
                            <td><input type="text" name="sujet" value="<?php echo isset($_POST['sujet']) ? htmlent($_POST['sujet']) : ""; ?>" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:right;vertical-align:top;">Message:</th>
                            <td><textarea name="message" style="width:400px;height:200px;"><?php echo isset($_POST['message']) ? htmlent($_POST['message']) : ""; ?></textarea></td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Priorité de votre message:</th>
                            <td>
                                <select name="priorite">
                                    <option value="1"<?php echo isset($_POST['priorite']) ? ($_POST['priorite'] == 1 ? ' selected="selected"' : '') : ""; ?>>Faible</option>
                                    <option value="2"<?php echo isset($_POST['priorite']) ? ($_POST['priorite'] == 2 ? ' selected="selected"' : '') : ""; ?>>Normale</option>
                                    <option value="3"<?php echo isset($_POST['priorite']) ? ($_POST['priorite'] == 3 ? ' selected="selected"' : '') : ""; ?>>Haute</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:right;vertical-align:top;">Votre email:</th>
                            <td><input type="text" name="mail" value="<?php echo isset($_POST['mail']) ? htmlent($_POST['mail']) : ""; ?>" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="ajouter" value="Envoyer" /></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
            // une action est demandée, on affiche pas le reste de la page (les tickets du membre):
            $AfficherLesTickets = 0;
            // et on afficher un lien pour pouvoir revenir en arrière
            echo $Retour;
        } elseif($_GET['action'] == "repondre") {
            ?>
            <h1>Ajouter une réponse</h1>
            <?php
            // tout d'abord, vérifion si l'id du ticket est dans l'url:
            if(!isset($_GET['id']) OR !preg_match("#^[0-9]+$#",$_GET['id'])) { // on demande si l'id est dans l'url et si l'id est un chiffre
                echo "<p>L'identifiant du ticket est inconnu ou incorrect.</p>";
            } else {
                // on vérifie que le ticket demandé existe et qu'il lui appartient, sauf si c'est l'admin, on affiche le ticket pour pouvoir répondre:
                $IdTicket = $_GET['id'];
                $req = mysqli_query($mysqli,"SELECT * FROM tickets WHERE id = ".$IdTicket.($IdMembre==$IdAdmin?"":" AND id_membre = ".$IdMembre));
                if(mysqli_num_rows($req) != 1){
                    echo "<p>Le ticket demandé n'existe pas (ou plus)".($IdMembre==$IdAdmin?"":" ou n'est pas le votre").".</p>";
                } else {
                    // le ticket à été trouvé et lui appartient, on affiche le formulaire:
                    $info = mysqli_fetch_assoc($req);
                    $AfficherFormulaire = 1;
                    if(isset($_POST['repondre'])){
                        // si le bouton "Répondre" à été cliqué, on vérifie que le champ message ne soit pas vide:
                        if(empty($_POST['message'])){
                            echo "<p>Le message est vide.</p>";
                        } else {
                            // on insère le message dans la bdd et on informe l'administrateur (vous) qu'un nouvelle réponse à été ajoutée:
                            if(mysqli_query($mysqli,"INSERT INTO reponses SET
                            id_ticket = ".$IdTicket.",
                            message = '".htmlent($_POST['message'])."',
                            poste_par = '".$TypeCompte."'")){
                                echo "<p>Réponse ajoutée avec succès !
                                <br />
                                Une réponse vous sera délivrée dans les plus brefs délais.</p>";
                                envoyerMail(($IdMembre==$IdAdmin?$info['mail_du_membre']:$MailAdmin), 'Nouvelle reponse', 'Nouvelle reponse au ticket disponible: #'.$IdTicket);
                                $AfficherFormulaire = 0;
                            } else {
                                echo "<p>Une erreur s'est produite, merci de réessayer.</p>";
                            }
                        }
                    }
                    if($AfficherFormulaire == 1) {
                        ?>
                        <form action="<?php echo $UrlPage; ?>?action=repondre&amp;id=<?php echo $IdTicket; ?>" method="post">
                            <table>
                                <tr>
                                    <th style="text-align:right;">Sujet:</th>
                                    <td><?php echo $info['sujet']; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;vertical-align:top;">Message:</th>
                                    <td><textarea name="message" style="width:400px;height:200px;"><?php echo isset($_POST['message']) ? htmlent($_POST['message']) : ""; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="repondre" value="Répondre" /></td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    }
                    $AfficherLesTickets = 0;
                    echo $Retour;
                }
            }
        } elseif($_GET['action'] == "afficher") {
            ?>
            <h1>Visualisation du ticket</h1>
            <?php
            // tout d'abord, vérifion si l'id du ticket est dans l'url:
            if(!isset($_GET['id']) OR !preg_match("#^[0-9]+$#",$_GET['id'])) { // on demande si l'id est dans l'url et si l'id est un chiffre
                echo "<p>L'identifiant du ticket est inconnu ou incorrect.</p>";
            } else {
                // on vérifie que le ticket demandé existe et qu'il lui appartient:
                $IdTicket = $_GET['id'];
                $req = mysqli_query($mysqli,"SELECT * FROM tickets WHERE id = ".$IdTicket.($IdMembre==$IdAdmin?"":" AND id_membre = ".$IdMembre));
                if(mysqli_num_rows($req) != 1) {
                    echo "<p>Le ticket demandé n'existe pas (ou plus) ou n'est pas le votre.</p>";
                } else {
                    // le ticket à été trouvé et lui appartient, on lui affiche:
                    $info = mysqli_fetch_assoc($req);
                    ?>
                    <table>
                        <tr>
                            <th style="text-align:right;">Ticket ID:</th>
                            <td>#<?php echo $info['id']; ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Sujet:</th>
                            <td><?php echo $info['sujet']; ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:right;vertical-align:top;">Message:</th>
                            <td><?php echo nl2br($info['message']);/*la fonction nl2br() permet de remplacer des sauts de ligne par des <br /> (le saut de ligne en html)*/ ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Priorité du message:</th>
                            <td><?php echo $ArrayPriorites[$info['priorite']]; ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:right;vertical-align:top;">Réponses:</th>
                            <td>
                                <a href="<?php echo $UrlPage; ?>?action=repondre&amp;id=<?php echo $IdTicket; ?>">Ajouter une réponse</a>
                                <br />
                                <?php
                                // si des réponses ont été ajoutées, on les affichent:
                                $req = mysqli_query($mysqli,"SELECT * FROM reponses WHERE id_ticket = ".$IdTicket." ORDER BY id DESC");
                                if(mysqli_num_rows($req) == 0) {
                                    echo "Aucune réponse ajoutée pour le moment.";
                                } else {
                                    while($info = mysqli_fetch_assoc($req)) {
                                        ?>
                                        <table>
                                            <tr>
                                                <th style="vertical-align:top;border-top:none;border-left:none;">
                                                    Ajoutée le<br /><?php echo $info['quand']; ?>
                                                    <br />
                                                    Par <?php echo $info['poste_par']; ?>
                                                </th>
                                                <td style="border-top:none;border-right:none;border-left:none;"><?php echo nl2br($info['message']); ?></td>
                                            </tr>
                                        </table>
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
            }
            // une action est demandée, on affiche pas le reste de la page (les tickets du membre):
            $AfficherLesTickets = 0;
            // et on afficher un lien pour pouvoir revenir en arrière
            echo $Retour;
        } elseif($_GET['action'] == "supprimer") {
            // on suppime le ticket et les réponses si il y en a:
            ?>
            <h1>Suppression du ticket</h1>
            <?php
            // tout d'abord, vérifion si l'id du ticket est dans l'url:
            if(!isset($_GET['id']) OR !preg_match("#^[0-9]+$#",$_GET['id'])) { // on demande si l'id est dans l'url et si l'id est un chiffre
                echo "<p>L'identifiant du ticket est inconnu ou incorrect.</p>";
            } else {
                // on vérifie que le ticket demandé existe et qu'il lui appartient:
                $IdTicket = $_GET['id'];
                $req = mysqli_query($mysqli,"SELECT * FROM tickets WHERE id = ".$IdTicket.($IdMembre==$IdAdmin?"":" AND id_membre = ".$IdMembre));
                if(mysqli_num_rows($req) != 1) {
                    echo "<p>Le ticket demandé n'existe pas (ou plus)".($IdMembre==$IdAdmin?"":" ou n'est pas le votre").".</p>";
                } else {
                    if(!isset($_GET['supprimer'])){//vérification de certitude...
                        ?>
                        <p>&Ecirc;tes vous sûr ? <a href="<?php echo $UrlPage; ?>?action=supprimer&amp;id=<?php echo $IdTicket; ?>&amp;supprimer">Oui</a></p>
                        <?php
                    } else {
                        //on supprime le ticket
                        mysqli_query($mysqli,"DELETE FROM tickets WHERE id = ".$IdTicket);
                        //puis les réponses
                        mysqli_query($mysqli,"DELETE FROM reponses WHERE id_ticket = ".$IdTicket);
                        echo "<p>Ticket et réponses supprimées!</p>";
                    }
                }
            }
        } elseif($_GET['action'] == "fermer") {
            // on suppime le ticket et les réponses si il y en a:
            ?>
            <h1>Fermeture du ticket</h1>
            <?php
            // tout d'abord, vérifion si l'id du ticket est dans l'url:
            if(!isset($_GET['id']) OR !preg_match("#^[0-9]+$#",$_GET['id'])) { // on demande si l'id est dans l'url et si l'id est un chiffre
                echo "<p>L'identifiant du ticket est inconnu ou incorrect.</p>";
            } else {
                // on vérifie que le ticket demandé existe et qu'il lui appartient:
                $IdTicket = $_GET['id'];
                $req = mysqli_query($mysqli,"SELECT * FROM tickets WHERE id = ".$IdTicket.($IdMembre==$IdAdmin?"":" AND id_membre = ".$IdMembre));
                if(mysqli_num_rows($req) != 1) {
                    echo "<p>Le ticket demandé n'existe pas (ou plus)".($IdMembre==$IdAdmin?"":" ou n'est pas le votre").".</p>";
                } else {
                    if(!isset($_GET['fermer'])){//vérification de certitude...
                        ?>
                        <p>&Ecirc;tes vous sûr ? <a href="<?php echo $UrlPage; ?>?action=fermer&amp;id=<?php echo $IdTicket; ?>&amp;fermer">Oui</a></p>
                        <?php
                    } else {
                        //on ferme le ticket
                        mysqli_query($mysqli,"UPDATE tickets SET etat=0 WHERE id = ".$IdTicket);
                        echo "<p>Ticket fermé!</p>";
                    }
                }
            }
        }
    }
    // fin des actions
    // on affiche les tickets du membre si aucune action n'est demandée:
    if($AfficherLesTickets == 1) {
        if($IdMembre==$IdAdmin){//on affiche les tickets ouverts pour l'admin:
            echo "<h1>Les tickets ouverts (Administration)</h1>";
            // on intéroge la table "tickets" pour voir si il y à des tickets ouverts, si oui, on les affiches:
            $req = mysqli_query($mysqli,"SELECT * FROM tickets WHERE etat=1 ORDER BY id DESC,priorite DESC");
            if(mysqli_num_rows($req) == 0) {
                echo "<p>Il n'y pas de ticket ouvert</p>";
            } else {
                ?>
                <table class="tickets_support">
                    <tr>
                        <th>Ticket ID</th> <!-- identifiant du ticket -->
                        <th>Sujet</th> <!-- titre du ticket -->
                        <th>Priorité</th> <!-- priorité du ticket -->
                        <th>&Eacute;tat</th> <!-- état du ticket -->
                        <th>Actions possibles</th>
                    </tr>
                <?php
                // on fait notre boucle (while) pour afficher la liste des tickets:
                while($info = mysqli_fetch_assoc($req)) {
                    ?>
                    <tr>
                        <td>#<?php echo $info['id']; ?></td>
                        <td><?php echo $info['sujet']; ?></td>
                        <td><?php echo $ArrayPriorites[$info['priorite']]; ?></td>
                        <td><span style='color:green;font-weight:bold'>Ouvert</span></td>
                        <td>
                            <a href="<?php echo $UrlPage; ?>?action=afficher&amp;id=<?php echo $info['id']; ?>">Afficher ce ticket</a>
                            <br />
                            <a href="<?php echo $UrlPage; ?>?action=fermer&amp;id=<?php echo $info['id']; ?>">Fermer ce ticket</a>
                            <br />
                            <a href="<?php echo $UrlPage; ?>?action=supprimer&amp;id=<?php echo $info['id']; ?>">Supprimer ce ticket</a>
                            <br />
                        </td>
                    </tr>
                    <?php
                }
                // en fin, on ferme notre table HTML:
                ?>
                </table>
                <?php
            }
        } else {//on affiche les tickets du membre:
            echo "<h1>Vos tickets</h1>";
            echo "<p><a href='".$UrlPage."?action=ajouter'>Ajouter un nouveau ticket</a></p>";
            // on intéroge la table "tickets" pour voir si le membre à des tickets d'ajoutés, si oui, on les affiches:
            $req = mysqli_query($mysqli,"SELECT * FROM tickets WHERE id_membre = ".$IdMembre." ORDER BY id DESC"); // "ORDER BY id DESC" permet d'afficher les tickets les plus récents en haut du tableau
            if(mysqli_num_rows($req) == 0) {
                echo "<p>Vous n'avez pas encore ajouté de ticket</p>";
            } else {
                // la table contien 1 ou plusieurs tickets de ce membre, on les affiches dans un tableau HTML (La table HTML permettra une meilleure compréhension des données que l'ont va afficher)
                ?>
                <table class="tickets_support">
                    <tr>
                        <th>Ticket ID</th> <!-- identifiant du ticket -->
                        <th>Sujet</th> <!-- titre du ticket -->
                        <th>Priorité</th> <!-- priorité du ticket -->
                        <th>&Eacute;tat</th> <!-- état du ticket -->
                        <th>Actions possibles</th>
                    </tr>
                <?php
                // on fait notre boucle (while) pour afficher la liste des tickets du membre:
                while($info = mysqli_fetch_assoc($req)) {
                    ?>
                    <tr>
                        <td>#<?php echo $info['id']; ?></td>
                        <td><?php echo $info['sujet']; ?></td>
                        <td><?php echo $ArrayPriorites[$info['priorite']]; ?></td>
                        <td><?php echo $info['etat'] == 1 ? "<span style='color:green;font-weight:bold'>Ouvert</span>" : "<span style='color:gray;font-weight:bold'>Fermé</span>"; ?></td>
                        <td>
                            <a href="<?php echo $UrlPage; ?>?action=afficher&amp;id=<?php echo $info['id']; ?>">Afficher ce ticket</a>
                            <br />
                            <a href="<?php echo $UrlPage; ?>?action=fermer&amp;id=<?php echo $info['id']; ?>">Fermer ce ticket</a>
                            <br />
                            <a href="<?php echo $UrlPage; ?>?action=supprimer&amp;id=<?php echo $info['id']; ?>">Supprimer ce ticket</a>
                            <br />
                        </td>
                    </tr>
                    <?php
                }
                // en fin, on ferme notre table HTML:
                ?>
                </table>
                <?php
            }
        }
    }
    ?>
</body>
</html>
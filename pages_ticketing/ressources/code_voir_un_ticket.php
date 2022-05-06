//visualiser en détail un ticket
if (isset($_POST['id_ticket_recherche'])) {
    $IdTicket = isset ($_POST['id_ticket']);
    $liste = rechercheParType($bdd, $table, $IdTicket);
        
    
}

/**
 * Recherche un ticket  en fonction du type passé en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param string $type
 * @return array
 */
function rechercheParIDTicket(PDO $bdd, string $table, string $type): array {
    
    return recherche($bdd, $table, ['id_ticket' => $type]);
    
}



 
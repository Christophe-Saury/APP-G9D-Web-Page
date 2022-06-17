function confirmer_supprimer(){
    if (confirm ("Voulez vous vraiment supprimer ce ticket ? ")){ 
        return true;
    }else {
        return false; 
    }   
}  
function confirmer_fermer(){
    if (confirm ("Voulez vous vraiment fermer ce ticket ? Votre action sera irrémédiable ")){ 
        return true;
    }else {
        return false; 
    }   
}  

function test_ajout_reponse(){
    var sujet_reponse = document.forms["ajout_reponse"]["sujet_reponse"];
    var message_reponse = document.forms["ajout_reponse"]["message_reponse"];

    if (sujet_reponse.value == "")                                 
    { 
        alert("remplissez le sujet"); 
        sujet_reponse.focus(); 
        return false;
    } 
    if (message_reponse.value == "")                                 
    { 
        alert("remplissez le message"); 
        message_reponse.focus(); 
        return false;
    } 
    return true; 
}  


    function test_ajout_ticket(){
    var sujet = document.forms["ajouter_ticket"]["sujet"];
    var message = document.forms["ajouter_ticket"]["message"];

    if (sujet.value == "")                                 
    { 
        alert("remplissez le sujet"); 
        sujet.focus(); 
        return false;
    } 
    if (message.value == "")                                 
    { 
        alert("remplissez le message"); 
        message.focus(); 
        return false;
    } 
    return true; 
}  

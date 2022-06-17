
function load_data(id){
/* Fonction permettant d'envoyer les données des formulaires depuis la 
page Page_questions_reponses vers la page Page_modifier_faq
*/ 

    var text_id = document.getElementById("id"+id).innerHTML;
    
    
    var textquest = document.getElementById("quest"+id).innerHTML;
    var textrep = document.getElementById("rep"+id).innerHTML; 
        
    document.getElementById("mod_id").innerHTML = toString(text_id);

    document.getElementById("newquest").innerHTML = textquest;

    document.getElementById("newrep").innerHTML = textrep;

}


function confirmation_suppression(){

    alert("La suppression a bien été effectuée");
}


function confirmation_ajout(){
    
    alert("La nouvelle question a bien été ajoutée");
}


function envoyer(id){
    var textquest = document.getElementById('quest' + id).value,
        textrep = document.getElementById('rep' + id).value,
        textcat = document.getElementById('cat' + id).value;
     
     
       
        send_request(textquest, textrep, textcat);
      
    
        function send_request(id, quest, rep) 
        {
  
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
  
                alert(xhttp.responseText);
                
              }
          };
          xhttp.open("POST", "../View/FAQ/Page_modifier_faq.php"+id+"&quest="+quest+"+rep="+rep, true);
          xhttp.send(); 
        }
  }

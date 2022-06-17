<?php 
//On récupère les requêtes génériques
require '../modele/Requetes_sql_qcm.php';
//require 'Fonctions_qcm.php';
session_start ();





$id_utilisateur = $_SESSION['user_id']; //$_SESSION['user_id'];
$role_utilisateur = $_SESSION['role']; // $_SESSION['role'];



// securiser les champs de texte d'input de la part de l'utilisateur
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}







//Controleur des fonctionalités qui nécessitent une gestion d'affichage l'affichage
if (isset($_GET['page'])){
    $page = ($_GET['page']);
}else{

if ($role_utilisateur == 2){
    $page='accueil_qcm_util';
}else {
    $page='accueil_qcm_admin_gest';
}   
}




switch($page){

     //afficher la page d'accueil utilisateur
    case 'accueil_qcm_util':
        $head='head_index_quiz';
        $vue="vue_index_qcm_util";
        $aftervue="";
    break;


    //afficher la page d'accueil administrateur et gestionnaire
    case 'accueil_qcm_admin_gest':
        $head='head_index_quiz';
        $vue="vue_index_qcm_admin_gest";
        $aftervue="";
    break;

    
    case 'Accueil_quiz':
        $head='head_accueil_quiz';
        $vue = 'vue_accueil_quiz';
        $aftervue="";
           // Get Total Questions
        $results = Get_questionscontent($mysqli);
        $total_quest = $results->num_rows;
        break;



    case 'add_question':
        $head='head_add';
        $vue = 'vue_add';
        $aftervue="";
        if(isset($_POST['submit'])){
            // Get post variables
            $question_number = $_POST['question_number'];
        
            $question_text = valid_donnees($_POST['question_text']);
            $correct_choice = $_POST['correct_choice'];
            //Choices array
            $choices = array();
            $choices[1] = valid_donnees($_POST['choice1']);
            $choices[2] = valid_donnees($_POST['choice2']);
            $choices[3] = valid_donnees($_POST['choice3']);
            $choices[4] = valid_donnees($_POST['choice4']);
            $choices[5] = valid_donnees($_POST['choice5']);
            $choices[6] = valid_donnees($_POST['choice6']);
    
    
        //Checking if there's already an entry
        $result = Check_isthereQuestion($mysqli, $question_number);
        $isentry = $result->num_rows;
    
        //check all conditions
        if($isentry==0 && $question_text !="" && $correct_choice>=1 && $correct_choice<=6 && $choices[1]!="" && $choices[2]!="" && $choices[3]!="" && $choices[4]!="" && $choices[5]!="" && $choices[6]!="" ){
            //Does if all conditions are respected
    
    
            //Question query
            $insert_row = Insert_intoquestions($mysqli, $question_number, $question_text);
        
            //Validate insert
            if($insert_row){
                foreach($choices as $choice => $value){
                    if($value != ''){
                        if($correct_choice == $choice){
                            $is_correct = 1;
                        } else {
                            $is_correct = 0;
                        }
                        //Choice query
                        $insert_row = Insert_intochoices($mysqli, $question_number, $is_correct, $value);
        
                        // Validate insert
                        if($insert_row){
                            continue;
                        } else {
                            die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
                        }
                    }
                }
                echo "<script language='javascript'> alert('Une question a été ajouté à la base de donnée.');</script>";
            }
        } elseif($isentry==1) {
            // If there's already an entry with that number
            echo "<script language='javascript'> alert('Il y a déjà une entrée avec ce numéro de question.');</script>";
        } elseif($question_text ==""){
            // If the question field is empty
            echo "<script language='javascript'> alert('Le champ du texte de la question est vide. Veuillez le remplir pour ajouter une question.');</script>";
        } elseif($choices[1]=="" || $choices[2]=="" || $choices[3]=="" || $choices[4]=="" || $choices[5]=="" || $choices[6]==""){
            // If one of the choices fields is left empty
            echo "<script language='javascript'> alert('Tous les champs de réponses à la question ne sont pas remplis. Veuillez les remplir pour ajouter une question');</script>";
        } elseif($correct_choice<1 || $correct_choice>6){
            // If correct_choice isn't within the 1-6 range
            echo "<script language='javascript'> alert('Le numéro de la bonne réponse n est pas compris entre 1 et 6. Veuillez entrer un numéro de bonne réponse valide.');</script>";
        }
    
        }
    
        // Get content from questions
        $retval = Get_questionscontent($mysqli);
        $total_quest = $retval->num_rows;
        // Make array of question nb and content
        $question_nb_arr = array();
        $question_text_arr = array();
        while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
        $question_nb_arr[]=$row[0];
        $question_text_arr[]=$row[1];
        }
        $next = $question_nb_arr[$total_quest-1]+1;
    
    break;






    case 'Affiche_reponses':
        $head='head_affichage_rep';
        $vue = 'vue_affichageReponses';
        $aftervue="";
        $i=1;
        $number =1;
    
    
    
        // Get questions
        $retval = Get_questionscontent($mysqli);
        // Get Total number of Questions
        $total_quest = $retval->num_rows;
        $question_nb_arr = array();
        $question_text_arr = array();
    
        while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
            $question_nb_arr[]=$row[0];
            $question_text_arr[]=$row[1];
        }
    
    
        // Get Choices
        $retval = Get_choicescontent($mysqli);
        // Make array of choices id
        $choices_id_arr = array();
        $choices_text_arr = array();
        $iscorrect_arr = array();
    
        while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
            $choices_id_arr[]=$row[0];
            $choices_text_arr[]=$row[3];
            $iscorrect_arr[]=$row[2];
        }
    break;


    case 'Classement':
        $head='head_classement';
        $vue = 'vue_classement';
        $aftervue="";
        $datedujour = date('Y-m-d'); //'date('Y-m-d')';
        /* First rank will be 1 and second be 2 and so on */
        $ranking = 1;
        $id_user = 1;
        $ranking_user=0;
        $name_user="";
        $score_user=0;
        $other_id_user=0;
        $first_username="";
        $second_username="";
        $third_username="";

        $username_arr=array();
        $id_user_arr=array();
        $ranking_arr=array();

        // Get score for the current day and order them in descending order 
        $result = Get_scoreforday_orderbyscore($mysqli, $datedujour);
        $total = $result->num_rows;
        while($a = $result->fetch_array(MYSQLI_ASSOC)){
        $Prenom = $a['prenom'];
        $Nom = $a['nom'];
        $username_arr[]=$Prenom." ".$Nom;

        if($a['id_utilisateur'] == $id_user){
            $ranking_user=$ranking;
            $name_user=$Prenom." ".$Nom;
            $score_user=$a['score'];
        }
            $ranking++;
        }

        // Checks if there's less than 3 scores for the day.
        if ($total == 0) {
            $username_arr[]="/";
            $username_arr[]="/";
            $username_arr[]="/";
        } elseif ($total == 1) {
            $username_arr[]="/";
            $username_arr[]="/";
        } elseif ($total == 2) {
            $username_arr[]="/";
        }
    break;


    case 'Score_quiz':
        $head='head_score';
        $vue = 'vue_score';
        $aftervue="";
         // variables def
        $datedujour= date('Y-m-d');//date('Y-m-d')
        $id_user =1;
        $score= $_SESSION['score'];

        // Get Total number of Questions
        $results = Get_questionscontent($mysqli);
        $total_quest = $results->num_rows;


        // Get score en pourcentage
        $Mauv_Rep = $total_quest - $score; 
        $score_prcent = (($score * 100) - ($score *100) % $total_quest) / $total_quest;

        // Check if user has a score for the day
        $result = Check_hasaScore($mysqli, $id_user, $datedujour);
        $total_result = $result->num_rows;

        // Based on whether there is already a score for the day does a or b
        if($total_result == 0){
            // Do : Insert Score into database
            Insert_score($mysqli, $score_prcent, $id_user, $datedujour);

        } else {
            // Do : Update score in db
            Update_score($mysqli, $score_prcent, $id_user, $datedujour);
        }
    break;


    case 'Gestion_question':
        $head='head_supprim_quest';
        $vue = 'vue_supprim_question';
        $aftervue="";
        $i=1;
        $number =1;
    
        if(isset($_POST['number'])){
            $number = $_POST['number'];
            // Delete une question et ses choix associés
            Delete_question($mysqli, $number);
            Delete_choices($mysqli, $number);
        }
    
    
        // Get questions
        $retval = Get_questionscontent($mysqli);
        // Get total number of questions
        $total_quest = $retval->num_rows;
        $question_nb_arr = array();
        $question_text_arr = array();
        while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
            $question_nb_arr[]=$row[0];
            $question_text_arr[]=$row[1];
        }
    
    
        // Get Choices
        $retval = Get_choicescontent($mysqli);
        $choices_id_arr = array();
        $choices_text_arr = array();
        $iscorrect_arr = array();
    
        while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
            $choices_id_arr[]=$row[0];
            $choices_text_arr[]=$row[3];
            $iscorrect_arr[]=$row[2];
        }
    
        $correct_choice="";
    
    break;


    case 'Hist_score_util':
        $head='head_hist_score';
        $vue = 'vue_hist_score';
        $aftervue="";
         // Variable declaration
        if(isset($_POST['submit'])){
            $id_user = $_POST['idsouhaite'];;
        } else {
            $id_user = 1;
        }

        // Variable declaration
        $datedujour = date('Y-m-d'); //'date('Y-m-d')';
        /* First rank will be 1 and second be 2 and so on */
        $ranking = 1;
        $id_user = 1;
        $i=1;


        $Prenom_arr=array();
        $Nom_arr=array();
        $id_user_arr=array();
        $ranking_arr=array();

    // Get score for the current day and order them in descending order 
        $result = Get_scoreUser_OrderDate($mysqli, $id_user);
        // Get total number of scores
        $total = $result->num_rows;

        while($a = $result->fetch_array(MYSQLI_ASSOC)){
            $Prenom_arr[] = $a['prenom'];
            $Nom_arr[] = $a['nom'];
            $ranking_arr[] = $ranking;
            $score_arr[]=$a['score'];
            $date_arr[]=$a['jour'];
            $ranking++;
        }
    break;



   /* case 'Questions_qcm':
        $vue = 'vue_question_qcm';
        $aftervue="";
        session_start();
        $i=0;
        
        $qp=(string) $_GET['qp'];
        $qp_split= str_split($qp, 2);
        
        while($i<count($qp_split)){
            $qp_nb_arr[]=intval($qp_split[$i]);
            $i++;
        }
        
        //Set Question number
        $quest_number = (int) $_GET['n'];
        
        //Put all the questions in an array
        // Get questions
        $retval = Get_questionscontent($mysqli);
        $total_quest = $retval->num_rows;
        
        // store result in arrays
        $question_nb_arr = array();
        $question_text_arr = array();
        
        while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
            $question_nb_arr[]=$row[0];
            $question_text_arr[]=$row[1];
        }
        
        $question_nb_arr = array_diff($question_nb_arr, $qp_nb_arr);
        $final_quest_arr = array_values($question_nb_arr);
        
        // get random variable between 0 and total nb of questions -1
        $rand_nb = rand(0,count($final_quest_arr)-1);
        // get question number corresponding to the random_nb
        $act_quest_nb = $final_quest_arr[$rand_nb];
        
        // Get question
        $result = Get_aquestioncontent($mysqli, $act_quest_nb);
        $question = $result->fetch_assoc();
        
        // Get Choices for our random question and store into an array
        $retval = Get_achoicescontent($mysqli, $act_quest_nb);
        $choices_id_arr = array();
        $choices_text_arr = array();
        
        while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
            $choices_id_arr[]=$row[0];
            $choices_text_arr[]=$row[3];
        }
    break;  */


    case 'TableauScoreTsUtil':
        $head='head_score_all_users';
        $vue = 'vue_score_all_users';
        $aftervue="";
         // Variable declaration
        if(isset($_POST['submit'])){
            $datedujour = $_POST['datesouhaite'];;
        } else {
            $datedujour = date('Y-m-d');  //'date('Y-m-d')';
        }

        /* First rank will be 1 and second be 2 and so on */
        $ranking = 1;
        $id_user = 1;
        $i=1;

        $Prenom_arr=array();
        $Nom_arr=array();
        $id_user_arr=array();
        $ranking_arr=array();

        // Get score for the current day and order them in descending order 
        $result = Get_scoreforday_orderbyscore($mysqli, $datedujour);
        $total = $result->num_rows;
        while($a = $result->fetch_array(MYSQLI_ASSOC)){
            $Prenom_arr[] = $a['prenom'];
            $Nom_arr[] = $a['nom'];
            $ranking_arr[] = $ranking;
            $score_arr[]=$a['score'];
            $ranking++;
        }
    break;

}






include '../vue/head/'.$head.'.php';
include '../vue/headers-footer/navbar.php';
include '../vue/' . $vue . '.php'.$aftervue;
include '../vue/headers-footer/footer.php';





?>
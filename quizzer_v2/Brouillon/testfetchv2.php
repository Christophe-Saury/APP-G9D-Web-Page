1<?php
   $dbhost = 'localhost';
   $db_name = 'quizzer';
   $dbuser = 'root';
   $dbpass = '121212aa';


   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
$number =3;
   
   $sqli = "SELECT * FROM choices
                WHERE question_number = $number";


   mysqli_select_db($conn, 'quizzer');
   $retval = mysqli_query( $conn, $sqli );
   
   if(! $retval ) {
      echo "Could not get data: " . $mysqli -> connect_error;
      exit();
   }
   

   $choices_id_arr = array();
   $choices_text_arr = array();

   while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
      echo "ID_choice :{$row[0]}  <br> ".
         "Text_choice : {$row[3]} <br> ".
    
         "--------------------------------<br>";
   

         $choices_id_arr[]=$row[0];
         $choices_text_arr[]=$row[3];
   }
   
   echo "Fetched data successfully\n";
   print_r($choices_id_arr);
   print_r($choices_text_arr);

   $random_var = $choices_id_arr[0];
   $random_var = 6*($number-1)+1;
   echo $random_var;
   
   mysqli_close($conn);
?>
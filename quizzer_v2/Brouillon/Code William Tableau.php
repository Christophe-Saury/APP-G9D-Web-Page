<!DOCTYPE html>
<html>
<head><title> Gestion des profils </title></head>
<body>
 <h1>Gestion des profils</h1>
 <form  action="C:\xampp\htdocs\Projet\Model\requêtes.php" method= "POST" >
  <table border=1px>
   <thead>
     <tr>
       <th>NOM</th>
       <th>PRENOM</th>
       <th>ROLE</th>
       <th>MAIL</th>
       <th> Modifier </th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->FETCH(PDO::FETCH_ASSOC)) : ?>

     <tr>
       <td><input type="text" name="Nom" value="<?php echo htmlspecialchars($row['Nom']); ?>"></td>
       <td><input type="text" name="Prenom" value="<?php echo htmlspecialchars($row['Prenom']);?>"></td>
       <td> 

    <input type="hidden"  name="id" value="<?php echo htmlspecialchars($row['id_user']); ?>"/>
		<input type="hidden" name="action" value="save"/>

        <?php switch($row['Role']){

           case('Administrateur'):

            echo("<select class= 'Administrateur' name= 'Role'>)");

            echo("<option class='Administrateur' value='1'> Administrateur </option>");
            echo ("<option class='Manager' value='2'> Manager </option> ?>");
            echo ("<option class='Ouvrier' value='3'> Ouvrier </option>");

            echo ("</select>");
        break;  
        ?>
    <?php case('Manager'): 

            echo ("<select class= 'Manager' name= 'Role'>"); 
            echo("<option class='Administrateur' value='1'> Manager </option>");   
            echo ("<option class='Administrateur' value='2'> Ouvrier </option>"); 
            echo ("<option class='Administrateur' value='3'> Administrateur </option>");
            echo ("</select>");
             break; 
    ?>

<?php case('Ouvrier(e)'): 

                 echo("<select class= 'Ouvrier' name= 'Role'>"); 
                 echo("<option class='Ouvrier' value='1'> Ouvrier </option>");  
                 echo ("<option class='Administrateur' value='2'> Administrateur </option>"); 
                 echo ("<option class='Manager' value='3'> Manager </option>"); 
                 echo ("</select>");
                break;
             }
             ?>  
             </td>
     
       <td><input type="text" name ="adresse_mail" value="<?php echo htmlspecialchars($row['adresse_mail']);?>"></td> 
        <td>
       <input type='submit' value='modifier'>
      </td> 
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
 <?php echo("</input type='submit' value='enregistrer'>") ;?>
     </form>
</body>
</html>
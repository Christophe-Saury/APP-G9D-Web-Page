<?php session_start();
?>

<?php include "navbarpages.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONT - Inscription</title>



</head>

<body>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    
</nav>
<form method="POST" action="inscription.php">
<label>Nom et Prénom</label> 
<input type="text" name="Nom et Prénom" id="">
<br></br>
<label>Email</label> 
<input type="text" name="Email" id="">
<br></br>
<label>Mot de Passe</label> 
<input type="text" name="Mot de passe" id="">
        
           <center><button name="reg" class="conex uk-button uk-button-primary">Inscription</button></center>
           
           
           
           
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
 include("inc/db.php");
// Database connexion
$mysqli = new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);
if ($mysqli->connect_error){
    echo ("error");
}
// ?>
<?php  
if(isset($_POST["reg"])) { 

if (empty($username)){
    ?>
  <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Vérifier votre nom!',
})
</script>

<?php }
elseif (empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    ?>
        <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Verifier votre email !',
})
</script>
<?php
}
elseif (empty($password)) {
    ?>
          <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'verifier votre mot de passe!',
})
</script>
<?php } 
else {
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
$statement=$mysqli->prepare("INSERT INTO utilisateurs (username,phone,email,password) VALUES(?,?,?,?)");
$statement->bind_param('siss',$username,$phone,$email,$password);
$statement->execute();
?>
          <script>
              var nom ="<?php print $username ?>"
              var done =" <?php print "Bonjour ". $username ."! , Votre compte est en cours d'etre validé , consultez votre email ".$email." ... "?>"
          Swal.fire({
  icon: 'success',
  title: 'Felicitations !',nom,
  text: done
})
</script> 
<?php } } } ?>
</div>

</div>
</form>

    
</body>
<!-- UIkit JS -->

<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</html>
<?php

  session_start();
  if (isset($_SESSION['user_id']) || isset($_SESSION['role'])==0 ) {
    header('Location: /panel-user');
  } else if (isset($_SESSION['user_id']) || isset($_SESSION['role'])==1 ){
	header('Location: /panel-admin');
  } else {
	header('Location: /MenuGestionnaire');
  }
  require 'inc/db.php';


//if the login form is submitted 
if (isset($_POST['Submit'])) {

  if(!$_POST['email']){
echo "<script>Swal.fire({
	icon: 'error',
	title: 'Oops...',
	text: 'Veuillez remplir les champs ! ',
 })</script>" ;
 sleep(3);
 }
  if(!$_POST['mdp']){
	echo "<script>Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Veuillez remplir les champs ! ',
	 })</script>";
	 sleep(3);

  }
if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
 $conn = $conn->prepare('SELECT role,id_utilisateur,adresse_mail, mdp FROM utilisateur WHERE adresse_mail = :email');
 $conn->bindParam(':email', $_POST['email']);
 $conn->execute();
 $res = $conn->fetch(PDO::FETCH_ASSOC);
 echo  ($_POST['mdp']);


 if (count($res) > 0 && password_verify($_POST['mdp'], $res['mdp'])) {
	 echo "working";
   $_SESSION['connected'] = 1;
   $_SESSION['user_id'] = $res['id_utilisateur'];
   $_SESSION['role'] = $res['role'];
   if ($_SESSION['role']==0){
	header('Location: panel-user.php'); exit;
   }
   else if ($_SESSION['role']==1){
	header('Location: panel-admin.php'); exit;
   }
   else{
	header('Location: panel-gestionnaire.php'); exit;
   }
 } else {
   $message = 'Sorry, those credentials do not match';
 }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>

    <script src="https://kit.fontawesome.com/8db991785a.js" crossorigin="anonymous"></script>
    <link href="fa.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>
<form name="login_form" action="" method="POST" >

<div class="container">
	<div class="screen">
		<div class="screen__content">
              
			<form class="login">
                <div class="login__field"> <img src="img/logo.png" alt="logo" width="184px" height="148px"">  </div>
                   <h4 id="login_error"></h4>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input name="email" type="text" class="login__input" placeholder="Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="mdp" type="password" class="login__input" placeholder="Mot de passe">
				</div>

				<button id="loginbtn" name="Submit" type="submit" class="button login__submit">
					<span class="button__text">S'authentifier</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
			
				<div class="social-icons">
					
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<script>
	document.getElementById("loginbtn").addEventListener("click",function(){
		var e = document.forms["login_form"]["email"].value;
		var p = document.forms["login_form"]["mdp"].value;
		if (e=="" || p==""){
			  Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'Veuillez remplir les champs ! ',
    })
		}
	})
  
</script>
</form>

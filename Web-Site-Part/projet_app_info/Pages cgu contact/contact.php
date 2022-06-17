<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="pages_cgu_contact.css">
    <link rel="stylesheet" href="headers-footer/navbar.css">
    <link rel="stylesheet" href="headers-footer/footer.css">
    <link rel="stylesheet" href="headers-footer/buttons.css">
</head>


<?php include 'headers-footer/navbar.php'; ?>


<body>
    <h1>Contactez-nous</h1>
    <p> Pour toute demande, veuillez soumettre le formulaire ci dessous.</p>
    <div class="container">    
        <form method="post">
       
        <div class="row">
            <div class="col-25">
                <label>Nom</label>
            </div>
            
            <div class="col-75">
                <input type="text" name="nom" required>
            </div> 
        </div>

        <div class='row'>
            <div class="col-25">
                <label>Email</label>
            </div>

            <div class="col-75">
                <input type="email" name="email" required>
            </div>
        </div>

        <div class='row'>
            <div class="col-25">
                <label>Sujet</label>
            </div>

            <div class="col-75">    
                <input type="text" name="sujet" required>
            </div>
        </div>
        <div class='row'>
            <div class="col-25">
                <label>Message</label>
            </div>
            
            <div class="col-75">
                <textarea name="message" required></textarea>
            </div>
                <input type="submit" value="Envoyer le message">
        </form>
        <?php
        // si le formulaire a été soumis
        if (isset($_POST['message'])) {
            $message="Ce message a été envoyé via la page contact du site.
            Nom: ". $_POST["nom"]. "
            Email: ". $_POST["email"]. "
            Message: ". $_POST["message"];
            
            $retour = mail('pierretomei@gmail.com', $_POST["sujet"],
            $message, "From pierretomei@gmail.com" . "\r\n". "Reply to ". $_POST ["email"]);

            if($retour)
                echo '<p>Votre message a bien été envoyé.</p>';
        }
        ?>
    </div>
   
      
    </div>
  </div>
<br>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.765659432733!2d2.2776649151446593!3d48.824532511044914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670797ea4730d%3A0xe0d3eb2ad501cb27!2sISEP!5e0!3m2!1sfr!2sfr!4v1648161731446!5m2!1sfr!2sfr" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</body>
<br><br>
<?php include 'headers-footer/footer.php'; ?>
</html>
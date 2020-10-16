<?php 
  // Initialiser la session
  session_start();

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <!-- Afficher la barre de menu -->
    <?php include 'menu.php'; 
        // Pour vérifier que l'utilisateur soit connecter :
        if(!isset($_SESSION['user'])){
            header('Location: login.php');
        }

    ?>

    <p>Pour me contacter, veuillez remplir le formulaire ci-dessous :</p>
    <!-- Formulaire de contact -->
    <form action="traitement.php" method="post">
  
        <p>Message <span style="color: #ff0000;">*</span> :</p>
        <p><label for="message"></label> <textarea id="message" cols="52" rows="7" name="message"></textarea></p>
        <input type="reset" value="Effacer" /> <input type="submit" value="Envoyer" />
        <p> </p>
    </form>


</body>
</html>
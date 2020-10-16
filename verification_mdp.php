
<?php

    include 'connexion.php';
    if (isset($_POST)) {

        $password = $_POST['passe'];
    
        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $password)) {
            echo 'Mot de passe conforme';
        }
        
        else {
            echo 'Mot de passe non conforme';
        }	

        // Pour rediriger vers page d'accueil après avoir lu le message 
        header('Refresh: 10; URL=http://localhost/MRambla/affichage_blog.php');
    }

?>
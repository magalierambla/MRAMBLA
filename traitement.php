<?php
include 'connexion.php';
session_start();

if (isset($_POST)) {
    // Récupération de message :
    $message = $_POST["message"];
    //Récupération de user : 
    $idUser =  $_SESSION['user']['id_user'];

    if (empty($message)) {
        echo "Merci de bien remplir le message !";
    } else {

        $connexion  = new Connexion();

        $connexion->ajouterMessage($idUser, $message);

        header('Location: affichage_blog.php');
    }
}

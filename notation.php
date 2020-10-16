<?php
include 'connexion.php';
session_start();

if (isset($_GET)) {

    // Récupération de article :
    $idArticle = $_GET["id"];
    $notation = $_GET["notation"];


    if (empty($notation)) {
        echo "Merci de noter l'article sur 5 étoiles !";
    } else {

        $connexion  = new Connexion();

        $connexion->noterArticle($idArticle, $notation);

        header('Location: affichage_blog.php?id='.$idArticle);
    }
}
?>

<?php
session_start();
include 'connexion.php';
// s'il sagit un formulaire post
if (isset($_POST))
{
       $titre = $_POST["titre"];
       $contenu = $_POST["contenu"];
       $idArticle =  $_GET["id"];



    if(empty($contenu) || empty($titre)){
        header('Location: ajouter_contenu.php?ajout=ko');

        // cree une connexion avec la base


    }


    $connexion  = new Connexion();
    $connexion->modifierContenu( $titre , $contenu, $idArticle );

    echo " </br>Aucune erreure dans le modification du article. </br>";
    echo " </br>Ajout du contenu de l'article réussi !";
    echo "<a href='affichage_blog.php'></br></br>Revenir sur le blog</a>";





}
?>

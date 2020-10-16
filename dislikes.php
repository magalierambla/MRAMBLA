<!-- Traitement de mon compteur Dislikes -->
<?php 
include 'connexion.php';
session_start();

if (isset($_GET)) {

    // Récupération de article :
    $idArticle = $_GET["id"];
   
    
    // Constructeur de la création de connexion avec la BD
    $connexion  = new Connexion();

   
    // Condition pour ne pouvoir ajouter qu'un like sur un article du blog
    if(!isset($_SESSION['dislike'.$idArticle])){
        $connexion->ajouterDislikes($idArticle);
                $_SESSION['dislike'.$idArticle] = 'ok';
      }


    header('Location: detail_blog.php?id='.$idArticle);
}

?> 

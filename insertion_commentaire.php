<?php
include 'connexion.php';
session_start();
print_r($_POST);

if (isset($_POST))
{
       $commentaire = $_POST["commentaire"];
       $idArticle = $_GET['id'] ;    
       $idUser =  $_SESSION['user']['id_user'];
       
      if(empty($commentaire) ){
                echo "merci de remplir tout les champs du formulaire";
      }else{

        $connexion  = new Connexion();

        $connexion->ajouterCommentaire($idArticle , $idUser,   $commentaire );

        header('Location: detail_blog.php?id='. $idArticle);


      }          


       


}
?>
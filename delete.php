<?php
include 'connexion.php';

if (isset($_POST))
{


     
       $id = $_POST["id"];
      

        $connexion  = new Connexion();

        $connexion->deleteArticle( $id );

            
        header('Location: affichage_blog.php?supp=ok');


}
?>
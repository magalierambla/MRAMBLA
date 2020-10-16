<?php
session_start();
include 'connexion.php';

if (isset($_POST))
{
       $emaillogin = $_POST["emaillogin"];
       $passwordlogin = $_POST["passwordlogin"];
      

      if(empty($emaillogin) ||empty($passwordlogin) ){
                echo "merci de remplir tout les champs du formulaire";
      }else{

        $connexion  = new Connexion();

        $result = $connexion->login( $emaillogin , md5($passwordlogin ) );

        if($result){
          echo "Bienvenue" ;
         
          header('Location: affichage_blog.php');
        }else{
          echo "password login incorect" ;
        }

               


      }          


       


}
?>
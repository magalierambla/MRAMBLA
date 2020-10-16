<?php
session_start();

include 'connexion.php';

if (isset($_POST))
{



    $id = $_POST["id"];


    $connexion  = new Connexion();

    $article = $connexion->getArticle( $id );




}

?>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>Blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>

  <?php

  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }


  include 'menu.php';
  if(isset($_GET['ajout']) && $_GET['ajout'] =='ko' ){

  
    echo "Merci de bien remplir tout les champs </br>";
  
  }

  ?>

  <div class="container">




    <?php


    // Enregistrons les informations de date dans des variables
    $jour = date('d');
    $mois = date('m');
    $annee = date('Y');

    $heure = date('H');
    $minute = date('i');

    $nom = $_SESSION['user']['nom'];

    echo 'Bonjour ' . $nom . ' ! Nous sommes le ' . $jour . '/' . $mois . '/' . $annee . ' et il est ' . $heure . ' h ' . $minute . '<br /> <br />';
    ?>


    <h2>Formulaire d'ajout de contenu au Blog</h2>

    <!-- Formulaire d'ajout de contenu au Blog -->
    <form action="modification_contenu.php?id=<?php echo $article['id'] ?>" method="POST" enctype="multipart/form-data">
      <p>Titre:
        <input type="text" name="titre" value="<?php echo $article['titre'] ?>" />
      </p>
      <p>Contenu:
        <br />
        <textarea name="contenu" class="scroll" rows="10" cols="50"> <?php echo $article['contenu'] ?></textarea>
      </p>
      <!-- Taille du fichier à uploader <= 2 Mo = 2 000 000 octets -->
      <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

      <input type="submit" name="envoyer" value="Publier l'article">
    </form>

    <br />
    <!-- Lien vers la page d'Accueil de mon Blog -->
    <a href="affichage_blog.php">VISITEZ mon BLOG</a>



  </div>
</body>

</html>

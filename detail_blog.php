<?php 
  // Initialiser la session
  session_start();

  //
  include 'connexion.php';
  
  // Instanciation de la classe Connexion
  $connexion = new Connexion();

  $idArticle = $_GET['id'];

  //Condition pour n'ajouter une vue que la première fois que l'utilisateur se rend sur la page blog
  if(!isset($_SESSION['vue'.$idArticle])){
    $article = $connexion->compterVues($idArticle);
    $_SESSION['vue'.$idArticle] = 'ok';

  }


  $article = $connexion->getArticle($idArticle);



?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mon premier Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
  </head>

  <body>

<?php include 'menu.php' ; ?>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
<div class="container">
<button type="button" class="btn"><a href="ajouter_contenu.php">Ajouter un article</a></button>

<!--  Ajout d'un compteur de vue d'un article (compteur minimun) -->
  <i class="fa fa-eye" style="font-size:36px;color:purple">
    <?php echo $article['vue']; ?>
  </i>


<!-- Compteur plus minus -->
<!-- 1/ Compteur de plus : likes  -->
<a href="likes.php?id=<?php echo $article['id']; ?>">
  <i class="fa fa-hand-o-up" style="font-size:36px;color:blue">
    <?php echo $article['likes']; ?>
  </i>
</a>
<!-- 2/ Compteur de minus : dislikes  -->
<a href="dislikes.php?id=<?php echo $article['id']; ?>">
  <i class="fa fa-hand-o-down" style="font-size:36px;color:red">
    <?php echo $article['dislikes']; ?> 
  </i>
</a>
<br>
<p class="text-right"><?php echo $article['prenom']." ".$article['nom']  ; ?>
        
        <br>


    <?php

    if(isset($_SESSION['user'])){
    ?>
    <div style="float: right">
    <form  class="login_form row" action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
        <button type="submit">Supprimer</button>
    </form>

    <form  class="login_form row" action="modification.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
        <button type="submit">Modifier</button>
    </form>

    <?php
    }
    ?>
    </div>
  <div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		<img class="media-object" style="width: 300px;" src="uploads/<?php echo $article['image']; ?>">
      </a>
     
  		<div class="media-body" style="margin-left: 3%;margin-right: 3%;">
    		<h4 class="media-heading"><?php echo $article['titre']; ?></h4>
      

          </p>
          <p><?php echo $article['contenu']; ?></p>
          <ul class="list-inline list-unstyled">
        <li><span><i class="glyphicon glyphicon-calendar"></i><?php 
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s',  $article['date']);
        $newDateString = $myDateTime->format('d/m/Y H:i:s');
        echo $newDateString; ?> </span></li>
            

          <?php $countCommentaire = $connexion->calculeNbCommentaires($article['id']);?>
        
            <span><i class="glyphicon glyphicon-comment"></i> <?php echo $countCommentaire[0]; ?> commentaire</span>

            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <span><i class="fa fa-facebook-square"></i></span>
              <span><i class="fa fa-twitter-square"></i></span>
              <span><i class="fa fa-google-plus-square"></i></span>
            </li>
			</ul>
       </div>
    </div>
  </div>





  <?php

if(isset($_SESSION['user'])){ 

  $commentaires = $connexion->getAllCommentaires($article['id']);

  foreach ($commentaires as $commentaire) {
  ?>
  
</div>

<div id="commentaire" style="background-color: aliceblue; margin-left: 20%; width: 50% ; margin-top: 10px">
  <?php 
  
  echo $commentaire['nom'].' '.' '; 
 
  echo $commentaire['prenom'].' '.'</br>';
  
  echo $commentaire['commentaire'].' '.'</br>';

  echo $commentaire['date'].'</br>';
  ?>
</div>
  <div>

  <?php
  }
  ?>
  <form style=" padding-left: 20%;" action="insertion_commentaire.php?id=<?php echo $article['id']; ?>" method="POST" > 
 

</br>
      <p>Commentaire : 
        <br />
        <textarea  class="scroll" name="commentaire" rows="10" cols="50">
        </textarea>
      </p> 
      <button class="btn btn-success" type="submit">Envoyer</button>
</form>


<?php } ?>



</div>


<?php include "footer.php" ?>
  </body>
</html>


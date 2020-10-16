<?php 
  // Initialiser la session
  session_start();

  include 'connexion.php';

  // Instanciation de la classe Connexion
  $connexion = new Connexion();

  $articles = $connexion->getAllArticles();

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mon premier Blog</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>

    <body style="background : #8585B8">
   
    <?php include 'menu.php'; ?>




    <?php
  
  if(isset($_GET['ajout']) && $_GET['ajout'] =='ok' ){
  
    echo "La publication a été bien ajouté </br>";
  
  }else if(isset($_GET['supp'])){
  
    echo "La publication a été bien supprimé </br>";
  
  }else   if(isset($_GET['ajout']) && $_GET['ajout'] =='ko' ){

  
    echo "Merci de bien remplir tout les champs </br>";
  
  }

  
    ?>

    <div class="container" >
        <!-- Balise pour le haut de page -->



        <!-- Titre de la page -->
            <h1 class="titre">Les news de Mag</h1>

            <!-- Slogan -->
            <h3 class="slogan">Premier site en html, css et php</h3>

            <p>Ce site est un blog. Il présente des articles dont vous pouvez voir l'image et le titre sans aucune inscription et/ou connexion.</p>
            <p>Pour accéder à l'intégralité des articles et de leur contenu, inscrivez-vous et connectez-vous.</p>
    
  
    </div>

    <div class="container" >


        <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        
          <img style="width: 100%;" src="images/<?php echo(rand(1,4)) ?>.JPG"/> 

        </div>

        <div class="row">


<?php 
  
  foreach ($articles as $article) {
  
  
    ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="detail_blog.php?id=<?php echo $article['id']; ?>"><img class="card-img-top" src="uploads/<?php echo $article['image']; ?>" alt=""></a>
              <div class="card-body" style="background:#C9D1EF;">
                <h4 class="card-title">
                  <a href="detail_blog.php?id=<?php echo $article['id']; ?>"><?php echo $article['titre']; ?></a>
                </h4>

                <h5><?php
                    $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s',  $article['date']);
                    $newDateString = $myDateTime->format('d/m/Y H:i:s');
                    echo $newDateString; ?> </h5>

                <h5><?php echo $article['prenom']." ".$article['nom']  ; ?></h5>
                <p class="card-text"><?php echo  substr( $article['contenu'],0,30); ?>...</p>




              </div>
              <div class="card-footer" style="background:navy;">
              <small class="text-muted">

              <?php
            for ($i=1; $i <= $article['notation']  ; $i++) { 
             echo "<a href='notation.php?id=".$article['id']."&notation=".$i."'>★</a>";
            }

            for ($i=$article['notation']; $i <=5  ; $i++) { 
              echo "<a href='notation.php?id=".$article['id']."&notation=".($i+1)."'>☆</a>";       
             }

              ?>

             </small>
              </div>
            </div>
          </div>

  <?php } ?>

        </div>
        <!-- /.row -->

      </div>

    </div>


<?php include "footer.php" ?>

    </body>
</html>

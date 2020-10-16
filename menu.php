  <!--HEADER-->
  <div class="container-fluid">

    <!-- -->
    <nav class="navbar navbar-light bg-light navbar-expand-lg">
      <!--Logo-->
      <a class="navbar-brand" href=""><img style="width: 50px;" src="M.jpg"/> </a>
      <!--Bouton -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="affichage_blog.php" title="L'accueil">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="moi.php">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <?php
          
          if(isset($_SESSION['user'])){ ?>
              <li class="nav-item">
                  <a class="nav-link" href="ajouter_contenu.php">Ajouter un article</a>
              </li>
          <li class="nav-item">
            <a class="nav-link" href="deconnexion.php">Deconnexion</a>
          </li>

          <?php }else{ ?>
            <li class="nav-item">
            <a class="nav-link" href="login.php">Connexion</a>
          </li>
            <?php }  ?>

        </ul>
      </div>
    </nav>


</div>

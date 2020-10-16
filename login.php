<!DOCTYPE html> 
<html lang="fr"> 
  <head> 
    <title>Page de login</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  </head> 
  <body> 
  
  <?php include 'menu.php'; ?>

    <!--CONTENEUR Principal-->
    <div class="container">

      <div class="row r1">

        <div class="col-md-6 text-center">

          <h2>Veuillez saisir votre login et votre mot de passe</h2> 

          <!-- Formulaire de login -->
          <form action="verif_login.php" method="POST"> 

            <div class="form-group">  
              <label for="emaillogin">email</label>
              <input type="email" name="emaillogin" class="form-control" id="emaillogin" >
            </div>
            <div class="form-group">
              <label for="passwordlogin">mot de passe</label>
              <input type="password" name="passwordlogin" class="form-control" id="passwordlogin" >
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>

            <!-- Script php de login -->
            <?php 
              if (isset($_GET['message']) && $_GET['message'] == '1') { 
                echo "<span style='color:#ff0000'>login incorrect</span>"; 
              } 
            ?> 

          </form> 
        </div>

        <div class="col-md-6 text-center">

          <h2>Inscription</h2> 
          <!-- Formulaire de login -->
          <form action="inscription.php" method="POST"> 
            <!-- Champ nom -->
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" name="nom" class="form-control" id="nom" >
            </div>
            <!-- Champ prenom -->
            <div class="form-group">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" class="form-control" id="prenom" >
            </div>
            <!-- Champ email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" >
            </div>
            <!-- Champ password -->
            <div class="form-group">
              <!--<label for="email">Mot de passe</label>-->
              <label for="password">Mot de passe</label>
              <input type="password" name="passe" class="form-control" id="passe" >
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
          </form>
        </div> 



    </div> <!-- Fin du conteneur principal-->

<?php include('footer.php'); ?>

  </body> 
</html>
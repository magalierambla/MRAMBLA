
<?php
session_start();
include 'connexion.php';
// s'il sagit un formulaire post
/**
 * @param $titre
 * @param $contenu
 * @param $image
 * @param $idUser
 */
function saveArticle($titre, $contenu, $image, $idUser)
{
    $connexion = new Connexion();
    // insertion de l'article dans la base de donneés
    $connexion->ajouterContenu($titre, $contenu, $image, $idUser);

    echo " </br>Aucune erreure dans le transfert du fichier. </br> Le fichier " . $image . " a été copié dans le répertoire photos.";
    echo " </br>Ajout du contenu de l'article réussi !";
    echo "<a href='affichage_blog.php'></br></br>Revenir sur le blog</a>";
}

if (isset($_POST))
{
       $titre = $_POST["titre"];
       $contenu = $_POST["contenu"];
       $image =  $_FILES['monfichier'];
       $idUser  = $_SESSION['user']["id_user"]; 

      

if(empty($contenu) || empty($titre)){
        header('Location: ajouter_contenu.php?ajout=ko');
     
}


// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 20000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array(strtolower($extension_upload), $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                        //echo "L'envoi a bien été effectué !";


                        $image = basename($_FILES['monfichier']['name']);

                        // cree une connexion avec la base
                    saveArticle($titre, $contenu, $image, $idUser);


                    //echo "Aucune message d'errerur sdmlfsdklfksdmkfmlsdfsd";
                        // Si tout ce passe bien on redirige la page vers affichage_blog.php :
                        //header('Location: affichage_blog.php?ajout=ok');

                }else{

                        echo "Erreur de chargement de l'image : extensions_autorisees ".$extension_upload;
                }
        }else{

                echo "Erreur de chargement de l'image : tailles";
        }
}else{

            saveArticle($titre, $contenu, "default.jpg", $idUser);
        echo " Veuillez insérer une image !";
}





}
?>

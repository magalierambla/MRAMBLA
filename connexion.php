<?php

class Connexion  {

    // Déclaration des attributs 
    public  $db;

    // Constructeur
    function __construct() {
        $dsn = 'mysql:dbname=blog;host=localhost';
        $user = 'root';
        $password = '';
        $this->db = new PDO($dsn, $user, $password);
      }


    // Déclaration des méthodes 
    // Méthode pour insérer un nouveau membre dans la BD lors de son inscription au site
    public function insereMembre($nom , $prenom , $email , $passe) {
        $sql = "INSERT INTO utilisateur (nom, prenom, email , mot_passe) VALUES (?,?,?,?)";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([$nom, $prenom, $email, $passe]);
                        echo $nom;
    }

    // Méthode pour se connecter
    public function login($login , $password ) {

        $sel=$this->db->prepare("select * from utilisateur where email=? and mot_passe=? limit 1");
        $sel->execute(array($login,$password));
        $tab=$sel->fetchAll(); // récupère le résultat de la requete
        if(count($tab)>0){ // compteur d'utilisateur
            $_SESSION['user'] = $tab[0];
            return true;
        }else{
            return false ;
        }


    }
    
// Méthode pour récupérer un seul  article par son id
public function getArticle($idArticle) {

    $sel=$this->db->prepare("select * from article a , utilisateur u where a.id_utilisateur  =  u.id_user and a.id=?   order by date desc");
    $sel->execute(array($idArticle));
    $tab=$sel->fetch(); //récupère tout les articles 
    return $tab;


}


    // Méthode pour récupérer tout les articles
    public function getAllArticles() {

        $sel=$this->db->prepare("select * from article a , utilisateur u where a.id_utilisateur  =  u.id_user order by date desc");
        $sel->execute();
        $tab=$sel->fetchAll(); //récupère tout les articles 
        return $tab;


    }

    // Méthode pour supprimer un article par son id
    public function deleteArticle($id) {

        $sel=$this->db->prepare("delete from article where id=?");
        $sel->execute(array($id));
        $tab=$sel->fetchAll();
        return $tab;


    }

    // Méthode d'ajout de contenu d'un article
    public function  ajouterContenu( $titre , $contenu, $image , $idUser) {
        $sql = "INSERT INTO article (contenu , titre ,	id_utilisateur,	image  ) VALUES (?,?,?,?)";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([$contenu, $titre, $idUser,$image]);
                       
    }

    // Méthode d'ajout de tout les commentaires
    public function getAllCommentaires($idArticle) {

        $sel=$this->db->prepare("select * from commentaire c , utilisateur u where c.id_utilisateur  =  u.id_user and c.id_article=? order by date desc");
        $sel->execute(array($idArticle));
        $tab=$sel->fetchAll();
        return $tab;


    }


    // Méthode d'ajout d'un commentaire
    public function  ajouterCommentaire($id_article, $id_utilisateur, $commentaire) {
        $sql = "INSERT INTO commentaire (id_article, id_utilisateur, commentaire) VALUES (?,?,?)";
        $stmt= $this->db->prepare($sql);
        $stmt->execute(array($id_article, $id_utilisateur,$commentaire));
    }


    // Méthode d'ajout d'un message de contact en BD 
    public function  ajouterMessage($id_utilisateur, $message) {
        $sql = "INSERT INTO contact (id_user, message) VALUES (?,?)";
        $stmt= $this->db->prepare($sql);
        $stmt->execute(array($id_utilisateur, $message));
    }

    // Méthode pour calculer le nb de commentaires
    public function calculeNbCommentaires($idArticle) {
        $sel=$this->db->prepare("select count(*) from commentaire  where id_article  =?");
        
        $sel->execute(array($idArticle));
        $tab=$sel->fetch();
        return $tab;
    }

    // Méthode pour compteur like sur un article
    public function ajouterLike($idArticle) {
        $sel=$this->db->prepare("UPDATE article set likes = likes +1 where id = ?");
        
        $sel->execute(array($idArticle));
        $tab=$sel->fetch();
        return $tab;
    }

    // Méthode pour compteur dislike sur un article
    public function ajouterDislikes($idArticle) {
        $sel=$this->db->prepare("UPDATE article set dislikes = dislikes +1 where id = ?");
        
        $sel->execute(array($idArticle));
        $tab=$sel->fetch();
        return $tab;
    }


    // Fonction qui permet de mettre à jour le compteur de visites
    public function compterVues($idArticle){
        $sel=$this->db->prepare("UPDATE article set vue = vue +1 where id =?");

        $sel->execute(array($idArticle));
        $tab=$sel->fetch();
        return $tab;

    }


    // Fonction de notation d'un article de 1 à 5 étoiles :
    public function noterArticle($idArticle, $notation){
        $sel=$this->db->prepare("UPDATE article set notation =? where id =?");

        $sel->execute(array($notation,$idArticle));
        $tab=$sel->fetch();
        return $tab;


    }




    public function modifierContenu($titre, $contenu, $idArticle)
    {

        $sel=$this->db->prepare("UPDATE article set titre =?, contenu = ? where id =?");

        $sel->execute(array($titre, $contenu,$idArticle));
        $tab=$sel->fetch();
        return $tab;

    }


}


?>

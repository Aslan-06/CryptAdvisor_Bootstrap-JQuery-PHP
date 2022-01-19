<?php
require_once "./Modules/Article/vue_article.php";
require_once "./Modules/Article/modele_Article.php";

class ContArticle{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleArticle();
        $this->vue = new VueArticle();
    }

    public function afficherListe($Article, $page){
        $listeArticles = $this->modele->getListeArticles($Article, $page);
        $this->vue->afficherListe($listeArticles);
    }

    public function afficherArticle($Article){
        $idArticle;
        switch($Article){
            case "Article":
                $idArticle = $_GET['idArticle'];
                break;
            case "Forum":
                $idArticle = $_GET['idForum'];
                break;
        }
        $article = $this->modele->getArticle($Article, $idArticle);
        $this->voirCommentaires($idArticle);
        $this->vue->afficherArticle($article);
        
    }

    public function posterMessage($idArticle){
        if(empty($_POST['posteruncommentaire'])){
            $_SESSION["erreur"] = "Il faut écrire un commentaire pour pouvoir l'envoyer.";
                    if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                        header("Location: ".$_SERVEUR['HTTP_REFERER']);
                        exit();
                    }else{
                        header("Location: index.php?module=Article&action=article&idArticle=".$_POST['idArticle']);
                        exit();
                    }
        }else{
            $pseudo = $_SESSION['pseudo'];
            $message = $_POST['posteruncommentaire'];
            $idArticleM = $_POST['idArticle'];
            $this->modele->posterMessage($idArticleM, $pseudo, $message);
            $_SESSION["erreur"] = "Votre commentaire a bien été envoyé.";
            header("Location: index.php?module=Article&action=article&idArticle=".$_POST['idArticle']);
            exit();
        }
    }

    public function voirCommentaires($idArticle){
        $listecommentaire = $this->modele->getAllComments($idArticle);
        $_SESSION['listMessagesArticle'] = $listecommentaire;
    }
}
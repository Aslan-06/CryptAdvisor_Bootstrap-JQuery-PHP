<?php
require_once "./Modules/Accueil/vue_accueil.php";
require_once "./Modules/Accueil/modele_accueil.php";

class ContAccueil{
    private $vue;
    private $modele;

    public function __construct(){
        $this->vue = new VueAccueil();
        
        $this->modele = new ModeleAccueil();
    }

    public function accueil(){
        $this->vue->accueil();
    }
    public function search(){
        if(isset($_POST["tag"]) and !empty($_POST["tag"])){
            $tag = $_POST["tag"];
            $data = $this->modele->findArticle($tag);
            if(!empty($data)){
                foreach($data as $article){
                    $article = $article;
                    include_once "./Templates/corps/article.php";
                }
            }  else{
                echo '<div >Aucun article!</div>';
            }
        }
    }
    public function derniers(){
        $derniersarticles = $this->modele->last3articles();
        $_SESSION['derniersarticles'] = $derniersarticles;
    }
}
<?php
require_once './Modules/Article/Article.php';
class Forum {

    public function __construct(){
       new Article("Forum"); 
    }
}
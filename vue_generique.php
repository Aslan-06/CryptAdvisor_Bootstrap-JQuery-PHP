<?php

    class VueGenerique {

        function getAffichage($path,$data=null){
            if($data != null){
                echo "Jaffiche les articles";
            }
            ob_start();
            include_once "Templates/$path";
            $contenu = ob_get_clean();
            include_once "Templates/corps/header.html";
            echo $contenu;
            include_once "Templates/corps/footer.html";
        }


    } 
?>

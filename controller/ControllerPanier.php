<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('../lib/File.php');
require_once (File::build_path(array('model', 'ModelPanier.php'))); // chargement du modèle

class ControllerPanier {

    public static function read() {
            $controller = "Panier";
            $view = 'panier';
            $pagetitle = 'panier';
            require (File::build_path(array('view', 'view.php')));
    }
    
    public static function supprimer(){
        ModelPanier::supprimerArticle($_GET[l]);
        header('Location: http://webinfo.iutmontp.univ-montp2.fr/~colasv/PhpProject2/controller/Routeur.php?table=ControllerPanier&action=read');
    }
       

}
?>


<?php
require_once('../lib/File.php');
require_once (File::build_path(array('model','ModelProduit.php'))); // chargement du modèle

class ControllerProduit {
    
    public static function read(){
        $p = ModelProduit::getProduitById($_GET['id']);
        if($p == false){
            require (File::build_path(array('view','Produit','ErreurProduitId.php')));
        } else {
            require (File::build_path(array('view','Produit','ProduitDetail.php')));
        } 
    }
    
    public static function create(){
        require (File::build_path(array('view','Produit','CreateProduit.php')));
    }
    
    public static function created(){
        $i = 0;
        $tab_p = ModelProduit::getAllProduit();
        foreach ($tab_p as $p){
            if($p->getNom() == $_POST['nom']){$i = 1;}
        }
        if($i == 1){
            require (File::build_path(array('view','Produit','ErreurProduitCreated.php')));
        } else {
            $p = new ModelProduit($_POST['nom'], $_POST['prix'], $_POST['stock'], $_POST['lien'], $_POST['description']);
            $p->save();
        }
    }
    
    
    public static function deleted(){
        $p = ModelProduit::getProduitById($_GET['id']);
        if($p == false){
            require (File::build_path(array('view','Produit','ErreurProduitId.php')));
        } else {
            $p->delete();
        }
    }
}
?>


<?php
require_once('../lib/File.php');
require_once (File::build_path(array('model','ModelCommande.php'))); // chargement du modèle

class ControllerCommande {
	
    public static function read(){
        $u = ModelCommande::getCommandeById($_GET['id']);
        if($u == false){
            $controller = "Commande";
            $view = "ErreurCommandeId";
            $page_title = " Erreur "; 
            require(File::build_path(array('view','view.php')));
        } else {
            $controller = "Commande";
            $view = "CommandeDetail";
            $page_title = " Detail des commandes ";    
            require(File::build_path(array('view','view.php')));
        } 
    }
    
    public static function readAll() {
        $tab_c= ModelCommande::getAllCommande();
        
        $controller = "Commande";
        $view = "ListeCommande";
        $page_title = " Liste des commandes "; 
        require(File::build_path(array('view','view.php')));
    }


    public static function create(){
        $controller = "Commande";
        $view = "CreateCommande";
        $page_title = " Creation d'une commande ";
        require(File::build_path(array('view','view.php')));
    }
	
    public static function created(){
        $controller = "ContenuCommande";
        $view = "CreateContenucommande";
        $page_title = " Commande crée ";
	$u = new ModelCommande($_POST['util'], $_POST['adr']);
	$u->save();
     
    }
    
    public static function delete(){
    
        $u = ModelCommande::getCommandeById($_GET['id']);
        if($u == false){
            $controller = "Commande";
            $view = "ErreurCommandeId";
            $page_title = " Erreur supression "; 
            require(File::build_path(array('view','view.php')));
        } else {
            $u->delete();
        } 
    }
    
    public static function update(){
        
    }
      
}
?>


<?php
require_once('../lib/File.php');
require_once (File::build_path(array('model','ModelCommande.php'))); // chargement du modèle

class ControllerCommande {
	
    public static function read(){
        $u = ModelCommande::getCommandeById($_GET['id']);
        if($u == false){
            require (File::build_path(array('view','Commande','ErreurCommandeId.php')));
        } else {
            require (File::build_path(array('view','Commande','CommandeDetail.php')));
        } 
    }
    
    public static function create(){
        require (File::build_path(array('view','Commande','CreateCommande.php')));
    }
	
    public static function created(){
    
		$u = new ModelCommande($_POST['util'], $_POST['adr']);
		$u->save();
        
    }
}
?>


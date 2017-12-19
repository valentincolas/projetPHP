<?php
require_once('../lib/File.php');
require_once (File::build_path(array('model','ModelContenu_Commande.php'))); // chargement du modèle

class ControllerContenuCommande {
	
    public static function read(){
        $u = ModelContenu_Commande::getContenuCommandeById($_GET['id']);
        if($u == false){
            $controller = "ContenuCommande";
            $view = "ErreurContenuCommande";
            $page_title = " Erreur id "; 
            require(File::build_path(array('view','view.php')));
        } else {
            $controller = "ContenuCommande";
            $view = "ContenuCommandeDetail";
            $page_title = " Détails des commandes ";
            require(File::build_path(array('view','view.php')));
        } 
    }
    
    public static function readAll() {
        $tab_c= ModelContenu_Commande::selectAll();
        $controller = "ContenuCommande";
        $view = "ListeContenuCommande";
        $page_title = " Liste des commandes ";
        require(File::build_path(array('view','view.php')));
    }
    
    public static function create(){
        $controller = "ContenuCommande";
        $view = "CreateContenucommande";
        $page_title = " Creation commande ";
        require(File::build_path(array('view','view.php')));
    }
	
    public static function created(){
                
                $controller = "ContenuCommande";
                $view = "CreateContenucommande";
                $page_title = " Creation commande ";
		$u = new ModelContenu_Commande($_POST['idCommande'], $_POST['idProduit'], $_POST['quantite']);
		$u->save();
        
    }
    
    public static function delete(){
    
        $u = ModelContenu_Commande::getContenuCommandeById($_GET['id']);
        if($u == false){
            $controller = "ContenuCommande";
            $view = "ErreurContenuCommandeId";
            $page_title = " Erreur supression "; 
            require(File::build_path(array('view','view.php')));
        } else {
            ModelContenu_Commande::delete($_GET['id']);
        } 
    }
    
    public static function update(){   
        
        $u = ModelContenu_Commande::getContenuCommandeById($_GET['id']);
        if($u == false){
            $controller = "ContenuCommande";
            $view = "ErreurContenuCommandeId";
            $page_title = " Erreur supression "; 
            require(File::build_path(array('view','view.php')));
        } else {
            $u->update();
        } 
    }

    
    /* public fonction save () {
     * 
     *   try {
     *          $table_name = static::$object;
     *          $reflect = new ReflectionClass ($this);
     *          $prop = $reflect -> getProperties ( ReflectionProperty:: IS PRIVATE);
     *          // INSERT INTO ... // ???????????
     *          $attributs = array();
     *          $values = array();
     *          foreach ( $props as $ prop ) {             // getName() ??????
     *              $attributs[] = $prop
     *              $valeur [ $prop->getName()]= $this->get($prop->getName();
     *          }
     *          $into = '('. join (',', $attributs ) . ')';
     * 
     *          function my_prepend($x) {
     *              return ":" . $s;
     *          }
     *          $values_string ='(' Join( ',' array_map("my_prenpend", $attributs)).')'; 
     *          $ sql = ..
     *          prepare($sql);
     *          ...
     *          return $req_prep->execute($values);
     * 
     *   catch ( exeption $e ) {
     * 
     *   } 
     */
}
?>


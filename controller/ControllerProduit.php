<?php

require_once('../lib/File.php');
require_once (File::build_path(array('model', 'ModelProduit.php'))); // chargement du modèle
require_once (File::build_path(array('model', 'ModelPanier.php')));

class ControllerProduit {

    public static function read() {
        $p = ModelProduit::select($_GET['id']);
        if ($p == false) {
            $controller = "Produit";
            $view = 'ErreurProduitId';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view', 'view.php')));
        } else {
            $controller = "Produit";
            $view = 'ProduitDetail';
            $pagetitle = 'Detail Produit';
            require (File::build_path(array('view', 'view.php')));
        }
    }

    public static function readAll() {
        $tab_p = ModelProduit::selectAll(); //appel au modèle pour gerer la BD
        $controller = "Produit";
        $view = 'ListeProduit';
        $pagetitle = 'Liste Produit';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function create() {
        $controller = "Produit";
        $view = 'CreateProduit';
        $pagetitle = 'Creation Produit';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $i = 0;
        $tab_p = ModelProduit::selectAll();
        foreach ($tab_p as $p) {
            if ($p->getNom() == $_POST['nom']) {
                $i = 1;
            }
        }
        if ($i == 1) {
            $controller = "Produit";
            $view = 'ErreurProduitCreated';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view', 'view.php')));
        } else {
            $p = new ModelProduit($_POST['nom'], $_POST['prix'], $_POST['stock'], $_POST['lien'], $_POST['description']);
            $p->save();
            header('Location: http://webinfo.iutmontp.univ-montp2.fr/~colasv/PhpProject2/controller/Routeur.php?table=ControllerProduit&action=readAll');
        }
    }

    public static function deleted() {
        $p = ModelProduit::getProduitById($_GET['id']);
        if ($p == false) {
            $controller = "Produit";
            $view = 'ErreurProduitId';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view', 'view.php')));
        } else {
            ModelProduit::delete($_GET['id']);
            header('Location: http://webinfo.iutmontp.univ-montp2.fr/~colasv/PhpProject2/controller/Routeur.php?table=ControllerProduit&action=readAll');
        }
    }
    
    public static function ajoutPanier(){
        $p = ModelProduit::getProduitById($_GET['id']);
        ModelPanier::ajouterArticle($p->getNom(),1,$p->getPrix());
            $controller = "Panier";
            $view = 'panier';
            $pagetitle = 'panier';
            require (File::build_path(array('view', 'view.php')));
    }

}
?>


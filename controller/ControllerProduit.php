<?php

require_once('../lib/File.php');
require_once (File::build_path(array('model', 'ModelProduit.php'))); // chargement du modèle

class ControllerProduit {

    public static function read() {
        $p = ModelProduit::getProduitById($_GET['id']);
        if ($p == false) {
            $controller = "Produit";
            $view = 'ErreurProduitID';
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
        $tab_p = ModelProduit::getAllProduit(); //appel au modèle pour gerer la BD
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
        $tab_p = ModelProduit::getAllProduit();
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
            $p->delete();
        }
    }

}
?>

